<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ajbController;
use App\Http\Controllers\AuthController;
use App\Exports\PengajuanAjbExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role; // asumsi kolom role di tabel users

        switch ($role) {
            case 'admin':
            case 'superAdmin':
                return redirect('/admin/index');
            case 'user':
                return redirect('/user/index');
            default:
                return redirect('/login'); // fallback jika role tidak dikenali
        }
    }

    return view('auth.login'); // tampilkan halaman login jika belum login
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// ==================== USER ====================
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/suratAJB', [UserController::class, 'sajb'])->name('user.riwayat');
    Route::get('/tambah', [UserController::class, 'tambah'])->name('user.AJB');
    Route::get('/profile', [UserController::class, 'uprofile'])->name('user.profile');
    Route::get('/profil/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/profil/update', [UserController::class, 'update'])->name('user.update');

    // AJB
    Route::get('/ajb/{step?}', [AjbController::class, 'showForm'])->name('user.ajb.AJB');
    Route::post('/ajb', [AjbController::class, 'handleForm'])->name('user.ajb.submit');
    // Route::post('/user/ajb/step', [AJBController::class, 'handleStep'])->name('user.ajb.step');

});

// ==================== ADMIN & SUPERADMIN ====================
Route::prefix('admin')->middleware(['auth', 'role:admin,superAdmin'])->group(function () {
    Route::get('/index', [AdminController::class, 'indexadmin'])->name('admin.indexadmin');
    Route::get('/data-ajb', [AdminController::class, 'dataPJB'])->name('admin.dataPJB');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/pengaturan-profile', [AdminController::class, 'pengProfile'])->name('admin.pengProfile');
    Route::get('/profil/edit', [adminController::class, 'editprofile'])->name('admin.edit');
    Route::post('/profil/update', [adminController::class, 'updateprofile'])->name('admin.update');

    // Pengajuan AJB
    Route::get('/pengajuan-ajb/{id}/detail', [AdminController::class, 'detail'])->name('admin.pengajuan-ajb.detail');
    Route::get('/pengajuan-ajb/{id}/edit', [AdminController::class, 'edit1'])->name('admin.pengajuan-ajb.edit');
    Route::put('/pengajuan-ajb/{id}', [AdminController::class, 'update1'])->name('admin.pengajuan-ajb.update');

    // Manajemen User
    Route::get('/user', [AdminController::class, 'manUser'])->name('admin.user.index');
    Route::get('/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [AdminController::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id}/edit', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}/update', [AdminController::class, 'update'])->name('admin.user.update');
});

// ==================== SUPERADMIN ONLY ====================
Route::middleware(['auth', 'role:superAdmin'])->group(function () {
    Route::get('/manajemen-user', [AdminController::class, 'manUser'])->name('admin.manUser');
});

// ==================== EXPORT ====================
Route::get('/export/pengajuan-ajb', function () {
    return Excel::download(new PengajuanAjbExport, 'pengajuan_ajb.xlsx');
})->name('export.pengajuan-ajb')->middleware(['auth']);



