<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/bet', function () {
    return Inertia::render('Bet/index');
})->name('bet.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/betslips', function () {
    return Inertia::render('Bet/betslips');
})->name('bet.slips');

Route::middleware(['auth:sanctum'])->get('/place-bet', function () {
    return Inertia::render('Bet/stake');
})->name('bet.stake');

Route::get('/internal-bar' , function () {
    return view('test');

})->name('internal.bar');
