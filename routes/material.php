<?php

use App\Http\Controllers\MaterialController;


Route::resource('materials', MaterialController::class);

Route::get('export/materials/', [MaterialController::class, 'export']);
