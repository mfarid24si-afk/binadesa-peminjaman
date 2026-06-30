<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\Media;
use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;
use App\Models\PetugasFasilitas;
use App\Models\Pinjam;
use App\Models\SyaratFasilitas;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;

class binacontroller extends Controller
{
    public function index()
    {
        // ── Stat counts (read-only, no query changes) ──
        $data['totalPeminjaman'] = PeminjamanFasilitas::count();
        $data['totalWarga']      = Warga::count();
        $data['totalFasilitas']  = FasilitasUmum::count();
        $data['totalPembayaran'] = PembayaranFasilitas::count();

        // ── Chart: peminjaman per bulan (Akumulasi Semua Periode / Lintas Tahun) ──
        $perBulan = PeminjamanFasilitas::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Fill all 12 months (missing months = 0)
        $chartPerBulan = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartPerBulan[] = $perBulan[$m] ?? 0;
        }
        $data['chartPerBulan'] = $chartPerBulan;

        // ── Chart: status distribution ──
        $statusGroups = PeminjamanFasilitas::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $data['chartStatus'] = [
            'pending'  => $statusGroups['pending']  ?? 0,
            'distujui' => $statusGroups['distujui'] ?? 0,
            'ditolak'  => $statusGroups['ditolak']  ?? 0,
            'selesai'  => $statusGroups['selesai']  ?? 0,
        ];

        // ── Dashboard Widgets: Status Real-time ──
        $data['peminjamanAktif'] = PeminjamanFasilitas::whereIn('status', ['pending', 'disetujui'])->count();
        $data['peminjamanPending'] = PeminjamanFasilitas::where('status', 'pending')->count();
        $data['jatuhTempoHariIni'] = PeminjamanFasilitas::whereDate('tanggal_selesai', today())
            ->whereIn('status', ['pending', 'disetujui'])
            ->count();

        // ── Recent 5 peminjaman for activity feed ──
        $data['recentPeminjaman'] = PeminjamanFasilitas::with(['warga', 'fasilitas'])
            ->latest()
            ->take(5)
            ->get();

        return view('layouts.admin.app', $data);
    }

    public function tables(Request $request)
    {
        $data['judul']      = 'Peminjaman Fasilitas';
        $data['peminjam']   = Pinjam::all();
        $data['media']      = Media::paginate(10);
        $data['fasilitas']  = FasilitasUmum::paginate(10);
        $data['pembayaran'] = PembayaranFasilitas::paginate(10);
        $data['peminjaman'] = PeminjamanFasilitas::paginate(10);
        $data['petugas']    = PetugasFasilitas::paginate(10);
        $data['syarat']     = SyaratFasilitas::paginate(10);
        $data['user']       = User::paginate(10);
        return view('pages.basic-tables', $data);
    }

    public function forms()
    {
        $data['fasilitas']  = FasilitasUmum::all();
        $data['warga']      = Warga::all();
        $data['peminjaman'] = PeminjamanFasilitas::all();
        $data['petugas']    = PetugasFasilitas::all();
        $data['syarat']     = SyaratFasilitas::all();
        return view('pages.basic-forms', $data);
    }
}
