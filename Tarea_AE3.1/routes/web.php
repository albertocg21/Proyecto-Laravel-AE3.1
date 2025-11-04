<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return redirect()->route('principal');
});

// 🔹 Página principal
Route::get('/principal', function () {
    return view('principal');
})->name('principal');

// 🔹 Reserva
Route::get('/reserva', function () {
    return view('reserva');
})->name('reserva');

// 🔹 LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// 🔹 REGISTER
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 🔹 LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva.index');

Route::post('/reserva', [ReservaController::class, 'store'])->name('reserva.store');