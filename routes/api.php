<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\EditUsersController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\MinIOController;
use App\Http\Controllers\AudioListController;

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


Route::middleware('auth:sanctum')->post('/sonido', [AudioController::class, 'audio']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//Desloguearse
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/register', [RegisterUserController::class, 'store']);

Route::middleware('auth:sanctum')->post('/file', [MinIOController::class, 'store']);

Route::middleware('auth:sanctum')->get('/audioList', [AudioListController::class, 'index']);

Route::middleware('auth:sanctum')->prefix('users')->group(function(){
    Route::put('/edit/{user}', [EditUsersController::class, 'edit']);
    Route::get('/me', [AuthenticatedSessionController::class, 'me']);
});

