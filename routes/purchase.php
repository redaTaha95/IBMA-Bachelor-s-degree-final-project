<?php


use App\Http\Controllers\PurchaseController;



Route::resource('purchases', PurchaseController::class);

Route::get('export/purchases/', [PurchaseController::class, 'export']);
