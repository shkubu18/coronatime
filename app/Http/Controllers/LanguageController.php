<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
	public function setLocale(string $language): RedirectResponse
	{
		App::setLocale($language);
		Session::put('locale', $language);

		return redirect()->back();
	}
}
