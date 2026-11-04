<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/catalogo', [SiteController::class, 'catalog'])->name('catalog');
Route::get('/soluciones/{slug}', [SiteController::class, 'serviceShow'])->name('service.show');
Route::get('/contacto', [SiteController::class, 'contact'])->name('contact');
Route::post('/cotizacion', [SiteController::class, 'submitQuote'])->name('quote.submit');
Route::get('/aviso-de-privacidad', [SiteController::class, 'privacy'])->name('privacy');
Route::get('/terminos-y-condiciones', [SiteController::class, 'terms'])->name('terms');
