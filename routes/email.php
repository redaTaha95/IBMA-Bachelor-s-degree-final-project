<?php


use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;



Route::get('emails/inbox', [EmailController::class,'inbox']);

Route::get('emails/send', [EmailController::class,'send']);

Route::post('emails/send', [EmailController::class,'store']);





Route::get('emails/getEmployeeById', [EmailController::class,'getEmployeeById']);

Route::get('emails/{id}/read', [EmailController::class,'read']);



//Route::get('emails/inbox', function (){
   // return view('emails/inbox');
//});

