<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanMasukController;

Route::get('/', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/', [\App\Http\Controllers\UserController::class, 'authenticate'])->name('login');
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
    })->name('logout')->middleware('auth');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'authenticate'])->name('login')->middleware('guest');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/admin', function () {
        return view('admin.home', [
            'title' => 'SushiBizkid - Dashboard'
        ]);
    });
Route::get('/admin/produk', [ProdukController::class, 'index']);
Route::post('/admin/produk/store', [ProdukController::class, 'store']);
Route::post('/admin/produk/update', [ProdukController::class, 'update']);
Route::post('/admin/produk/delete', [ProdukController::class, 'delete']);

Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::post('/admin/kategori/store', [KategoriController::class, 'store']);
Route::post('/admin/kategori/update', [KategoriController::class, 'update']);
Route::post('/admin/kategori/delete', [KategoriController::class, 'delete']);

Route::get('/admin/masuk', [MasukController::class, 'index']);
Route::post('/admin/masuk/store', [MasukController::class, 'store']);
Route::post('/admin/masuk/update', [MasukController::class, 'update']);
Route::post('/admin/masuk/delete', [MasukController::class, 'delete']);

Route::get('/admin/keluar', [KeluarController::class, 'index']);
Route::post('/admin/keluar/store', [KeluarController::class, 'store']);
Route::post('/admin/keluar/update', [KeluarController::class, 'update']);
Route::post('/admin/keluar/delete', [KeluarController::class, 'delete']);

Route::get('/admin/laporanmasuk', [LaporanMasukController::class, 'index']);
Route::get('/admin/laporankeluar', [LaporanKeluarController::class, 'index']);
});