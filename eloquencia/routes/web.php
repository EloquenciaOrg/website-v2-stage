<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ParametreController;
use App\Services\Captcha;


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

Route::get('/admin/admin', function () {
    return view('admin.admin');
})->middleware('auth:admin');

Route::get('/admin/lecons', function () {
    return view('admin.lecons');
})->middleware('auth:admin');

Route::get('/admin/gestion_reduction', function () {
    return view('admin.gestion_reduction');
})->middleware('auth:admin');

Route::get('/admin/messagerie', function () {
    return view('admin.messagerie');
})->middleware('auth:admin');

Route::get('/admin/gestion_admins', function () {
    return view('admin.gestion_admins');
})->middleware('auth:admin');

Route::get('/admin/members', function () {
    return view('admin.members');
})->middleware('auth:admin');

Route::get('/mentions_legales', function () {
    return view('mentions_legales');
});

Route::get('/admin/parametre', function () {
    return view('admin.parametre');
})->middleware('auth:admin');

Route::get('/lms', function () {
    return view('lms');
})->middleware('auth:member');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/login_admin', function () {
    return view('admin.login_admin');
})->name('login_admin');


// ROUTES POUR LES CONTROLLEURS

Route::get('/gestion_admins', [AdminsController::class, 'index']);
Route::put('/gestion_admins_update_password', [AdminsController::class, 'updatePassword']);
Route::post('/login_admin', [AdminsController::class, 'login'])->name('login_admin_attempt');
Route::post('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');


Route::get('/members', [MemberController::class, 'index']);
Route::get('/change_password', [MemberController::class, 'index_change_password']);
Route::put('/members_update_email', [MemberController::class, 'updateEmail']);
Route::post('/reset_password', [MemberController::class, 'reset']);
Route::put('/member_update_password', [MemberController::class, 'updatePassword']);
Route::post('/login', [MemberController::class, 'login'])->name('login_attempt');
Route::post('/admin/logout', [MemberController::class, 'logout'])->name('member.logout');


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

// ROUTES POUR LE SYSTEME DE CAPTCHA

Route::get('/captcha-image', function () {
    $captcha = new Captcha();
    $captcha->generateCaptcha();
    exit;
})->name('captcha.image');
