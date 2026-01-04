<?php

namespace App\Http\Controllers;
use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PembayaranController extends Controller
{
    // ========================
// === PEMBAYARAN =========
// ========================

public function index(Request $request){
$data['name']      = 'Spyvy';
$data['email']     = 'spyvy@desa.com';
$data['judul']     = 'Peminjaman Fasilitas';
$filterableColumns = ['metode'];
$searchableColumns = ['keterangan'];
$data['pembayaran'] = PembayaranFasilitas::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
return view('pages.pembayaran', $data);
    }
    public function storePembayaran(Request $request)
    {
        $request->validate([
            'pinjam_id'  => 'required|integer',
            'jumlah'     => 'required|numeric',
            'tanggal'    => 'required|date',
            'metode'     => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranFasilitas::create([
            'pinjam_id'  => $request->pinjam_id,
            'jumlah'     => $request->jumlah,
            'tanggal'    => $request->tanggal,
            'metode'     => $request->metode,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tables')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function editPembayaran($id)
    {
        $data['email']      = 'spyvy@desa.com';
        $data['name']       = 'Spyvy';
        $data['bayar']      = PembayaranFasilitas::findOrFail($id);
        $data['peminjaman'] = PeminjamanFasilitas::all();

        return view('pages.edit_pembayaran', $data);
    }

    public function updatePembayaran(Request $request, $id)
    {
        $request->validate([
            'tanggal_bayar' => $request->tanggal,
            'total_bayar'   => $request->jumlah,
            'metode'        => 'required|string',
            'keterangan'    => 'nullable|string',
        ]);

        // SESUAI MODEL YANG BENER
        $bayar = PembayaranFasilitas::findOrFail($id);

        $bayar->update([
            'tanggal_bayar' => $request->tanggal,
            'total_bayar'   => $request->jumlah,
            'metode'        => $request->metode,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('tables')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroyPembayaran($id)
    {
        $bayar = PembayaranFasilitas::findOrFail($id);
        $bayar->delete();

        return redirect()->route('tables')->with('success', 'Pembayaran berhasil dihapus!');
    }

}
