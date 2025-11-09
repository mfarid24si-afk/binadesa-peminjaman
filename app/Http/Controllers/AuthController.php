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
        return view('pages.login'); // sesuaikan nama view-mu
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
            'email' => 'Email salah!',
            'password' => 'password salah',
        ])->onlyInput('email', 'password');
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
// === USER =============
// ========================
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('tables')->with('success', 'Data User berhasil disimpan.');
    }

    public function editUser($id)
    {
        $data['user'] = Users::findOrFail($id);
        return view('pages.edit_user', $data);
    }

    public function updateUser(Request $request, $id)
    {
        $user = Users::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('tables')->with('success', 'Data User berhasil diperbarui.');
    }
    public function destroyUser($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('tables')->with('success', 'Data berhasil dihapus!');
    }
    public function regis()
    {
        return view('pages.Regis');
    }

}
