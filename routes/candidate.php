<?php

use App\Http\Controllers\CandidateController;

Route::resource('candidates', CandidateController::class);

Route::get('export/candidates/', [CandidateController::class, 'export']);
