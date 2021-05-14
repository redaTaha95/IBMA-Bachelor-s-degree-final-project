<?php


use App\Http\Controllers\CalendarController;

Route::get('/calendar', [CalendarController::class, 'index']);
