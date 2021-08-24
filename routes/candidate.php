<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TrainingController;

Route::resource('candidates', CandidateController::class);

Route::get('export/candidates/', [CandidateController::class, 'export']);

Route::get('affect/candidate/{candidate_id}/demand/{demand_id}', [CandidateController::class, 'affectDemand']);

Route::get('disaffect/candidate/{candidate_id}/demand/{demand_id}', [CandidateController::class, 'disaffectDemand']);
