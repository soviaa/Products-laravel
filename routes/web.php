<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/categories', [CategoryController::class, 'getCategory'])->name('category');
Route::get('/categories/add',[CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/categories/store',[CategoryController::class, 'storeCategory'])->name('store-category');
Route::get('/categories/edit/{id}',[CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('/categories/update/{id}',[CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('/categories/delete/{id}',[CategoryController::class, 'deleteCategory'])->name('delete-category');


