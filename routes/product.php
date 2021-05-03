<?php


use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('export/products/', [ProductController::class, 'export']);
