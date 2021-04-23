<?php

use App\Http\Controllers\ClientController;



Route::resource('clients', ClientController::class);

Route::get('export/clients/', [ClientController::class, 'export']);
