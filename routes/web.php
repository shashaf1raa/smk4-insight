<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProdukKaryaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\ProdukKaryaController as AdminProdukKaryaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil-sekolah', [ProfilController::class, 'index'])->name('profil');

// Menu "Informasi" (dropdown)
Route::get('/program-keahlian', [KompetensiController::class, 'index'])->name('program-keahlian');
Route::get('/kompetensi/{slug}', [KompetensiController::class, 'show'])->name('kompetensi.detail');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/produk-karya', [ProdukKaryaController::class, 'index'])->name('produk-karya');
Route::get('/produk-karya/{slug}', [ProdukKaryaController::class, 'show'])->name('produk-karya.detail');

// Rute halaman lain (nanti dibuat menyusul, sementara diarahkan ke beranda dulu)

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.detail');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| Login Admin
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Panel Admin (wajib login dulu, pakai middleware 'auth')
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('produk', AdminProdukKaryaController::class)->parameters(['produk' => 'produk']);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('berita', AdminBeritaController::class)->parameters(['berita' => 'berita']);
    Route::resource('pesan', PesanController::class)->parameters(['pesan' => 'pesan'])->only(['index', 'show', 'destroy']);
});