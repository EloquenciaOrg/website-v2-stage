<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\BlogController;
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

Route::get('/lms/lms', function () {
    return view('lms.lms');
})->middleware('auth:member');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/login_admin', function () {
    return view('admin.login_admin');
})->name('login_admin');

Route::get('/password_forgot', function () {
    return view('admin.password_forgot');
});


// ROUTES POUR LES CONTROLLEURS

Route::get('/admin/gestion_admins', [AdminsController::class, 'index'])->middleware('auth:admin');
Route::put('/gestion_admins_update_password', [AdminsController::class, 'updatePassword']);
Route::post('/login_admin_gestion', [AdminsController::class, 'login'])->name('login_admin_attempt')->middleware('throttle.custom:5,1'); // max 5 tentatives par minute
Route::post('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');


Route::get('/admin/members', [MemberController::class, 'index'])->middleware('auth:admin');
Route::get('/change_password', [MemberController::class, 'index_change_password']);
Route::put('/members_update_email', [MemberController::class, 'updateEmail']);
Route::post('/reset_password', [MemberController::class, 'reset']);
Route::put('/member_update_password', [MemberController::class, 'updatePassword']);
Route::post('/login_member_site', [MemberController::class, 'login'])->name('login_attempt')->middleware('throttle.custom:5,1'); // max 5 tentatives par minute
Route::post('/logout', [MemberController::class, 'logout'])->name('member.logout');


Route::get('/admin/messagerie', [MessagerieController::class, 'index'])->name('filter')->middleware('auth:admin');
Route::post('/envoie_mess', [MessagerieController::class, 'store'])->middleware('throttle.custom:3,1'); // max 2 tentatives par 24h
Route::delete('/supp_mess', [MessagerieController::class, 'supp'])->name('messagerie.delete');
Route::post('/ban-user-msg', [MessagerieController::class, 'banUser'])->name('ban.user.msg');

Route::get('/admin/gestion_reduction', [ReductionController::class, 'index'])->middleware('auth:admin');
Route::post('/demande_reduction', [ReductionController::class, 'demande_reduction'])->middleware('throttle.custom:2,1'); // max 2 tentatives par 24h
Route::post('/reduction_accepte', [ReductionController::class, 'reduction_accepte']);
Route::post('/reduction_refuse', [ReductionController::class, 'reduction_refuse']);
Route::get('/download-proof/{id}', [ReductionController::class, 'downloadProof'])->name('download.proof');
Route::post('/ban-user-reduc', [ReductionController::class, 'ban'])->name('ban.user.reduc');

Route::get('/admin/parametre', [ParametreController::class, 'index'])->middleware('auth:admin');
Route::put('/notif_desactiver', [ParametreController::class, 'desactiver']);
Route::put('/notif_activer', [ParametreController::class, 'activer']);
Route::put('/notif_update', [ParametreController::class, 'update']);
Route::post('/ajouter_partenaire', [ParametreController::class, 'partenaire_add']);
Route::delete('/supprimer_patenaire', [ParametreController::class, 'partenaire_delete']);
Route::delete('/supprimer_article', [BlogController::class, 'article_delete']);
Route::post('/ajouter_article', [BlogController::class, 'article_add']);

Route::get('/', [ParametreController::class, 'index_welcome']);

Route::get('/blog', [BlogController::class, 'index_blog']);
Route::get('/article/{id}', [BlogController::class, 'article'])->name('article.show');

// ROUTES POUR LE SYSTEME DE CAPTCHA

Route::get('/captcha-image', function () {
    $captcha = new Captcha();
    $captcha->generateCaptcha();
    exit;
})->name('captcha.image');
