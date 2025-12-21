<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        $developer = [
            'nama' => 'M.Farid Fadillah',
            'nim'  => '2457301079',
            'prodi'=> 'Sistem Informasi',
            'foto' => 'assets/images/developer/developer.jpeg',
            'email'=> 'm.farid24si@mahasiswa.pcr.ac.id',
            'github' => 'https://github.com/mfarid24si-afk/binadesa-peminjaman',
            'linkedin' => 'https://www.linkedin.com/in/muhammad-farid-fadillah-41b307394/',
            'instagram' => 'https://instagram.com/username',
        ];

        return view('pages.profile', [
        'developer' => $developer,
        'user' => $user,
    'authUser' => Auth::user()
    ]);
    }
 public function user()
{
    $user = User::paginate(10);

    return view('pages.user_index', [
        'user' => $user,
         'user' => $user,
    'authUser' => Auth::user()
    ]);
}



    // Tampilkan form login
    public function showLoginForm()
    {
        return view('pages.login'); // sesuaikan nama view-mu
    }

    // Proses login
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

if (Auth::attempt($credentials, $request->has('remember'))) {
    $request->session()->regenerate();

    session(['last_login' => now()]);

    return redirect()->intended('/bina');
}


    return back()->withErrors([
        'email' => 'Email atau password salah',
    ])->onlyInput('email');
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
    'name'     => 'required|string',
    'email'    => 'required|email',
    'password' => 'required',
    'role'     => 'required|string',
]);

User::create([
    'name'     => $request->name,
    'email'    => $request->email,
    'password' => bcrypt($request->password),
    'role'     => $request->role,
]);
return redirect()->route('login')->with('success', 'Data User berhasil disimpan.');
    }

    public function editUser($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('pages.edit_user', $data);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user')->with('success', 'Data User berhasil diperbarui.');
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus!');
    }
    public function regis()
    {
        return view('pages.Regis');
    }

}
