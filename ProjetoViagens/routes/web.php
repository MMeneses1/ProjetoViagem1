<?php

use App\Http\Controllers\MVPController;


Route::get('/iniciar', [MVPController::class, 'showLoginForm']);
Route::post('/iniciar', [MVPController::class, 'login']);
Route::get('/register', [MVPController::class, 'showRegisterForm'])->name('insta.register');
Route::get('/perfil', [MVPController::class, 'perfil'])->name('perfil')->middleware('auth');





