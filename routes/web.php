<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\OverheadPabrikController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HppController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('bahan-baku', BahanBakuController::class);
Route::resource('overhead-pabrik', OverheadPabrikController::class);
Route::resource('tenaga-kerja', TenagaKerjaController::class);
Route::resource('produk', ProdukController::class)->parameters(['produk' => 'id',]);
Route::resource('hpp', HppController::class);

Route::post('/produk/bahan-baku', [ProdukController::class, 'storeBahanBakuProduk'])->name('produk.bahan-baku.store');;
Route::post('/produk/overhead-pabrik', [ProdukController::class, 'storeOverheadPabrikProduk'])->name('produk.overhead-pabrik.store');;
Route::post('/produk/tenaga-kerja', [ProdukController::class, 'storeTenagaKerjaProduk'])->name('produk.tenaga-kerja.store');;

Route::get('search-bahan-baku', [BahanBakuController::class, 'search']);
Route::get('search-overhead-pabrik', [OverheadPabrikController::class, 'search']);
Route::get('search-tenaga-kerja', [TenagaKerjaController::class, 'search']);

Route::get('/laporan-bahan-baku', [BahanBakuController::class, 'laporanBahanBaku'])->name('laporan.bahan-baku');
Route::get('/laporan-overhead-pabrik', [OverheadPabrikController::class, 'laporanOverheadPabrik'])->name('laporan.overhead-pabrik');
Route::get('/laporan-tenaga-kerja', [TenagaKerjaController::class, 'laporanTenagaKerja'])->name('laporan.tenaga-kerja');

Route::get('/generate-pdf', [HppController::class, 'generatePdf']);