<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class)->except(['create']);
Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('products', [ProductController::class, 'store'])->name('product.store');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('products/{product}', [ProductController::class, 'update'])->name('product.update');