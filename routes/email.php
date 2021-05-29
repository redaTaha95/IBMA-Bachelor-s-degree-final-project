<?php


use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

//Route::resource('emails', EmailController::class);

//Route::get('emails/inbox', [EmailController::class,'inbox']);
Route::get('emails/inbox', [EmailController::class,'inbox']);

Route::get('emails/send', [EmailController::class,'send']);

Route::get('emails/read', [EmailController::class,'read']);



//Route::get('emails/inbox', function (){
   // return view('emails/inbox');
//});

