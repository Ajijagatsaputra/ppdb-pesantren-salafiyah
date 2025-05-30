<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/pendaftaran', [RegistrationController::class, 'showForm'])->name('registration.form');
Route::post('/pendaftaran', [RegistrationController::class, 'submitForm'])->name('registration.submit');
