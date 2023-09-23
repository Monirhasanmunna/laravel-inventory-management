<?php

use App\Http\Controllers\Backend\SetupManagement\BrandController;
use App\Http\Controllers\Backend\SetupManagement\CurrencyController;
use App\Http\Controllers\Backend\SetupManagement\SetupController;
use App\Http\Controllers\backend\SetupManagement\UnitController;
use App\Http\Controllers\Backend\SetupManagement\VatController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['as'=>'setup.','prefix'=>'setup'],function(){
        // setup index page route
        Route::get('/index',[SetupController::class,'index'])->name('index');
        
        // unit route in setup module
        Route::group(['as'=>'unit.','prefix'=>'unit'],function(){
            Route::get('index',[UnitController::class,'index'])->name('index');
            Route::get('create',[UnitController::class,'create'])->name('create');
            Route::post('store',[UnitController::class,'store'])->name('store');
            Route::get('edit/{id}',[UnitController::class,'edit'])->name('edit');
            Route::put('update/{id}',[UnitController::class,'update'])->name('update');
            Route::put('destroy/{id}',[UnitController::class,'destroy'])->name('destroy');
        });

        // currency route in setup module
        Route::group(['as'=>'currency.','prefix'=>'currency'],function(){
            Route::get('index',[CurrencyController::class,'index'])->name('index');
            Route::get('create',[CurrencyController::class,'create'])->name('create');
            Route::post('store',[CurrencyController::class,'store'])->name('store');
            Route::get('edit/{id}',[CurrencyController::class,'edit'])->name('edit');
            Route::put('update/{id}',[CurrencyController::class,'update'])->name('update');
            Route::put('destroy/{id}',[CurrencyController::class,'destroy'])->name('destroy');
        });

        // vat route in setup module
        Route::group(['as'=>'vat.','prefix'=>'vat'],function(){
            Route::get('index',[VatController::class,'index'])->name('index');
            Route::get('create',[VatController::class,'create'])->name('create');
            Route::post('store',[VatController::class,'store'])->name('store');
            Route::get('edit/{id}',[VatController::class,'edit'])->name('edit');
            Route::put('update/{id}',[VatController::class,'update'])->name('update');
            Route::put('destroy/{id}',[VatController::class,'destroy'])->name('destroy');
        });

        // brand route in setup module
        Route::group(['as'=>'brand.','prefix'=>'brand'],function(){
            Route::get('index',[BrandController::class,'index'])->name('index');
            Route::get('create',[BrandController::class,'create'])->name('create');
            Route::post('store',[BrandController::class,'store'])->name('store');
            Route::get('edit/{id}',[BrandController::class,'edit'])->name('edit');
            Route::put('update/{id}',[BrandController::class,'update'])->name('update');
            Route::put('destroy/{id}',[BrandController::class,'destroy'])->name('destroy');
        });
    });
});