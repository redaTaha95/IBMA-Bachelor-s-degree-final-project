<?php

use App\Http\Controllers\ProjectController;



Route::resource('projects', ProjectController::class);

Route::get('export/projects/', [ProjectController::class, 'export']);
