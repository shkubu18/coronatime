<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CovidStatisticController;
use App\Http\Controllers\LanguageController;

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

// language
Route::get('locale/{language}', [LanguageController::class, 'setLocale'])->name('locale.set');

Route::middleware('guest')->group(function () {
	// registration
	Route::view('/registration', 'register.create')->name('register.page');
	Route::post('/registration', [RegistrationController::class, 'createUser'])->name('register.create');

	// email verification
	Route::prefix('email')->group(function () {
		Route::view('confirmation-sent', 'verifications.email-confirmation-sent')->name('email.confirmation_sent');
		Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
		Route::view('verified', 'verifications.email-verified')->name('verification.notice');
	});

	// authorization
	Route::view('/login', 'auth.login')->name('login.page');
	Route::post('/login', [AuthController::class, 'login'])->name('login');

	// password reset
	Route::view('/forgot-password', 'reset-password.forgot-password')->name('password.request');
	Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->name('password.email');
	Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
	Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
	Route::view('/password-updated', 'reset-password.password-updated')->name('password.updated');
});

Route::middleware('auth')->group(function () {
	// logout
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

	//statistics
	Route::get('/statistics/worldwide', [CovidStatisticController::class, 'worldwideStatistics'])->name('dashboard.worldwide');
	Route::get('/statistics/by-country', [CovidStatisticController::class, 'statisticsByCountry'])->name('dashboard.by_country');
});
