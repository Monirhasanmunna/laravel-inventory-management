<?php

use App\Http\Controllers\Backend\UserManagement\PermissionController;
use App\Http\Controllers\Backend\UserManagement\PermissionInRoleController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
use App\Http\Controllers\Backend\UserManagement\UserController;
use Illuminate\Support\Facades\Route;




Route::group(['as'=>'userManagement.','prefix'=>'user_management', 'middleware' => ['permission:user_management.permissions']],function(){

    Route::group(['as'=>'permission.','prefix'=>'permission'],function(){
        Route::get('/index',[PermissionController::class,'index'])->name('index');
        Route::get('/create',[PermissionController::class,'create'])->name('create');
        Route::post('/store',[PermissionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PermissionController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[PermissionController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'role.','prefix'=>'role', 'middleware' => ['permission:user_management.roles']],function(){
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


    Route::group(['as'=>'user.','prefix'=>'user', 'middleware' => ['permission:user_management.users']],function(){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[UserController::class,'update'])->name('update');
        Route::put('/destroy/{id}',[UserController::class,'destroy'])->name('destroy');
    });

});
