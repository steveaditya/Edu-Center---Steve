<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('utama');
});
Route::get('/', [UserController::class, 'index'])->name('halaman-utama');
Route::get('/tentang-kami', [UserController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/cari-mentor', [UserController::class, 'indexMentor'])->name('cari-mentor');
Route::get('/hubungi-kami', [UserController::class, 'hubungiKami'])->name('hubungi-kami');

Route::get('/pilih-mentor', [UserController::class, 'index']);
Route::get('/pilih-mentor/{id}/jadwal', [UserController::class, 'jadwal'])->name('jadwal.edit');
Route::post('/pilih-mentor/{id}', [UserController::class, 'pilih_jadwal'])->name('jadwals.update');

//Ini untuk admin
Route::get('/tambah-jadwal', function () {
    return view('tambah-jadwal');
})->name('tambah-jadwal');

Route::post('/tambah-jadwal', [ScheduleController::class, 'tambah_jadwal']);

Route::get('/pilih-mentor/{id}/zoom', [UserController::class, 'link_zoom'])->name('zoom.edit');

Route::get('/cari-materi', [CourseController::class, 'index'])->name('cari-materi');

Route::get('/detail-materi/{id}', [CourseController::class, 'detail_materi'])->name('detail.materi');
Route::post('/detail-materi', [CourseController::class, 'detail_materi'])->name('detail.materi');

Route::post('/cari-materi', [CourseController::class, 'search'])->name('search');

Route::get('/daftar', [DaftarController::class, 'showForm'])->name('daftar');
Route::post('/daftar', [DaftarController::class, 'store']);

Route::get('/create', [CourseController::class, 'addCourse'])->name('tambah-materi');
Route::post('/create', [CourseController::class, 'createCourse'])->name('buat-materi');
Route::get('/edit/{kode}', [CourseController::class, 'editCourse'])->name('edit-materi');
Route::post('/edit/{kode}', [CourseController::class, 'updateCourse'])->name('update-materi');
Route::delete('/course/{kode}', [CourseController::class, 'deleteCourse'])->name('hapus-materi');

Route::get('/daftar', action: [DaftarController::class, 'showForm'])->name('daftar');
Route::post('/daftar', [DaftarController::class, 'store']);

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');


