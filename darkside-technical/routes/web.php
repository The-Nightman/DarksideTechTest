<?php

use App\Http\Controllers\FormController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingPage', [
        'canOpenDetails' => Route::has('openDetails'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('my-details', [FormController::class, 'create'])->name('myDetails');
Route::post('add-details', [FormController::class, 'store'])->name('addDetails');
