<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MVPController;
use Insta\mvputils; 



    Route::get('/iniciar', [MVPController::class, 'login']);
    Route::get('/account/{tipo}', [MVPController::class, 'account']);








Auth::routes();

