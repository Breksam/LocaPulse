<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\FoundController;
use App\Http\Controllers\LostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('all-found-things', [FoundController::class, 'getAllFound']);
Route::get('all-lost-things', [LostController::class, 'getAllLost']);






