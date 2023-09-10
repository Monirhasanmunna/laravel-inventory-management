<?php

use App\Http\Controllers\Backend\UserManagement\PermissionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {

    Route::group(['as'=>'userManagement.','prefix'=>'user_management'],function(){

        Route::group(['as'=>'permission.','prefix'=>'permission'],function(){
            Route::get('/index',[PermissionController::class,'index'])->name('index');
            Route::get('/create',[PermissionController::class,'create'])->name('create');
            Route::post('/store',[PermissionController::class,'store'])->name('store');
            Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[PermissionController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[PermissionController::class,'destroy'])->name('destroy');
        });

    });

});