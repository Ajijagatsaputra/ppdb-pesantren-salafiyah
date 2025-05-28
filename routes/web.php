<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');