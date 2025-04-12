<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PengajuanAjb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $user = Auth::user();

            // Ambil semua pengajuan milik user tersebut
            $pengajuanAjbs = PengajuanAjb::where('users_id', $user->id)->get();

            return view('user.index', compact('pengajuanAjbs'));
    }
    public function tambah()
    {
        return view('user.ajb.AJB');
    }

    public function sajb()
        {
            // Ambil user yang sedang login
            $user = Auth::user();

            // Ambil semua pengajuan milik user tersebut
            $pengajuanAjbs = PengajuanAjb::where('users_id', $user->id)->get();

            return view('user.riwayat', compact('pengajuanAjbs'));
        }
        
        public function uprofile()
        {
            $user = Auth::user(); // ambil data user yang sedang login
            return view('user.profile', compact('user'));
        }
}
