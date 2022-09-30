<?php

use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view("/", "welcome");
Route::view("/home", "welcome");


Route::get("/locale/{lang?}", function ($lang) {

    $storedLocale = (session()->has("locale") && session()->get("locale") == "ar") ? "en" : "ar";

    session()->put('locale', $lang ?: $storedLocale);

    return redirect()->back();

})->name('locale');




Route::group([ 'prefix' => '/profile','as' => 'profile.', 'middleware' => 'auth'], function () {
    Route::view('/', "dashboard.pages.profile.index")->name("index");

    Route::post('/', ProfileController::class)->name("update");
});


Auth::routes(['register' => false]);
