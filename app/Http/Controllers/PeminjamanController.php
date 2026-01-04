<?php

namespace App\Http\Controllers;
use App\Models\PeminjamanFasilitas;
use App\Models\FasilitasUmum;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class PeminjamanController extends Controller
{
    // ========================
// === PEMINJAMAN =========
// ========================


    public function index(Request $request){
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['status'];
        $searchableColumns = ['tujuan'];
        $data['peminjaman'] = PeminjamanFasilitas::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.peminjaman', $data);
    }
    public function storePeminjaman(Request $request)
    {
        $request->validate([
            'warga_id'        => 'required|integer',
            'fasilitas_id'    => 'required|integer',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'          => 'required|string',
            'tujuan'          => 'required|string',
            'total_biaya'     => 'required|numeric',
        ]);

        PeminjamanFasilitas::create($request->all());

        return redirect()->route('tables')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function editPeminjaman($id)
    {
        $data['email']  = 'spyvy@desa.com';
        $data['name']   = 'Spyvy';
        $data['pinjam'] = PeminjamanFasilitas::findOrFail($id);
        $data['warga']     = Warga::all();
        $data['fasilitas'] = FasilitasUmum::all();
        return view('pages.edit_peminjaman', $data);
    }
    public function updatePeminjaman(Request $request, $id)
    {
        $request->validate([
            'warga_id'        => 'required|integer',
            'fasilitas_id'    => 'required|integer',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status'          => 'required|string',
            'keperluan'       => 'required|string',
        ]);
        $pinjam = PeminjamanFasilitas::findOrFail($id);
        $pinjam->update([
            'warga_id'        => $request->warga_id,
            'fasilitas_id'    => $request->fasilitas_id,
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status'          => $request->status,
            'keperluan'       => $request->keperluan,
        ]);

        return redirect()->route('tables')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroyPeminjaman($id)
    {
        $pinjam = PeminjamanFasilitas::findOrFail($id);
        $pinjam->delete();

        return redirect()->route('tables')->with('success', 'Peminjaman berhasil dihapus!');
    }


}
