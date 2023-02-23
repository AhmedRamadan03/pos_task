<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::group(['middleware' => 'auth:web'], function () {

    // customer routes
    Route::group(['prefix'=>'/customers'] , function(){
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/' , 'index')->name('customer.index');
            Route::post('/store' , 'store')->name('customer.store');
            Route::post('/update/{customer}' , 'update')->name('customer.update');
            Route::get('/destroy/{customer}' , 'destroy')->name('customer.destroy');
        });
    });
    // product routes
    Route::group(['prefix'=>'/products'] , function(){
        Route::controller(ProductController::class)->group(function () {
            Route::get('/' , 'index')->name('product.index');
            Route::post('/store' , 'store')->name('product.store');
            Route::post('/update/{product}' , 'update')->name('product.update');
            Route::get('/destroy/{product}' , 'destroy')->name('product.destroy');
        });
    });
    // order routes
    Route::group(['prefix'=>'/orders'] , function(){
        Route::controller(OrderController::class)->group(function () {
            Route::get('/' , 'index')->name('order.index');
            Route::get('/store/create' , 'create')->name('order.create');
            Route::post('/store' , 'store')->name('order.store');
            Route::get('/store/edit/{order}' , 'edit')->name('order.edit');
            Route::post('/update/{order}' , 'update')->name('order.update');
            Route::get('/destroy/{order}' , 'destroy')->name('order.destroy');
        });
    });
});


Route::any('{url}', function(){
    return view('404');
})->where('url', '.*');

