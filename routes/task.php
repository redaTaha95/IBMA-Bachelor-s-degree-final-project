<?php
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

Route::get('affect/task/{task_id}/employee/{employee_id}', [TaskController::class, 'affectEmployee']);

