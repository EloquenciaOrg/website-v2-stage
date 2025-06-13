<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\ReductionApiController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\LmsController;

Route::get('/blog', [BlogApiController::class, 'index']);

Route::get('/lms', [LmsController::class, 'index']);

Route::post('/contact', [ContactApiController::class, 'index'])->middleware('auth:sanctum');

Route::post('/discount', [ReductionApiController::class, 'index'])->middleware('auth:sanctum');

Route::post('login', [AuthenticationController::class, 'login'])->name('login_api');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo'])->name('get-user');
    Route::post('logout', [AuthenticationController::class, 'logOut'])->name('logout');
});

URL::forceScheme('https'); //force https