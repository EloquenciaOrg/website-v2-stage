<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\ReductionApiController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ContactApiController;

Route::get('/blog', [BlogApiController::class, 'index']);

Route::post('/contact', [ContactApiController::class, 'index']);

Route::post('/discount', [ReductionApiController::class, 'index']);

Route::post('login', [AuthenticationController::class, 'login'])->name('login_api');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo'])->name('get-user');
    Route::post('logout', [AuthenticationController::class, 'logOut'])->name('logout');
});

