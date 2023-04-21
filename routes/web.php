<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/registration', 'register.create')->name('register.page');

Route::post('/registration', [RegistrationController::class, 'createUser'])->name('register.create');

Route::view('/email/confirmation-sent', 'verifications.email-confirmation-sent')->name('email.confirmation_sent');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

Route::view('/email/verified', 'verifications.email-verified')->name('verification.notice');
