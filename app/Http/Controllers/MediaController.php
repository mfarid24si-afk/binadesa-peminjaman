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
        'file_url'   => 'required|file',
        'caption'    => 'nullable|string',
        'mime_type'  => 'nullable|string',
        'sort_order' => 'nullable|integer',
    ]);

    // Upload file ke storage/app/public/media
    $file = $request->file('file_url');
    $fileName = time().'_'.$file->getClientOriginalName();
    $file->storeAs('public/media', $fileName);

    // Simpan ke database
    Media::create([
        'ref_table'  => $request->ref_table,
        'ref_id'     => $request->ref_id,
        'file_url'   => $fileName, // ini yang disimpan
        'caption'    => $request->caption,
        'mime_type'  => $file->getClientMimeType(),
        'sort_order' => $request->sort_order,
    ]);

    return redirect()->route('media')->with('success', 'Data Media berhasil disimpan.');
}


public function editMedia($id)
{
    $media = Media::findOrFail($id);

    return view('pages.edit_media', [
        'media' => $media,
        'name' => 'Spyvy',
        'email' => 'spyvy@desa.com',
    ]);
}
   public function updateMedia(Request $request, $id)
{
    $media = Media::findOrFail($id);
    $data = $request->except('file');
    if ($request->hasFile('file')) {
        if ($media->file_url && file_exists(storage_path('app/public/media/'.$media->file_url))) {
            unlink(storage_path('app/public/media/'.$media->file_url));
        }
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/media', $filename);
        $data['file_url'] = $filename;
        $data['mime_type'] = $file->getClientMimeType();
    }
    $media->update($data);
    return redirect()->route('media')->with('success', 'Media berhasil diperbarui.');
}
    public function destroyMedia($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->route('media')->with('success', 'Data berhasil dihapus!');
    }
}
