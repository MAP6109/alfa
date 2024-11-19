<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EpiController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);





Route::get('/index', [EpiController::class, 'index'])->name('epi.index');
Route::post('/store', [EpiController::class, 'store'])->name('epi.store');
Route::post('/update/{id}', [EpiController::class, 'update'])->name('epi.update');
Route::post('/toggle/{id}', [EpiController::class, 'toggle'])->name('epi.toggle');
Route::post('/destroy/{id}', [EpiController::class, 'destroy'])->name('epi.destroy');
