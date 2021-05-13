<?php

use App\Http\Controllers\PartnerController;


Route::resource('partners', PartnerController::class);

Route::get('export/partners/', [PartnerController::class, 'export']);


