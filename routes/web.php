<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [FrontController::class, 'home'])->name('home');
});

// Referrer Registration
Route::get('/referrer/register/{hashed_id}', [FrontController::class, 'referrerRegister'])->name('referrer.register-form');
Route::post('/referrer/register/{hashed_id}', [UserController::class, 'referrerRegister'])->name('referrer.register');
// Referee Registration
Route::get('/referee/register/{hashed_id}', [FrontController::class, 'refereeRegister'])->name('referee.register-form');
Route::post('/referee/register/{hashed_id}', [UserController::class, 'refereeRegister'])->name('referee.register');
