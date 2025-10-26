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
}
