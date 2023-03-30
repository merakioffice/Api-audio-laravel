<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeaController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('codea', [CodeaController::class, 'index']);
