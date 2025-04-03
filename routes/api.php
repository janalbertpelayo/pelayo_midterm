<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('product/create', [ProductController::class, 'create']);
Route::post('product', [ProductController::class, 'store']);