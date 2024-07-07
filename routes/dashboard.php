<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => ['auth'],
    "prefix"=>'dashboard'
],
    function (){
        Route::get('dashboard' , [DashboardController::class , 'index'])->name('dashboard');


        Route::resource('/categories', CategoriesController::class);
        Route::get('categories/trashed' , [CategoriesController::class , 'trashed']);
        Route::put('categories/restore' , [CategoriesController::class , 'restore']);
        Route::delete('categories/forceDelete' , [CategoriesController::class , 'forceDelete']);

        Route::resource('/products', ProductsController::class);
    }   
);