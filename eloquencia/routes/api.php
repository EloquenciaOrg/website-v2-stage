<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;

Route::get('/blog', [BlogApiController::class, 'index']);

Route::post('/contact', [ContactApiController::class, 'index']);

Route::post('/discount', [ReductionApiController::class, 'index'])->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    // --------------- Login ----------------//
    Route::post('login', 'AuthenticationController@login')->name('login');
    
    // ------------------ Get Data ----------------------//
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-user', 'AuthenticationController@userInfo')->name('get-user');
        Route::post('logout', 'AuthenticationController@logOut')->name('logout');
    });
});
