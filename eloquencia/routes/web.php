<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\MessagerieController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LessonController;
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

Route::get('/nos_services', function () {
    return view('nos_services');
});

Route::get('/propos', function () {
    return view('propos');
});

Route::get('/admin/admin', function () {
    return view('admin.admin');
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
Route::put('/gestion_admins_update_password', [AdminsController::class, 'updatePassword'])->middleware('auth:admin');
Route::post('/login_admin_gestion', [AdminsController::class, 'login'])->name('login_admin_attempt')->middleware('throttle.custom:5,1'); // max 5 tentatives par minute
Route::post('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');


Route::get('/admin/members', [MemberController::class, 'index'])->middleware('auth:admin');
Route::get('/change_password', [MemberController::class, 'index_change_password'])->middleware('auth:admin');
Route::put('/members_update_email', [MemberController::class, 'updateEmail'])->middleware('auth:admin');
Route::post('/reset_password', [MemberController::class, 'reset'])->middleware('auth:admin');
Route::put('/member_update_password', [MemberController::class, 'updatePassword'])->middleware('auth:admin');
Route::post('/login_member_site', [MemberController::class, 'login'])->name('login_attempt')->middleware('throttle.custom:5,1'); // max 5 tentatives par minute
Route::post('/logout', [MemberController::class, 'logout'])->name('member.logout');


Route::get('/admin/messagerie', [MessagerieController::class, 'index'])->name('filter')->middleware('auth:admin');
Route::post('/envoie_mess', [MessagerieController::class, 'store'])->middleware('throttle.custom:3,1'); // max 2 tentatives par 24h
Route::delete('/supp_mess', [MessagerieController::class, 'supp'])->name('messagerie.delete')->middleware('auth:admin');
Route::post('/ban-user-msg', [MessagerieController::class, 'banUser'])->name('ban.user.msg')->middleware('auth:admin');

Route::get('/admin/gestion_reduction', [ReductionController::class, 'index'])->middleware('auth:admin');
Route::post('/demande_reduction', [ReductionController::class, 'demande_reduction'])->middleware('throttle.custom:2,1'); // max 2 tentatives par 24h
Route::post('/reduction_accepte', [ReductionController::class, 'reduction_accepte'])->middleware('auth:admin');
Route::post('/reduction_refuse', [ReductionController::class, 'reduction_refuse'])->middleware('auth:admin');
Route::get('/download-proof/{id}', [ReductionController::class, 'downloadProof'])->name('download.proof')->middleware('auth:admin');
Route::post('/ban-user-reduc', [ReductionController::class, 'ban'])->name('ban.user.reduc')->middleware('auth:admin');

Route::get('/admin/parametre', [ParametreController::class, 'index'])->middleware('auth:admin');
Route::put('/notif_desactiver', [ParametreController::class, 'desactiver'])->middleware('auth:admin');
Route::put('/notif_activer', [ParametreController::class, 'activer'])->middleware('auth:admin');
Route::put('/notif_update', [ParametreController::class, 'update'])->middleware('auth:admin');
Route::post('/ajouter_partenaire', [ParametreController::class, 'partenaire_add'])->middleware('auth:admin');
Route::delete('/supprimer_patenaire', [ParametreController::class, 'partenaire_delete'])->middleware('auth:admin');
Route::delete('/supprimer_article', [BlogController::class, 'article_delete'])->middleware('auth:admin');
Route::post('/ajouter_article', [BlogController::class, 'article_add'])->middleware('auth:admin');

Route::get('/', [ParametreController::class, 'index_welcome']);

Route::get('/blog', [BlogController::class, 'index_blog']);
Route::get('/article/{id}', [BlogController::class, 'article'])->name('article.show');

Route::get('/lms/lms', [LessonController::class, 'index'])->middleware('auth:member');
Route::get('/lms/chapitre/{id}', [LessonController::class, 'chapitre'])->middleware('auth:member');
Route::post('/ajouter_lesson', [LessonController::class, 'ajouter_lesson'])->name('add_lesson')->middleware('auth:admin');
Route::get('/lecon/{id}', [LessonController::class, 'show'])->name('lecon.afficher')->middleware('auth:member');

Route::get('/admin/lecons', [LessonController::class, 'index_lecons'])->middleware('auth:admin');
Route::post('/admin/lecon_ajouter', [LessonController::class, 'lesson_add'])->middleware('auth:admin');
Route::post('/admin/chapitre_ajouter', [LessonController::class, 'chapter_add'])->middleware('auth:admin');
Route::delete('/admin/lecons_supp/{id}', [LessonController::class, 'lecon_delete'])->name('lecon.supprimer')->middleware('auth:admin');
Route::delete('/admin/chapitre_supp/{id}', [LessonController::class, 'chapitre_delete'])->name('chapitre.supprimer')->middleware('auth:admin');
Route::put('/admin/lecon_modifier/{id}', [LessonController::class, 'lecon_edit'])->name('lecon.modifier')->middleware('auth:admin');
Route::get('/admin/chap_edit/{id}', [lessonController::class, 'envoie_chap_modif'])->middleware('auth:admin')->name('chapitre.edit');
Route::put('/admin/chapitre_modifier/{id}', [LessonController::class, 'chapitre_edit'])->name('chapitre.modifier')->middleware('auth:admin');

// ROUTES POUR LE SYSTEME DE CAPTCHA

Route::get('/captcha-image', function () {
    $captcha = new Captcha();
    $captcha->generateCaptcha();
    exit;
})->name('captcha.image');

URL::forceScheme('https'); //force https 
