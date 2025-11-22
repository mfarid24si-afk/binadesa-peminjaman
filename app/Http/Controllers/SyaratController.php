<?php

namespace App\Http\Controllers;
use App\Models\SyaratFasilitas;
use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SyaratController extends Controller
{
    // ========================
// === SYARAT FASILITAS ===
// ========================

public function index(Request $request){
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['deskripsi'];
        $searchableColumns = ['nama_syarat'];
        $data['syarat'] = SyaratFasilitas::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.syarat', $data);
    }

    public function storeSyarat(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|integer',
            'nama_syarat'  => 'required|string',
            'deskripsi'    => 'required|string',

        ]);

        SyaratFasilitas::create([
            'fasilitas_id' => $request->fasilitas_id,
            'nama_syarat'  => $request->nama_syarat,
            'deskripsi'    => $request->deskripsi,

        ]);

        return redirect()->route('tables')->with('success', 'Syarat berhasil ditambahkan.');
    }

    public function editSyarat($id)
    {
        $data['email']       = 'spyvy@desa.com';
        $data['name']        = 'Spyvy';
        $data['nama_syarat'] = SyaratFasilitas::findOrFail($id);
        $data['fasilitas']   = FasilitasUmum::all(); // buat dropdown fasilitas
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
