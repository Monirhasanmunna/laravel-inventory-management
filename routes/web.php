<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {
    //dashboard route
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::group(['as'=>'product-category.','prefix'=>'product/categories'],function(){
        Route::get('/index',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'product-sub-category.','prefix'=>'product/sub_categories'],function(){
        Route::get('/index',[SubCategoryController::class,'index'])->name('index');
        Route::get('/create',[SubCategoryController::class,'create'])->name('create');
        Route::post('/store',[SubCategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[SubCategoryController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[SubCategoryController::class,'destroy'])->name('destroy');
    });
});


require __DIR__.'/auth.php';
require __DIR__.'/userManagement.php';
