<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MessagerieController;


// ROUTES VERS LES VUES

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/lecons', function () {
    return view('lecons');
});

Route::get('/remises', function () {
    return view('remises');
});

Route::get('/messagerie', function () {
    return view('messagerie');
});

Route::get('/gestion_admins', function () {
    return view('gestion_admins');
});

Route::get('/members', function () {
    return view('members');
});

Route::get('/parametre', function () {
    return view('parammetre');
});

// ROUTES POUR LES CONTROLLEURS

Route::get('/gestion_admins', [AdminsController::class, 'index']);
Route::put('/gestion_admins_update_password', [AdminsController::class, 'updatePassword']);


Route::get('/members', [MemberController::class, 'index']);
Route::get('/change_password', [MemberController::class, 'index_change_password']);
Route::put('/members_update_email', [MemberController::class, 'updateEmail']);
Route::post('/reset_password', [MemberController::class, 'reset']);
Route::put('/member_update_password', [MemberController::class, 'updatePassword']);


Route::get('/messagerie', [MessagerieController::class, 'index'])->name('filter');
Route::post('/envoie_mess', [MessagerieController::class, 'store']);
Route::delete('/supp_mess', [MessagerieController::class, 'supp'])->name('messagerie.delete');

