<?php

namespace App\Http\Controllers;
use App\Models\PetugasFasilitas;
use App\Models\FasilitasUmum;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PetugasController extends Controller
{
    // ========================
// === PETUGAS ============
// ========================


public function index(Request $request){
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['peran'];
        $searchableColumns = ['peran'];
        $data['petugas'] = PetugasFasilitas::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.petugas', $data);
    }
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

        return view('tables', compact('fasilitas', 'warga'));
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
}
