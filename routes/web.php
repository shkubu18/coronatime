<?php

use Illuminate\Support\Facades\Route;
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
	return redirect()->route('worldwide_statistics.show');
});

// language
Route::get('locale/{language}', [LanguageController::class, 'setLocale'])->name('locale');

Route::middleware('guest')->group(function () {
	// registration
	Route::view('/registration', 'register.create')->name('register.show');
	Route::post('/registration', [AuthController::class, 'register'])->name('register.create');

	// email verification
	Route::prefix('email')->group(function () {
		Route::view('confirmation-sent', 'verifications.email-confirmation-sent')->name('verification.email_sent');
		Route::get('verify/{token}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
		Route::view('verified', 'verifications.email-verified')->name('verification.notice');
	});

	// authorization
	Route::view('/login', 'auth.login')->name('login.page');
	Route::post('/login', [AuthController::class, 'login'])->name('login');

	// password reset
	Route::prefix('password')->group(function () {
		Route::view('forgot', 'reset-password.forgot-password')->name('password.request');
		Route::post('forgot', [ResetPasswordController::class, 'sendPasswordResetLink'])->name('password.email');
		Route::get('reset/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
		Route::post('reset', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
		Route::view('updated', 'reset-password.password-updated')->name('password.updated');
	});
});

Route::middleware('auth')->group(function () {
	// logout
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

	//statistics
	Route::prefix('statistics')->group(function () {
		Route::get('worldwide', [CovidStatisticController::class, 'worldwideStatistics'])->name('worldwide_statistics.show');
		Route::get('by-country', [CovidStatisticController::class, 'statisticsByCountry'])->name('by_country_statistics.show');
	});
});
