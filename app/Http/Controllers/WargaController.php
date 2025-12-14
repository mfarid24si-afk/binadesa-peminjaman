<?php

namespace App\Http\Controllers;

use App\Models\Warga;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    // ========================
// === WARGA ==============
// ========================

    public function index(Request $request){
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['jenis_kelamin'];
        $searchableColumns = ['nama'];
        $data['warga'] = Warga::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.warga', $data);
    }
    public function storeWarga(Request $request)
    {
         $data = $request->validate([
        'nama'          => 'required|string|max:100',
        'no_ktp'        => 'required|string|max:16',
        'agama'         => 'required|string|max:255',
        'pekerjaan'     => 'required|string|max:255',
        'jenis_kelamin' => 'required|string',
        'email'         => 'required|string',
        'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('warga', 'public');
    } else {
        $data['foto'] = null;
    }

    Warga::create($data);

    return redirect()->route('warga.index')
                     ->with('success', 'Data Warga berhasil disimpan.');
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

}
