<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ajbController;
use App\Http\Controllers\AuthController;
use App\Exports\PengajuanAjbExport;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('indexadmin', [adminController::class, 'indexadmin'])->name('admin.indexadmin');
// Route::get('halaman', [adminController::class, 'indexUser'])->name('user.indexUser');
Route::get('dataAJB', [adminController::class, 'dataPJB'])->name('admin.dataPJB');
Route::get('manUser', [adminController::class, 'manUser'])->name('admin.manUser');
Route::get('laporan', [adminController::class, 'laporan'])->name('admin.laporan');
Route::get('pengProfile', [adminController::class, 'pengProfile'])->name('admin.pengProfile');



Route::get('indexuser', [userController::class, 'index'])->name('user.index');
Route::get('suratAJB', [userController::class, 'sajb'])->name('user.riwayat');
Route::get('tambah', [userController::class, 'tambah'])->name('user.AJB');
Route::get('UserProfile', [userController::class, 'uprofile'])->name('user.profile');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');




Route::get('/ajb/form', [AjbController::class, 'form'])->name('user.ajb.AJB');
Route::post('/ajb/form', [AjbController::class, 'formStepSubmit'])->name('user.ajb.step');

Route::get('/admin/user', [adminController::class, 'manUser'])->name('admin.user.index');
Route::get('/admin/user/create', [adminController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [adminController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/{id}/edit', [adminController::class, 'edit'])->name('admin.user.edit');
Route::put('admin/user/{id}/update', [adminController::class, 'update'])->name('admin.user.update');


Route::get('/admin/pengajuan-ajb/{id}/detail', [adminController::class, 'detail'])->name('admin.pengajuan-ajb.detail');
Route::get('/admin/pengajuan-ajb/{id}/edit', [adminController::class, 'edit1'])->name('admin.pengajuan-ajb.edit');
Route::put('/admin/pengajuan-ajb/{id}', [adminController::class, 'update1'])->name('admin.pengajuan-ajb.update');


Route::get('/export/pengajuan-ajb', function () {
    return Excel::download(new PengajuanAjbExport, 'pengajuan_ajb.xlsx');
})->name('export.pengajuan-ajb');


// Super admin saja
Route::middleware(['auth', 'role:superAdmin'])->group(function () {
    Route::get('/manajemen-user', [AdminController::class, 'manUser'])->name('admin.manUser');
});

// Super admin & admin
Route::middleware(['auth', 'role:admin,superAdmin'])->group(function () {
    Route::get('/data-pengajuan-ajb', [AdminController::class, 'dataPJB'])->name('admin.dataPJB');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/pengaturan-profile', [AdminController::class, 'pengProfile'])->name('admin.pengProfile');
});



