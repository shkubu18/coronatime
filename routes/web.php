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

Route::get('/', function () {
	return redirect('/login');
});

Route::view('/login', 'auth.login')->name('login.page');

Route::middleware('auth')->group(function () {
	Route::view('/statistics/worldwide', 'user.dashboard.worldwide')->name('dashboard.worldwide');
	Route::view('/statistics/by-country', 'user.dashboard.by-country')->name('dashboard.by_country');
});

Route::view('/reset-password', 'reset-password.email-verify')->name('password.verify_email');
Route::view('/new-password', 'reset-password.reset')->name('password.reset');
Route::view('/password-updated', 'hints.password-updated')->name('password.updated');

Route::view('/registration', 'register.create')->name('register.page');

Route::post('/registration', [RegistrationController::class, 'createUser'])->name('register.create');

Route::prefix('email')->group(function () {
	Route::view('confirmation-sent', 'verifications.email-confirmation-sent')->name('email.confirmation_sent');
	Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
	Route::view('verified', 'verifications.email-verified')->name('verification.notice');
});
