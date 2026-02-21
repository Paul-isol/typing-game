<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScoreboardController;
use Illuminate\Support\Facades\Route;

// ── Guest routes ──────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// ── Auth routes ───────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('home');
    Route::post('/game/start', [GameController::class, 'start']);
    Route::post('/game/end', [GameController::class, 'end']);

    Route::get('/scores', [ScoreboardController::class, 'index'])->name('scores');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

