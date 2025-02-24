<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.products.index'); ;

    Route::resource('products', ProductController::class, [  
        'as' => 'admin'  
    ]);
    Route::resource('orders', OrderController::class, [  
        'as' => 'admin'  
    ]);
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);  

Route::get('/', [ProductController::class, 'index']);