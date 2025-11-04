<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return redirect()->route('principal');
});

// 🔹 Página principal
Route::get('/principal', function () {
    return view('principal');
})->name('principal');



// 🔹 LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// 🔹 REGISTER
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 🔹 LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
 