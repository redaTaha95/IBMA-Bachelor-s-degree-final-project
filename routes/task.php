<?php
use App\Http\Controllers\TaskController;

//Route::prefix('{project_id}')->group(function () {
//    Route::resource('tasks', TaskController::class);
//});

//Route::group(['prefix' => '{project_id}'], function ($project_id) {
//    Route::resource('tasks', TaskController::class);
//});

Route::prefix('{project_id}')->group(function () {

    Route::resource('tasks', TaskController::class);

});

Route::get('affect/task/{task_id}/employee/{employee_id}', [TaskController::class, 'affectEmployee']);

