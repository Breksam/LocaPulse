<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\FoundController;
use App\Http\Controllers\LostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AppController::class)->group(function(){
    Route::get('/','home')->name('app.index');
    Route::get('/my-account','acconunt')->name('app.acconunt');  
    Route::get('/my-account/yes/{id}','yes')->name('app.yes');  
    Route::get('/my-account/no/{id}','no')->name('app.no');  
});

Route::middleware(['auth'])->group(function () {

    Route::controller(LostController::class)->group(function(){
        Route::get('/lostItem','index')->name('lost.index');
        Route::post('/lostItem/store','store')->name('lost.store');
        Route::get('/lostItem/delete/{id}','delete')->name('lost.delete');
    });
    
    Route::controller(FoundController::class)->group(function(){
        Route::get('/foundItem','index')->name('found.index');
        Route::post('/foundItem/store','store')->name('found.store');
        Route::get('/foundItem/delete/{id}','delete')->name('found.delete');
        Route::get('/foundItem/notifyFound','notifyFound')->name('found.notifyFound');
        
    });
    
});


Auth::routes();
