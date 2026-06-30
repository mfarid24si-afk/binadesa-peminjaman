<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanFasilitas;
use App\Models\DetailPeminjaman;
use App\Models\PeminjamanLog;
use App\Models\FasilitasUmum;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    // ========================
    // === PEMINJAMAN =========
    // ========================

    public function index(Request $request)
    {
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['status'];
        $searchableColumns = ['tujuan'];
        $data['peminjaman'] = PeminjamanFasilitas::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->with(['detail', 'warga', 'fasilitas'])
            ->paginate(10);
        return view('pages.peminjaman', $data);
    }

    public function storePeminjaman(Request $request)
    {
        $request->validate([
            'warga_id'          => 'required|integer|exists:warga,warga_id',
            'fasilitas_id'      => 'required|integer|exists:fasilitas_umum,fasilitas_id',
            'tanggal_mulai'     => 'required|date',
            'tanggal_selesai'   => 'required|date|after_or_equal:tanggal_mulai',
            'tujuan'            => 'required|string',
            'total_biaya'       => 'nullable|numeric',
            // Detail items
            'items'             => 'required|array|min:1',
            'items.*.nama'      => 'required|string|max:255',
            'items.*.jumlah'    => 'required|integer|min:1',
            'items.*.keterangan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // 1. Simpan ke tabel peminjaman_fasilitas
            $pinjam = PeminjamanFasilitas::create([
                'warga_id'        => $request->warga_id,
                'fasilitas_id'    => $request->fasilitas_id,
                'tanggal_mulai'   => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'tujuan'          => $request->tujuan,
                'status'          => 'pending',
                'total_biaya'     => $request->total_biaya ?? 0,
            ]);

            // 2. Simpan detail barang yang dipinjam
            foreach ($request->items as $item) {
                DetailPeminjaman::create([
                    'pinjam_id'   => $pinjam->pinjam_id,
                    'nama_barang' => $item['nama'],
                    'jumlah'      => $item['jumlah'],
                    'keterangan'  => $item['keterangan'] ?? null,
                ]);
            }

            // 3. Catat log awal
            PeminjamanLog::create([
                'pinjam_id'  => $pinjam->pinjam_id,
                'status'     => 'pending',
                'keterangan' => 'Pengajuan peminjaman dibuat',
                'created_by' => auth()->id(),
            ]);

            DB::commit();

            return redirect()->route('peminjaman')
                ->with('success', 'Peminjaman berhasil diajukan dengan ' . count($request->items) . ' item barang.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Gagal menyimpan data: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function editPeminjaman($id)
    {
        $data['email']  = 'spyvy@desa.com';
        $data['name']   = 'Spyvy';
        $data['pinjam'] = PeminjamanFasilitas::with(['detail', 'warga', 'fasilitas'])->findOrFail($id);
        $data['warga']     = Warga::all();
        $data['fasilitas'] = FasilitasUmum::all();
        return view('pages.edit_peminjaman', $data);
    }

    public function updatePeminjaman(Request $request, $id)
    {
        $validated = $request->validate([
            'warga_id'        => 'required|integer|exists:warga,warga_id',
            'fasilitas_id'    => 'required|integer|exists:fasilitas_umum,fasilitas_id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'          => 'required|string|in:pending,disetujui,ditolak,selesai',
            'tujuan'          => 'required|string',
            'total_biaya'     => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {
            $pinjam = PeminjamanFasilitas::findOrFail($id);

            // Catat perubahan status ke log
            if ($pinjam->status !== $validated['status']) {
                PeminjamanLog::create([
                    'pinjam_id'  => $pinjam->pinjam_id,
                    'status'     => $validated['status'],
                    'keterangan' => 'Status diubah dari ' . $pinjam->status . ' ke ' . $validated['status'],
                    'created_by' => auth()->id(),
                ]);
            }

            $pinjam->update($validated);
            DB::commit();

            return redirect()->route('peminjaman')
                ->with('success', 'Peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Gagal memperbarui: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // ========================
    // === LOG ACTIVITY =======
    // ========================

    public function logIndex(Request $request)
    {
        $query = PeminjamanLog::with(['peminjaman.fasilitas', 'creator']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('dari')) {
            $query->whereDate('created_at', '>=', $request->dari);
        }
        if ($request->filled('sampai')) {
            $query->whereDate('created_at', '<=', $request->sampai);
        }

        $data['logs'] = $query->latest()->paginate(20);
        return view('pages.log-aktivitas', $data);
    }

    // ========================
    // === QUICK ACTION =======
    // ========================

    public function quickApprove($id)
    {
        DB::beginTransaction();
        try {
            $pinjam = PeminjamanFasilitas::findOrFail($id);
            $pinjam->update(['status' => 'disetujui']);

            PeminjamanLog::create([
                'pinjam_id'  => $pinjam->pinjam_id,
                'status'     => 'disetujui',
                'keterangan' => 'Peminjaman disetujui oleh ' . auth()->user()->name,
                'created_by' => auth()->id(),
            ]);

            DB::commit();
            return redirect()->route('peminjaman')->with('success', 'Peminjaman #' . $id . ' berhasil disetujui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Gagal: ' . $e->getMessage()]);
        }
    }

    public function quickReject($id)
    {
        DB::beginTransaction();
        try {
            $pinjam = PeminjamanFasilitas::findOrFail($id);
            $pinjam->update(['status' => 'ditolak']);

            PeminjamanLog::create([
                'pinjam_id'  => $pinjam->pinjam_id,
                'status'     => 'ditolak',
                'keterangan' => 'Peminjaman ditolak oleh ' . auth()->user()->name,
                'created_by' => auth()->id(),
            ]);

            DB::commit();
            return redirect()->route('peminjaman')->with('success', 'Peminjaman #' . $id . ' ditolak.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Gagal: ' . $e->getMessage()]);
        }
    }

    public function quickDone($id)
    {
        DB::beginTransaction();
        try {
            $pinjam = PeminjamanFasilitas::findOrFail($id);
            $pinjam->update(['status' => 'selesai']);

            PeminjamanLog::create([
                'pinjam_id'  => $pinjam->pinjam_id,
                'status'     => 'selesai',
                'keterangan' => 'Peminjaman selesai',
                'created_by' => auth()->id(),
            ]);

            DB::commit();
            return redirect()->route('peminjaman')->with('success', 'Peminjaman #' . $id . ' selesai.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Gagal: ' . $e->getMessage()]);
        }
    }

    public function destroyPeminjaman($id)
    {
        $pinjam = PeminjamanFasilitas::findOrFail($id);
        $pinjam->delete();

        return redirect()->route('peminjaman')
            ->with('success', 'Peminjaman berhasil dihapus!');
    }
}
