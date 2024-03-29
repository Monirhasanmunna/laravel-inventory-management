<?php

use App\Http\Controllers\Backend\AccountsManagement\AccountController;
use App\Http\Controllers\Backend\AccountsManagement\BalanceAdjustmentController;
use App\Http\Controllers\Backend\AccountsManagement\BalanceTransferController;
use App\Http\Controllers\Backend\AccountsManagement\TransactionHistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix'=> 'cashbook'],function(){
        // accounts routes
        Route::group(['as'=>'accounts.','prefix'=>'accounts', 'middleware' => ['permission:cashbook.accounts']],function(){
            Route::get('/',[AccountController::class,'index'])->name('index');
            Route::get('/create',[AccountController::class,'create'])->name('create');
            Route::post('/store',[AccountController::class,'store'])->name('store');
            Route::get('/edit/{id}',[AccountController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[AccountController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[AccountController::class,'destroy'])->name('destroy');
        });

        // balance adjustment routes
        Route::group(['as'=>'balance.','prefix'=>'balance', 'middleware' => ['permission:cashbook.balance.adjustment']],function(){
            Route::get('/',[BalanceAdjustmentController::class,'index'])->name('index');
            Route::get('/create',[BalanceAdjustmentController::class,'create'])->name('create');
            Route::post('/store',[BalanceAdjustmentController::class,'store'])->name('store');
            Route::get('/edit/{id}',[BalanceAdjustmentController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[BalanceAdjustmentController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[BalanceAdjustmentController::class,'destroy'])->name('destroy');

            // ajax route
            Route::get('/account_info/{id}',[BalanceAdjustmentController::class,'AccountInfo']);
        });

        // balance transfer route
        Route::group(['as'=>'balance-transfer.','prefix'=>'balance-transfer', 'middleware' => ['permission:cashbook.balance.transfer']],function(){
            Route::get('/',[BalanceTransferController::class,'index'])->name('index');
            Route::get('/create',[BalanceTransferController::class,'create'])->name('create');
            Route::post('/store',[BalanceTransferController::class,'store'])->name('store');
            Route::get('/edit/{id}',[BalanceTransferController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[BalanceTransferController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[BalanceTransferController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'transaction.','prefix'=>'transaction', 'middleware' => ['permission:cashbook.transaction.history']],function(){
            Route::get('/',[TransactionHistoryController::class,'index'])->name('index');
            Route::get('/create',[TransactionHistoryController::class,'create'])->name('create');
            Route::post('/store',[TransactionHistoryController::class,'store'])->name('store');
            Route::get('/edit/{id}',[TransactionHistoryController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[TransactionHistoryController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[TransactionHistoryController::class,'destroy'])->name('destroy');
        });


        


    });

});