<?php

use App\Http\Controllers\Backend\Expense\CategoryController;
use App\Http\Controllers\Backend\Expense\SubCategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['as'=>'expense.','prefix'=>'expense'],function(){

    Route::group(['as'=>'categories.','prefix'=>'categories'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'sub_categories.','prefix'=>'sub_categories'],function(){
        Route::get('/',[SubCategoryController::class,'index'])->name('index');
        Route::get('/create',[SubCategoryController::class,'create'])->name('create');
        Route::post('/store',[SubCategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[SubCategoryController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[SubCategoryController::class,'destroy'])->name('destroy');
    });

});