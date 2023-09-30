<?php

use App\Http\Controllers\Backend\AccountsManagement\AccountController;
use App\Http\Controllers\Backend\AccountsManagement\BalanceAdjustmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix'=> 'cashbook'],function(){
        // accounts routes
        Route::group(['as'=>'accounts.','prefix'=>'accounts'],function(){
            Route::get('/index',[AccountController::class,'index'])->name('index');
            Route::get('/create',[AccountController::class,'create'])->name('create');
            Route::post('/store',[AccountController::class,'store'])->name('store');
            Route::get('/edit/{id}',[AccountController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[AccountController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[AccountController::class,'destroy'])->name('destroy');
        });

        // balance adjustment routes
        Route::group(['as'=>'balance.','prefix'=>'balance'],function(){
            Route::get('/index',[BalanceAdjustmentController::class,'index'])->name('index');
            Route::get('/create',[BalanceAdjustmentController::class,'create'])->name('create');
            Route::post('/store',[BalanceAdjustmentController::class,'store'])->name('store');
            Route::get('/edit/{id}',[BalanceAdjustmentController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[BalanceAdjustmentController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[BalanceAdjustmentController::class,'destroy'])->name('destroy');

            // ajax route
            Route::get('/account_info/{id}',[BalanceAdjustmentController::class,'AccountInfo']);
        });

        Route::group(['as'=>'balance-transfer.','prefix'=>'balance-transfer'],function(){
            Route::get('/index',[AccountController::class,'index'])->name('index');
            Route::get('/create',[AccountController::class,'create'])->name('create');
            Route::post('/store',[AccountController::class,'store'])->name('store');
            Route::get('/edit/{id}',[AccountController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[AccountController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[AccountController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'transaction.','prefix'=>'transaction'],function(){
            Route::get('/index',[AccountController::class,'index'])->name('index');
            Route::get('/create',[AccountController::class,'create'])->name('create');
            Route::post('/store',[AccountController::class,'store'])->name('store');
            Route::get('/edit/{id}',[AccountController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[AccountController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[AccountController::class,'destroy'])->name('destroy');
        });


        


    });

});