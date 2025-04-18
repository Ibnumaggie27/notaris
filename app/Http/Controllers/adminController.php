<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PengajuanAjb;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function indexadmin()
    {
        Carbon::setLocale('id');
        $user = Auth::user();

    $startDate = Carbon::now()->subWeeks(6)->startOfWeek(); // 7 minggu termasuk minggu ini
    $endDate = Carbon::now()->endOfWeek();

    $data = DB::table('pengajuan_ajbs')
        ->select(
            DB::raw("YEARWEEK(tanggal_pengajuan, 1) as week_key"), // ISO-8601 week
            'status',
            DB::raw('count(*) as total'),
            DB::raw('MIN(DATE(tanggal_pengajuan)) as week_start'),
            DB::raw('MAX(DATE(tanggal_pengajuan)) as week_end')
        )
        ->whereBetween('tanggal_pengajuan', [$startDate, $endDate])
        ->groupBy('week_key', 'status')
        ->orderBy('week_key')
        ->get();

    $statuses = ['pengajuan', 'proses', 'selesai', 'tolak'];
    $chartData = [];
    $weeks = [];
    $weekLabels = [];
    $weekMap = [];

    // Inisialisasi struktur data 7 minggu ke belakang
    for ($i = 0; $i < 7; $i++) {
        $startOfWeek = Carbon::now()->subWeeks(6 - $i)->startOfWeek();
        $endOfWeek = Carbon::now()->subWeeks(6 - $i)->endOfWeek();
        $weekKey = $startOfWeek->format('oW'); // ISO year + week number (e.g., 202514)
        $label = 'Minggu ke-' . $startOfWeek->format('W') . ' (' . $startOfWeek->translatedFormat('d M') . ' - ' . $endOfWeek->translatedFormat('d M Y') . ')';

        $weeks[] = $label;
        $weekLabels[$weekKey] = $label;

        foreach ($statuses as $status) {
            $chartData[$status][$label] = 0;
        }
    }

    // Isi data dari hasil query
    foreach ($data as $row) {
        $key = $row->week_key;
        if (isset($weekLabels[$key])) {
            $label = $weekLabels[$key];
            $chartData[$row->status][$label] = $row->total;
        }
    }

    return view('admin.index', [
        'weeks' => $weeks,
        'chartData' => $chartData,
        'user' => $user,
    ]);
        return view('admin.index');
    }
    public function dataPJB()
    {
        $pengajuanAjbs = PengajuanAjb::all();
        $user = Auth::user(); // Ambil semua data dari tabel pengajuan_ajbs
        return view('admin.dataPJB', compact('pengajuanAjbs','user'));
    }
    public function manUser()
    {
        $adminUsers = User::where('role', 'admin')->get();
        return view('admin.manUser', compact('adminUsers'));
    }
    public function laporan()
    {
        $pengajuanAjbs = PengajuanAjb::all();
        $user = Auth::user(); // Ambil semua data dari tabel pengajuan_ajbs
        return view('admin.laporan', compact('pengajuanAjbs', 'user'));
    }
    public function pengProfile()
    {
        $user = Auth::user(); // ambil data user yang sedang login
        return view('admin.pengProfile', compact('user'));
    }

    
    public function create()
{
    return view('admin.user.create');
}

public function store(Request $request)
{
    $request->validate([
        'nik' => 'required|digits:16|numeric|unique:users,nik',
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    User::create([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'admin', // set default sebagai admin
    ]);

    return redirect()->route('admin.manUser')->with('success', 'User admin berhasil ditambahkan!');
}
public function editprofile()
    {
        $user = Auth::user();
        return view('admin.edit', compact('user'));
    }

    public function updateprofile(Request $request)
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

        return redirect()->route('admin.edit')->with('success', 'Profil berhasil diperbarui.');
    }

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'nik' => 'required|digits:16|numeric|unique:users,nik,' . $id,
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required|in:admin,superAdmin,user',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
    ]);

    $user->nik = $request->nik;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Upload foto jika ada
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto && Storage::exists('public/foto_user/' . $user->foto)) {
            Storage::delete('public/foto_user/' . $user->foto);
        }

        // Simpan foto baru
        $filename = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('public/foto_user', $filename);
        $user->foto = $filename;
    }

    $user->save();

    return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui!');
}

public function detail($id)
{
    $pengajuanAjb = PengajuanAjb::with(['user', 'objekTanah', 'berkas', 'penjual', 'pembeli', 'saksi'])->findOrFail($id);
    $user = auth()->user();
    if ($user->role == 'admin') {
        if ($pengajuanAjb->status == 'pengajuan') {
            $pengajuanAjb->status = 'proses';
            $pengajuanAjb->save();
        }
    }
    return view('admin.pengajuanAJB.detail', compact('pengajuanAjb'));
}

public function edit1($id)
{
    $pengajuanAjb = PengajuanAjb::findOrFail($id);
    return view('admin.pengajuanAJB.edit', compact('pengajuanAjb'));
}

public function update1(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:selesai,tolak',
    ]);

    $pengajuanAjb = PengajuanAjb::findOrFail($id);
    $pengajuanAjb->status = $request->status;
    $pengajuanAjb->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}

}