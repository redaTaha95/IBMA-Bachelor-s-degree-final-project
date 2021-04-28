<?php

use App\Http\Controllers\SupplierController;

Route::resource('suppliers', SupplierController::class);

Route::get('export/suppliers/', [SupplierController::class, 'export']);
