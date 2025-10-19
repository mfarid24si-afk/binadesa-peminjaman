<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
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
        $data['pinjaman'] = Pinjam::all(); // ambil semua data
        return view('bina.basic-tables', $data);
    }

    public function forms()
    {
        return view('bina.basic-forms');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'barang' => 'required',
        ]);

        // Simpan data
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'barang' => $request->barang,
            'phone' => $request->phone,
        ];

        Pinjam::create($data);

        return redirect()->route('forms')->with('success', 'Data berhasil disimpan!');
    }
    public function destroy($id)
{
    $pinjaman = Pinjam::findOrFail($id);
    $pinjaman->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}
public function edit($id)
{
    $data['name'] = 'Spyvy';
    $data['email'] = 'spyvy@desa.com';
    $data['pinjaman'] = Pinjam::findOrFail($id);
    return view('bina.edit', $data);
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'birthday' => 'required|date',
        'gender' => 'required',
        'barang' => 'required',
    ]);

    // Update data
    $pinjaman = Pinjam::findOrFail($id);
    $pinjaman->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthday' => $request->birthday,
        'gender' => $request->gender,
        'barang' => $request->barang,
        'phone' => $request->phone,
    ]);

    return redirect()->route('tables')->with('success', 'Data berhasil diupdate!');
}
}