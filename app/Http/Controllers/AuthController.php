<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('bina.login'); // sesuaikan nama view-mu
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt login
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/bina'); // ganti sesuai route dashboard
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    //    $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('dashboard')->with('success', 'Selamat Datang Admin!');
    //     }

    //     return back()->with('error', 'Username atau Password salah!'); 
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // ========================
// === SYARAT =============
// ========================
public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    Syarat_fasilitas::create($data);
    return redirect()->route('tables')->with('success', 'Data User berhasil disimpan.');
}

public function editUser($id)
{
    $data['user'] = Users::findOrFail($id);
    return view('bina.edit_user', $data);
}

public function updateUser(Request $request, $id)
{
    $user = Users::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('tables')->with('success', 'Data User berhasil diperbarui.');
}
public function destroyUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    
    return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
}

}
