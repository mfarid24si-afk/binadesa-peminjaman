<?php

namespace App\Http\Controllers;
use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class FasilitasController extends Controller
{
    // ========================
// === FASILITAS UMUM =====
// ========================

    public function index(Request $request){
        
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['jenis'];
        $searchableColumns = ['nama'];
        $data['fasilitas'] = FasilitasUmum::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.fasilitas', $data);
    }
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
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
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
    public function show($id)
{
    $fasilitas = FasilitasUmum::findOrFail($id);
    return view('pages.fasidetail', [
        'fasilitas' => $fasilitas,
        'name' => 'Spyvy',
        'email' => 'spyvy@desa.com',
    ]);
}


}
