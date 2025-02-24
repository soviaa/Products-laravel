<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/categories', [CategoryController::class, 'getCategory'])->name('category');
Route::get('/categories/add',[CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/categories/store',[CategoryController::class, 'storeCategory'])->name('store-category');
Route::get('/categories/edit/{id}',[CategoryController::class, 'editCategory'])->name('edit-category');
Route::patch('/categories/update/{id}',[CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('/categories/delete/{id}',[CategoryController::class, 'deleteCategory'])->name('delete-category');


Route::get('/products', [ProductController::class, 'getProduct'])->name('product');
Route::get('/products/add',[ProductController::class, 'addProduct'])->name('add-product');
Route::post('/products/store',[ProductController::class, 'storeProduct'])->name('store-product');
Route::get('/products/edit/{id}',[ProductController::class, 'editProduct'])->name('edit-product');
Route::patch('/products/update/{id}',[ProductController::class, 'updateProduct'])->name('update-product');
Route::get('/products/delete/{id}',[ProductController::class, 'deleteProduct'])->name('delete-product');

