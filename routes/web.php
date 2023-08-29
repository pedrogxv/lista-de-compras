<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['splade'])->group(function () {
    Route::resource('/home', HomeController::class)
        ->only(['index', 'store']);
    Route::resource('/lista', ListaController::class)
        ->only(['show', 'store']);

    Route::redirect("/", \route('home.index'));

    Route::get('/docs', fn () => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
