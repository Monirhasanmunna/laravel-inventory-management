<?php

use App\Http\Controllers\Backend\SetupManagement\CurrencyController;
use App\Http\Controllers\Backend\SetupManagement\SetupController;
use App\Http\Controllers\backend\SetupManagement\UnitController;
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
    });
});