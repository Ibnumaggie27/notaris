<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PengajuanAjb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function index()
    {
        $user = Auth::user();

            // Ambil semua pengajuan milik user tersebut
            $pengajuanAjbs = PengajuanAjb::where('users_id', $user->id)->get();

            return view('user.index', compact('pengajuanAjbs','user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());


        $request->validate([
            'nik' => 'required|numeric|unique:users,nik,' . $user->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->email = $request->email;

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::exists('public/' . $user->foto)) {
                Storage::delete('public/' . $user->foto);
            }

            $fotoPath = $request->file('foto')->store('foto-profil', 'public');
            $user->foto = $fotoPath;
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profil berhasil diperbarui.');
    }
    public function tambah()
    {
        $user = Auth::user();

        return view('user.ajb.AJB', compact('user'));
    }

    public function sajb()
        {
            // Ambil user yang sedang login
            $user = Auth::user();

            // Ambil semua pengajuan milik user tersebut
            $pengajuanAjbs = PengajuanAjb::where('users_id', $user->id)->get();

            return view('user.riwayat', compact('pengajuanAjbs', 'user'));
        }
        
        public function uprofile()
        {
            $user = Auth::user(); // ambil data user yang sedang login
            return view('user.profile', compact('user'));
        }
}
