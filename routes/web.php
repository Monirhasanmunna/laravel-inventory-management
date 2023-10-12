<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'verified'])->group(function () {
    //dashboard route
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::group(['as'=>'suppliers.','prefix'=>'suppliers'],function(){
        Route::get('/index',[SupplierController::class,'index'])->name('index');
        Route::get('/create',[SupplierController::class,'create'])->name('create');
        Route::post('/store',[SupplierController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SupplierController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[SupplierController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[SupplierController::class,'destroy'])->name('destroy');
    });


require __DIR__.'/userManagement.php';
require __DIR__.'/setup.php';
require __DIR__.'/accounts.php';
require __DIR__.'/products.php';

});


require __DIR__.'/auth.php';


