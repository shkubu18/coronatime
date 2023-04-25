<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
	return redirect()->route('dashboard.worldwide');
});

Route::middleware('guest')->group(function () {
	Route::view('/login', 'auth.login')->name('login.page');
	Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::view('/registration', 'register.create')->name('register.page');

Route::post('/registration', [RegistrationController::class, 'createUser'])->name('register.create');

Route::prefix('email')->group(function () {
	Route::view('confirmation-sent', 'verifications.email-confirmation-sent')->name('email.confirmation_sent');
	Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
	Route::view('verified', 'verifications.email-verified')->name('verification.notice');
});
