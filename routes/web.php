<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('welcome');
});

// ====================
// PUBLIC CONTACT FORM
// ====================

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


// ====================
// ADMIN LOGIN
// ====================

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');


// ====================
// PROTECTED ADMIN ROUTES
// ====================

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/messages', [AdminController::class, 'messages'])
        ->name('admin.messages');

    Route::get('/admin/messages/{id}', [AdminController::class, 'show'])
        ->name('admin.message.show');

    Route::get('/admin/messages/{id}/reply', [AdminController::class, 'replyForm'])
        ->name('admin.message.reply.form');

    Route::post('/admin/messages/{id}/reply', [AdminController::class, 'reply'])
        ->name('admin.message.reply');

    Route::post('/admin/messages/{id}/resolve', [AdminController::class, 'resolve'])
        ->name('admin.message.resolve');

    Route::post('/admin/messages/{id}/archive', [AdminController::class, 'archive'])
        ->name('admin.message.archive');

    Route::delete('/admin/messages/{id}', [AdminController::class, 'delete'])
        ->name('admin.message.delete');
});