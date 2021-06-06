<?php

use App\Http\Controllers\EmailController;

Route::resource('emails', EmailController::class);
Route::get('/emails-sent', [EmailController::class, 'showEmailsSent'])->name('emails.sent');
