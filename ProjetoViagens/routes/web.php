<?php

use App\Http\Controllers\MVPController;

Route::get('/iniciar', [MVPController::class, 'login'])->name('insta.login');
Route::get('/register', [MVPController::class, 'showRegisterForm'])->name('insta.register');
Route::post('/register', [MVPController::class, 'register'])->name('register');



