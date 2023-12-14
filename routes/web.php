<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

//Landing Page
Route::get('/', [AuthController::class, 'landHandling'])->name('landHandling');

//All Side
Route::get('/homepage', function () {
    return view('user.home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


//User Side
Route::get('/user/profile', function () {
    return view('user.viewProfile');
});

Route::get('/user/reservation', function () {
    return view('user.viewReservation');
});

//Admin Side
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/user/entries', function () {
    return view('admin.user.userEntries');
});

Route::get('/admin/user/create', function () {
    return view('admin.user.userCreate');
});

Route::get('/admin/user/edit', function () {
    return view('admin.user.userEdit');
});

Route::get('/admin/categories/entries', function () {
    return view('admin.categories.categoriesEntries');
});

Route::get('/admin/categories/create', function () {
    return view('admin.categories.categoriesCreate');
});

Route::get('/admin/categories/edit', function () {
    return view('admin.categories.categoriesEdit');
});

Route::get('/admin/instrument/entries', function () {
    return view('admin.instrument.instrumentEntries');
});

Route::get('/admin/instrument/create', function () {
    return view('admin.instrument.instrumentCreate');
});

Route::get('/admin/instrument/edit', function () {
    return view('admin.instrument.instrumentEdit');
});

Route::get('/admin/reservation/entries', function () {
    return view('admin.peminjaman.reservationEntries');
});