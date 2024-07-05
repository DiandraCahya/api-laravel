<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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


Route::get('/murid/all', [MahasiswaController::class, 'index']);
Route::post('/murid/store', [MahasiswaController::class, 'store']);
Route::get('/murid/show/{id}', [MahasiswaController::class, 'show']);
Route::put('/murid/update/{id}', [MahasiswaController::class, 'update']);
Route::delete('/murid/delete/{id}', [MahasiswaController::class, 'destroy']);