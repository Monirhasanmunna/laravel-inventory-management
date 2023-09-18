<?php

use App\Http\Controllers\Backend\UserManagement\PermissionController;
use App\Http\Controllers\Backend\UserManagement\PermissionInRoleController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
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


        Route::group(['as'=>'role.','prefix'=>'role'],function(){
            Route::get('/index',[RoleController::class,'index'])->name('index');
            Route::get('/create',[RoleController::class,'create'])->name('create');
            Route::post('/store',[RoleController::class,'store'])->name('store');
            Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[RoleController::class,'update'])->name('update');
            Route::put('/destroy/{id}',[RoleController::class,'destroy'])->name('destroy');


            Route::group(['as'=>'permission.','prefix'=>'permission'],function(){
                Route::get('/create/{id}',[PermissionInRoleController::class,'create'])->name('create');
                Route::post('/store',[PermissionInRoleController::class,'store'])->name('store');
                Route::get('/edit/{id}',[PermissionInRoleController::class,'edit'])->name('edit');
                Route::put('/update/{id}',[PermissionInRoleController::class,'update'])->name('update');
                Route::put('/destroy/{id}',[PermissionInRoleController::class,'destroy'])->name('destroy');
            });

        });



    });

});