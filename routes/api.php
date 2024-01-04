<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/citySearch/{cityName?}', [ApiController::class, 'searchCity'])->name('city.search');

Route::get('/index', [ApiController::class, 'userIndex'])->name('user.index');
Route::post('/store', [ApiController::class, 'userStore'])->name('user.store');
Route::get('/show/{user}', [ApiController::class, 'userShow'])->name('user.show');
Route::put('/update/{user}', [ApiController::class, 'userUpdate'])->name('user.update');
Route::delete('/destroy/{user}', [ApiController::class, 'userDestroy'])->name('user.destroy');
