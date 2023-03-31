<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AudioController;



Route::get('/', function () {
    return view('welcome');
});


Route::post('codea', [AudioController::class, 'index']);



