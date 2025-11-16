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
        $data['name']  = 'Spyvy';
        $data['email'] = 'spyvy@desa.com';
        return view('pages.board', $data);
    }

    public function tables()
    {
        $data['name']       = 'Spyvy';
        $data['email']      = 'spyvy@desa.com';
        $data['judul']      = 'Peminjaman Fasilitas';
        $data['peminjam']   = Pinjam::all(); // ambil semua data
        $data['warga']      = Warga::all();
        $data['media']      = Media::all();
        $data['fasilitas']  = FasilitasUmum::all();
        $data['pembayaran'] = PembayaranFasilitas::all();
        $data['peminjaman'] = PeminjamanFasilitas::all();
        $data['petugas']    = PetugasFasilitas::all();
        $data['syarat']     = SyaratFasilitas::all();
        $data['user']       = User::all();

        return view('pages.basic-tables', $data);
    }
public function forms()
{
    $data['name']  = 'Spyvy';
    $data['email'] = 'spyvy@desa.com';

    // Tambahin data yang dibutuhin semua FORM
    $data['fasilitas']  = FasilitasUmum::all();
    $data['warga']      = Warga::all();
    $data['peminjaman'] = PeminjamanFasilitas::all(); // kalo butuh nanti
    $data['petugas']    = PetugasFasilitas::all();    // kalo butuh tampilin list
    $data['syarat']     = SyaratFasilitas::all();     // kalo form syarat butuh

    return view('pages.basic-forms', $data);
}


    // ========================
// === WARGA ==============
// ========================
    public function storeWarga(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'no_ktp'        => 'required|string|max:16',
            'agama'         => 'required|string|max:255',
            'pekerjaan'     => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'email'         => 'required|string',
        ]);

        Warga::create($request->all());
        return redirect()->route('tables')->with('success', 'Data Warga berhasil disimpan.');
    }

    public function editWarga($id)
    {
        $data['email'] = 'spyvy@desa.com';
        $data['name']  = 'Spyvy';
        $data['warga'] = Warga::findOrFail($id);
        return view('pages.edit_warga', $data);
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
            'ref_table'  => 'required|string',
            'ref_id'     => 'required|numeric',
            'file_url'   => 'required|string',
            'caption'    => 'nullable|string',
            'mime_type'  => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        Media::create($request->all());
        return redirect()->route('tables')->with('success', 'Data Media berhasil disimpan.');
    }

    public function editMedia($id)
    {
        $data['email'] = 'spyvy@desa.com';
        $data['name']  = 'Spyvy';
        $data['media'] = Media::findOrFail($id);
        return view('pages.edit_media', $data);
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
    $validated = $request->validate([
        'nama'      => 'required|string',
        'deskripsi' => 'required|string',
        'jenis'     => 'required|string',
        'alamat'    => 'required|string',
        'rt'        => 'required|string',
        'rw'        => 'required|string',
        'kapasitas' => 'required|string',
    ]);

    FasilitasUmum::create([
        'nama'      => $validated['nama'],
        'deskripsi' => $validated['deskripsi'],
        'jenis'     => $validated['jenis'],
        'alamat'    => $validated['alamat'],
        'rt'        => $validated['rt'],
        'rw'        => $validated['rw'],
        'kapasitas' => $validated['kapasitas'],
    ]);

    return redirect()
        ->route('tables')
        ->with('success', 'Data Fasilitas berhasil disimpan.');
}


public function editFasilitas($id)
{
    $data['name']  = 'Spyvy';
    $data['email'] = 'spyvy@desa.com';
    $data['fasilitas'] = FasilitasUmum::findOrFail($id);

    return view('pages.edit_fasilitas', $data);
}

public function updateFasilitas(Request $request, $id)
{
    $validated = $request->validate([
        'nama'      => 'required|string',
        'deskripsi' => 'required|string',
        'jenis'     => 'required|string',
        'alamat'    => 'required|string',
        'rt'        => 'required|string',
        'rw'        => 'required|string',
        'kapasitas' => 'required|string',
    ]);

    $fasilitas = FasilitasUmum::findOrFail($id);
    $fasilitas->update($validated);

    return redirect()
        ->route('tables')
        ->with('success', 'Data Fasilitas berhasil diperbarui.');
}


public function destroyFasilitas($id)
{
    $fasilitas = FasilitasUmum::findOrFail($id);
    $fasilitas->delete();

    return redirect()->route('tables')->with('success', 'Fasilitas berhasil dihapus.');
}


// ========================
// === PEMBAYARAN =========
// ========================

public function storePembayaran(Request $request)
{
    $request->validate([
        'peminjaman_id' => 'required|integer',
        'total_bayar'   => 'required|numeric',
        'tanggal_bayar' => 'required|date',
        'metode'        => 'required|string',
        'keterangan'    => 'nullable|string',
    ]);

    Pembayaran::create([
        'peminjaman_id' => $request->peminjaman_id,
        'total_bayar'   => $request->total_bayar,
        'tanggal_bayar' => $request->tanggal_bayar,
        'metode'        => $request->metode,
        'keterangan'    => $request->keterangan,
    ]);

    return redirect()->route('forms')->with('success', 'Pembayaran berhasil ditambahkan.');
}

public function editPembayaran($id)
{
    $data['email']    = 'spyvy@desa.com';
    $data['name']     = 'Spyvy';
    $data['bayar']    = PembayaranFasilitas::findOrFail($id);
    $data['peminjaman'] = PeminjamanFasilitas::all();

    return view('pages.edit_pembayaran', $data);
}

public function updatePembayaran(Request $request, $id)
{
    $request->validate([
        'tanggal_bayar' => $request->tanggal,
        'total_bayar'   => $request->jumlah,
        'metode'     => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    // SESUAI MODEL YANG BENER
    $bayar = PembayaranFasilitas::findOrFail($id);

    $bayar->update([
        'tanggal_bayar' => $request->tanggal,
        'total_bayar'   => $request->jumlah,
        'metode'     => $request->metode,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('tables')->with('success', 'Pembayaran berhasil diperbarui.');
}


public function destroyPembayaran($id)
{
    $bayar = Pembayaran::findOrFail($id);
    $bayar->delete();

    return redirect()->route('tables')->with('success', 'Pembayaran berhasil dihapus!');
}


// ========================
// === PEMINJAMAN =========
// ========================

public function storePeminjaman(Request $request)
{
    $request->validate([
        'warga_id'        => 'required|integer',
        'fasilitas_id'    => 'required|integer',
        'tanggal_pinjam'  => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        'status'          => 'required|string',
        'keperluan'       => 'required|string',
    ]);

    PeminjamanFasilitas::create([
        'warga_id'        => $request->warga_id,
        'fasilitas_id'    => $request->fasilitas_id,
        'tanggal_pinjam'  => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status'          => $request->status,
        'keperluan'       => $request->keperluan,
    ]);

    return redirect()->route('forms')->with('success', 'Peminjaman berhasil ditambahkan.');
}

public function editPeminjaman($id)
{
    $data['email']    = 'spyvy@desa.com';
    $data['name']     = 'Spyvy';
    $data['pinjam']   = PeminjamanFasilitas::findOrFail($id);

    // dropdown yang dibutuhkan
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


    // ========================
// === PETUGAS ============
// ========================
    public function storePetugas(Request $request)
{
    $request->validate([
        'petugas_warga_id' => 'required|integer|exists:warga,warga_id',
        'peran'            => 'required|string',
        'fasilitas_id'     => 'required|integer|exists:fasilitas_umum,fasilitas_id',
    ]);

    PetugasFasilitas::create([
        'petugas_warga_id' => $request->petugas_warga_id,
        'peran'            => $request->peran,
        'fasilitas_id'     => $request->fasilitas_id,
    ]);

    return redirect()->route('tables')
                     ->with('success', 'Data Petugas berhasil disimpan.');
}
public function createPetugas()
{
    $fasilitas = FasilitasUmum::all();
    $warga     = Warga::all();

    return view('form_petugas', compact('fasilitas', 'warga'));
}
   public function editPetugas($id)
{
    $data['email']   = 'spyvy@desa.com';
    $data['name']    = 'Spyvy';
    $data['petugas'] = PetugasFasilitas::findOrFail($id);
    $data['warga']   = Warga::all();
    return view('pages.edit_petugas', $data);
}

    public function updatePetugas(Request $request, $id)
{
    $request->validate([
        'petugas_warga_id' => 'required|exists:warga,warga_id',
        'peran'            => 'required|string|max:255',
    ]);

    $petugas = PetugasFasilitas::findOrFail($id);
    $petugas->update($request->only('petugas_warga_id', 'peran'));

    return redirect()->route('tables')->with('success', 'Data Petugas berhasil diperbarui.');
}

    public function destroyPetugas($id)
    {
        $petugas = PetugasFasilitas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
    }
    // ========================
// === SYARAT FASILITAS ===
// ========================

public function storeSyarat(Request $request)
{
    $request->validate([
        'fasilitas_id' => 'required|integer',
        'syarat'       => 'required|string',
    ]);

    SyaratFasilitas::create([
        'fasilitas_id' => $request->fasilitas_id,
        'syarat'       => $request->syarat,
    ]);

    return redirect()->route('forms')->with('success', 'Syarat berhasil ditambahkan.');
}

public function editSyarat($id)
{
    $data['email']   = 'spyvy@desa.com';
    $data['name']    = 'Spyvy';
    $data['syarat']  = SyaratFasilitas::findOrFail($id);
    $data['fasilitas'] = FasilitasUmum::all(); // buat dropdown fasilitas

    return view('pages.edit_syarat', $data);
}

public function updateSyarat(Request $request, $id)
{
    $request->validate([
        'fasilitas_id' => 'required|integer',
        'nama_syarat'  => 'required|string',
        'deskripsi'    => 'required|string',
    ]);

    $syarat = SyaratFasilitas::findOrFail($id);

    $syarat->update([
        'fasilitas_id' => $request->fasilitas_id,
        'nama_syarat'  => $request->nama_syarat,
        'deskripsi'    => $request->deskripsi,
    ]);

    return redirect()->route('tables')
                     ->with('success', 'Syarat berhasil diperbarui.');
}

public function destroySyarat($id)
{
    $syarat = SyaratFasilitas::findOrFail($id);
    $syarat->delete();

    return redirect()->route('tables')->with('success', 'Syarat berhasil dihapus!');
}

}
