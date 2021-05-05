<?php


use App\Http\Controllers\SaleController;



Route::resource('sales', SaleController::class);

Route::get('export/sales/', [SaleController::class, 'export']);
