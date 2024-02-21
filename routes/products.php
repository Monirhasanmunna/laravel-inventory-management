<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

// product category routes
Route::group(['as'=>'product-category.','prefix'=>'categories', 'middleware' => ['permission:product.categories']],function(){
    Route::get('/index',[CategoryController::class,'index'])->name('index')->middleware('permission:product.categories');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[CategoryController::class,'update'])->name('update');
    Route::put('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
});

// product sub category routes
Route::group(['as'=>'product-sub-category.','prefix'=>'sub_categories', 'middleware' => ['permission:product.sub.categories']],function(){
    Route::get('/index',[SubCategoryController::class,'index'])->name('index');
    Route::get('/create',[SubCategoryController::class,'create'])->name('create');
    Route::post('/store',[SubCategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[SubCategoryController::class,'update'])->name('update');
    Route::put('/destroy/{id}',[SubCategoryController::class,'destroy'])->name('destroy');
});

// product routes
Route::group(['as'=>'product.','prefix'=>'product', 'middleware' => ['permission:product.list']],function(){
    Route::get('/index',[ProductController::class,'index'])->name('index');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/store',[ProductController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('update');
    Route::put('/destroy/{id}',[ProductController::class,'destroy'])->name('destroy');

    // ajax route
    Route::get('/get_sub_category/{id}',[ProductController::class,'getSubCategoryBycategoryId']);
});