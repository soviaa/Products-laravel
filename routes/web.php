<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/categories', [CategoryController::class, 'getCategory'])->name('category');
Route::get('/categories/add',[CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/categories/store',[CategoryController::class, 'storeCategory'])->name('store-category');
