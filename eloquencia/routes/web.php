<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ParametreController;


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

Route::get('/gestion_reduction', function () {
    return view('gestion_reduction');
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

Route::get('/mentions_legales', function () {
    return view('mentions_legales');
});

Route::get('/parametre', function () {
    return view('parametre');
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

Route::get('/gestion_reduction', [ReductionController::class, 'index']);
Route::post('/demande_reduction', [ReductionController::class, 'demande_reduction']);
Route::post('/reduction_accepte', [ReductionController::class, 'reduction_accepte']);
Route::post('/reduction_refuse', [ReductionController::class, 'reduction_refuse']);
Route::get('/download-proof/{id}', [ReductionController::class, 'downloadProof'])->name('download.proof');

Route::get('/parametre', [ParametreController::class, 'index']);
Route::put('/notif_desactiver', [ParametreController::class, 'desactiver']);
Route::put('/notif_activer', [ParametreController::class, 'activer']);
Route::put('/notif_update', [ParametreController::class, 'update']);
Route::delete('/supprimer_article', [ParametreController::class, 'article_delete']);
Route::post('/ajouter_article', [ParametreController::class, 'article_add']);
Route::delete('/supprimer_blog_article', [ParametreController::class, 'article_blog_delete']);
Route::post('/ajouter_blog_article', [ParametreController::class, 'article_blog_add']);
Route::post('/ajouter_partenaire', [ParametreController::class, 'partenaire_add']);
Route::delete('/supprimer_patenaire', [ParametreController::class, 'partenaire_delete']);

Route::get('/', [ParametreController::class, 'index_welcome']);

Route::get('/blog', [ParametreController::class, 'index_blog']);


