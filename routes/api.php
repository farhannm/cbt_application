<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Siswa
Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa/{id}', 'showDetail');
    Route::get('/siswa', 'index');
});

//Exams
Route::controller(ExamsController::class)->group(function () {
    Route::get('/exams/{id}', 'showDetail');
    Route::get('/exams', 'index');
});

//Authentication
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);
