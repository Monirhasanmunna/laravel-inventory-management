<?php

use App\Http\Controllers\Backend\PurchaseController;
use Illuminate\Support\Facades\Route;


Route::group(['as'=>'purchase.','prefix'=>'purchase'],function(){
    Route::get('/index',[PurchaseController::class,'index'])->name('index');
    Route::get('/create',[PurchaseController::class,'create'])->name('create');
    Route::post('/store',[PurchaseController::class,'store'])->name('store');
    Route::get('/edit/{id}',[PurchaseController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[PurchaseController::class,'update'])->name('update');
    Route::put('/destroy/{id}',[PurchaseController::class,'destroy'])->name('destroy');

    // ajax route
    Route::get('/product_details/{id}',[PurchaseController::class,'productDetailsById']);
});