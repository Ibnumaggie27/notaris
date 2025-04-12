<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validasi input
    $credentials = $request->validate([
        'nik' => 'required|string',
        'password' => 'required|string',
    ]);

    // Cari user berdasarkan NIK
    $user = User::where('nik', $credentials['nik'])->first();

    // Cek apakah user ada dan password cocok
    if ($user && Hash::check($credentials['password'], $user->password)) {
        Auth::login($user); // Login user ke sistem

        // Arahkan berdasarkan role
        switch ($user->role) {
            case 'superAdmin':
                return redirect()->route('admin.indexadmin'); // pastikan route ini ada
            case 'admin':
                return redirect()->route('admin.indexadmin');
            case 'user':
                return redirect()->route('user.index');
            default:
                Auth::logout(); // role tidak dikenali
                return redirect()->route('login')->withErrors([
                    'role' => 'Role tidak dikenali.',
                ]);
        }
    }

    // Jika gagal login
    return back()->withErrors([
        'nik' => 'NIK atau password salah.',
    ]);
}
    

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
