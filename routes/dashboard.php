<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\DashboardController;

Route::group([
    "middleware" => ['auth'],
    "prefix"=>'dashboard'
],
    function (){
        Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashboard');


        Route::resource('/categories', CategoriesController::class);

        Route::resource('/products', ProductsController::class);
    }   
);


