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

Route::get('openDetails', [FormController::class, 'create'])->name('openDetails');
