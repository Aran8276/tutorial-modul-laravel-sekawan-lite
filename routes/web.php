<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenerbitController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// public (autentikasi)
Route::get('/login', [PagesController::class, 'loginPage'])->name('login');
Route::get('/register', [PagesController::class, 'registerPage'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('action.login');
Route::post('/register', [AuthController::class, 'register'])->name('action.register');

Route::middleware(AuthMiddleware::class)->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('action.logout');

    // siswa
    Route::get('/dashboard', [PagesController::class, 'dashboardSiswa'])->name('dashboardSiswa');
    Route::get('/buku', [PagesController::class, 'bukuSiswa'])->name('bukuSiswa');
    Route::get('/peminjaman', [PagesController::class, 'peminjamanSiswa'])->name('peminjamanSiswa');
    Route::get('/pengaturan', [PagesController::class, 'pengaturanSiswa'])->name('pengaturanSiswa');
    Route::get('/pinjam/{id}', [PeminjamanController::class, 'create'])->name('action.pinjam-buku');

    // admin
    Route::middleware(RoleMiddleware::class)->group(function () {
        // dashboard
        Route::get('/admin', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');

        // buku
        Route::get('/buku-admin', [PagesController::class, 'bukuAdmin'])->name('bukuAdmin');
        Route::get('/tambah-buku-admin', [PagesController::class, 'tambahBukuAdmin'])->name('tambahBukuAdmin');
        Route::get('/edit-buku-admin/{id}', [PagesController::class, 'editBukuAdmin'])->name('editBukuAdmin');

        Route::post('/create-buku', [BukuController::class, 'create'])->name('action.create-buku');
        Route::put('/update-buku-admin/{id}', [BukuController::class, 'update'])->name('action.update-buku');
        Route::delete('/hapus-buku-admin/{id}', [BukuController::class, 'delete'])->name('action.delete-buku');

        // kategori
        Route::get('/kategori-admin', [PagesController::class, 'kategoriAdmin'])->name('kategoriAdmin');
        Route::get('/tambah-kategori-admin', [PagesController::class, 'tambahKategoriAdmin'])->name('tambahKategoriAdmin');
        Route::get('/edit-kategori-admin/{id}', [PagesController::class, 'editKategoriAdmin'])->name('editKategoriAdmin');

        Route::post('/create-kategori', [KategoriController::class, 'create'])->name('action.create-kategori');
        Route::put('/update-kategori-admin/{id}', [KategoriController::class, 'update'])->name('action.update-kategori');
        Route::delete('/hapus-kategori-admin/{id}', [KategoriController::class, 'delete'])->name('action.delete-kategori');

        // rak
        Route::get('/rak-admin', [PagesController::class, 'rakAdmin'])->name('rakAdmin');
        Route::get('/tambah-rak-admin', [PagesController::class, 'tambahRakAdmin'])->name('tambahRakAdmin');
        Route::get('/edit-rak-admin/{id}', [PagesController::class, 'editRakAdmin'])->name('editRakAdmin');

        Route::post('/create-rak', [RakController::class, 'create'])->name('action.create-rak');
        Route::put('/update-rak-admin/{id}', [RakController::class, 'update'])->name('action.update-rak');
        Route::delete('/hapus-rak-admin/{id}', [RakController::class, 'delete'])->name('action.delete-rak');

        // penulis
        Route::get('/penulis-admin', [PagesController::class, 'penulisAdmin'])->name('penulisAdmin');
        Route::get('/tambah-penulis-admin', [PagesController::class, 'tambahPenulisAdmin'])->name('tambahPenulisAdmin');
        Route::get('/edit-penulis-admin/{id}', [PagesController::class, 'editPenulisAdmin'])->name('editPenulisAdmin');

        Route::post('/create-penulis', [PenulisController::class, 'create'])->name('action.create-penulis');
        Route::put('/update-penulis-admin/{id}', [PenulisController::class, 'update'])->name('action.update-penulis');
        Route::delete('/hapus-penulis-admin/{id}', [PenulisController::class, 'delete'])->name('action.delete-penulis');

        // penerbit
        Route::get('/penerbit-admin', [PagesController::class, 'penerbitAdmin'])->name('penerbitAdmin');
        Route::get('/tambah-penerbit-admin', [PagesController::class, 'tambahPenerbitAdmin'])->name('tambahPenerbitAdmin');
        Route::get('/edit-penerbit-admin/{id}', [PagesController::class, 'editPenerbitAdmin'])->name('editPenerbitAdmin');

        Route::post('/create-penerbit', [PenerbitController::class, 'create'])->name('action.create-penerbit');
        Route::put('/update-penerbit-admin/{id}', [PenerbitController::class, 'update'])->name('action.update-penerbit');
        Route::delete('/hapus-penerbit-admin/{id}', [PenerbitController::class, 'delete'])->name('action.delete-penerbit');

        // peminjaman
        Route::get('/peminjaman-admin', [PagesController::class, 'peminjamanAdmin'])->name('peminjamanAdmin');
        Route::get('/edit-peminjaman-admin/{id}', [PagesController::class, 'editPeminjamanAdmin'])->name('editPeminjamanAdmin');

        Route::put('/update-peminjaman-admin/{id}', [PeminjamanController::class, 'update'])->name('action.update-peminjaman');
        Route::delete('/hapus-peminjaman-admin/{id}', [PeminjamanController::class, 'delete'])->name('action.delete-peminjaman');
        // pengaturan
        Route::get('/pengaturan-admin', [PagesController::class, 'pengaturanAdmin'])->name('pengaturanAdmin');
    });
});
