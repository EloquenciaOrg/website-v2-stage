<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reduction', function () {
    return view('reduction');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/rejoindre', function () {
    return view('rejoindre');
});

Route::get('/propos', function () {
    return view('propos');
});