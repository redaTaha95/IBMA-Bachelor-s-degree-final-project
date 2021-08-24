<?php


use App\Http\Controllers\Auth\RegisterController;

Route::get('/registers',[RegisterController::class , 'index']);
