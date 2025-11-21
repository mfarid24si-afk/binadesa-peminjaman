<?php

namespace App\Http\Controllers;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // ========================
// === MEDIA ==============
// ========================
public function index(Request $request){
        $data['name']      = 'Spyvy';
        $data['email']     = 'spyvy@desa.com';
        $data['judul']     = 'Peminjaman Fasilitas';
        $filterableColumns = ['mime_type'];
        $searchableColumns = ['ref_table'];
        $data['media'] = Media::filter($request, $filterableColumns)->search($request, $searchableColumns)->paginate(10);
        return view('pages.media', $data);
    }
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

}
