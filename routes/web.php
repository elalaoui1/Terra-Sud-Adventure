<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fr', 'es'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');



