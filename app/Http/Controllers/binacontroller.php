<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Warga;
use App\Models\Media;
use App\Models\Fasilitas_umum;
use App\Models\Pembayaran_fasilitas;
use App\Models\Peminjaman_fasilitas;
use App\Models\Petugas_fasilitas;
use App\Models\Syarat_fasilitas;
use Illuminate\Http\Request;

class binacontroller extends Controller
{
    public function index()
    {
        $data['name'] = 'Spyvy';
        $data['email'] = 'spyvy@desa.com';
        return view('bina.board', $data);
    }

    public function tables()
    {
        $data['name'] = 'Spyvy';
        $data['email'] = 'spyvy@desa.com';
        $data['judul'] = 'Peminjaman Fasilitas';
        $data['peminjam'] = Pinjam::all(); // ambil semua data
        $data['warga'] = Warga::all();
        $data['media'] = Media::all();
        $data['fasilitas'] = Fasilitas_umum::all();
        $data['pembayaran'] = Pembayaran_fasilitas::all();
        $data['peminjaman'] = Peminjaman_fasilitas::all();
        $data['petugas'] = Petugas_fasilitas::all();
        $data['syarat'] = Syarat_fasilitas::all();
        return view('bina.basic-tables', $data);
    }

    public function forms()
    {
        return view('bina.basic-forms');
    }
    

// ========================
// === WARGA ==============
// ========================
public function storeWarga(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'no_ktp' => 'required|string|max:16',
        'agama' => 'required|string|max:255',
        'pekerjaan' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string',
        'email' => 'required|string',
    ]);

    Warga::create($request->all());
    return redirect()->route('tables')->with('success', 'Data Warga berhasil disimpan.');
}

public function editWarga($id)
{
    $data['warga'] = Warga::findOrFail($id);
    return view('bina.edit_warga', $data);
}

public function updateWarga(Request $request, $id)
{
    $warga = Warga::findOrFail($id);
    $warga->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Warga berhasil diperbarui.');
}
public function destroyWarga($id)
{
    $warga = Warga::findOrFail($id);
    $warga->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

// ========================
// === MEDIA ==============
// ========================
public function storeMedia(Request $request)
{
    $request->validate([
        'ref_table' => 'required|string',
        'ref_id' => 'required|numeric',
        'file_url' => 'required|string',
        'caption' => 'nullable|string',
        'mime_type' => 'nullable|string',
        'sort_order' => 'nullable|integer',
    ]);

    Media::create($request->all());
    return redirect()->route('tables')->with('success', 'Data Media berhasil disimpan.');
}

public function editMedia($id)
{
    $data['media'] = Media::findOrFail($id);
    return view('bina.edit_media', $data);
}

public function updateMedia(Request $request, $id)
{
    $media = Media::findOrFail($id);
    $media->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Media berhasil diperbarui.');
}
public function destroyMedia($id)
{
    $media = Media::findOrFail($id);
    $media->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}


// ========================
// === FASILITAS UMUM =====
// ========================
public function storeFasilitas(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'jenis' => 'required|string',
        'alamat' => 'required|string',
        'rt' => 'required|string',
        'rw' => 'required|string',
        'kapasitas' => 'required|string',
    ]);

    Fasilitas_umum::create($request->all());
    return redirect()->route('tables')->with('success', 'Data Fasilitas berhasil disimpan.');
}

public function editFasilitas($id)
{
    $data['fasilitas'] = Fasilitas_umum::findOrFail($id);
    return view('bina.edit_fasilitas', $data);
}

public function updateFasilitas(Request $request, $id)
{
    $fasilitas = Fasilitas_umum::findOrFail($id);
    $fasilitas->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Fasilitas berhasil diperbarui.');
}
public function destroyFasilitas($id)
{
    $fasilitas = Fasilitas_umum::findOrFail($id);
    $fasilitas->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

// ========================
// === PEMBAYARAN =========
// ========================
public function storePembayaran(Request $request)
{
    $request->validate([
        'keterangan' => 'required|string',
        'metode' => 'required|string',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    $data = $request->only(['keterangan', 'metode', 'jumlah', 'tanggal']);
    $data['pinjam_id'] = 1;

    Pembayaran_fasilitas::create($data);
    return redirect()->route('tables')->with('success', 'Data Pembayaran berhasil disimpan.');
}

public function editPembayaran($id)
{
    $data['pembayaran'] = Pembayaran_fasilitas::findOrFail($id);
    return view('bina.edit_pembayaran', $data);
}

public function updatePembayaran(Request $request, $id)
{
    $pembayaran = Pembayaran_fasilitas::findOrFail($id);
    $pembayaran->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Pembayaran berhasil diperbarui.');
}
public function destroyPembayaran($id)
{
    $pembayaran = Pembayaran_fasilitas::findOrFail($id);
    $pembayaran->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

// ========================
// === PEMINJAMAN =========
// ========================
public function storePeminjaman(Request $request)
{
    $request->validate([
        'tanggal_mulai'   => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'tujuan'          => 'required|string|max:255',
        'status'          => 'required|string|max:50',
        'total_biaya'     => 'required|numeric|min:0',
    ]);

    $data = $request->only(['tanggal_mulai', 'tanggal_selesai', 'tujuan', 'status', 'total_biaya']);
    $data['fasilitas_id'] = 1;
    $data['warga_id'] = 1;

    Peminjaman_fasilitas::create($data);
    return redirect()->route('tables')->with('success', 'Data Peminjaman berhasil disimpan.');
}

public function editPeminjaman($id)
{
    $data['peminjaman'] = Peminjaman_fasilitas::findOrFail($id);
    return view('bina.edit_peminjaman', $data);
}

public function updatePeminjaman(Request $request, $id)
{
    $peminjaman = Peminjaman_fasilitas::findOrFail($id);
    $peminjaman->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Peminjaman berhasil diperbarui.');
}
public function destroyPeminjaman($id)
{
    $peminjaman = Peminjaman_fasilitas::findOrFail($id);
    $peminjaman->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

// ========================
// === PETUGAS ============
// ========================
public function storePetugas(Request $request)
{
    $request->validate([
        'petugas_warga_id' => 'required|integer',
        'peran' => 'required|string',
    ]);

    $data = $request->only(['petugas_warga_id', 'peran']);
    $data['fasilitas_id'] = 1;

    Petugas_fasilitas::create($data);
    return redirect()->route('tables')->with('success', 'Data Petugas berhasil disimpan.');
}

public function editPetugas($id)
{
    $data['petugas'] = Petugas_fasilitas::findOrFail($id);
    return view('bina.edit_petugas', $data);
}

public function updatePetugas(Request $request, $id)
{
    $petugas = Petugas_fasilitas::findOrFail($id);
    $petugas->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Petugas berhasil diperbarui.');
}
public function destroyPetugas($id)
{
    $petugas = Petugas_fasilitas::findOrFail($id);
    $petugas->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

// ========================
// === SYARAT =============
// ========================
public function storeSyarat(Request $request)
{
    $request->validate([
        'nama_syarat' => 'required|string',
        'deskripsi' => 'required|string',
    ]);

    $data = $request->only(['nama_syarat', 'deskripsi']);
    $data['fasilitas_id'] = 1;

    Syarat_fasilitas::create($data);
    return redirect()->route('tables')->with('success', 'Data Syarat berhasil disimpan.');
}

public function editSyarat($id)
{
    $data['syarat'] = Syarat_fasilitas::findOrFail($id);
    return view('bina.edit_syarat', $data);
}

public function updateSyarat(Request $request, $id)
{
    $syarat = Syarat_fasilitas::findOrFail($id);
    $syarat->update($request->all());
    return redirect()->route('tables')->with('success', 'Data Syarat berhasil diperbarui.');
}
public function destroySyarat($id)
{
    $syarat = Syarat_fasilitas::findOrFail($id);
    $syarat->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}
}