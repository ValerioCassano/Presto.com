<?php

use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');


Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');


Route::get('/nuovo/prodotto', [ProductController::class, 'create'])->middleware('auth')->name('products.create');
Route::get('/dettaglio/prodotto/{product}', [ProductController::class, 'showProduct'])->name('products.show');

Route::get('/prodotti', [ProductController::class, 'indexProduct'])->name('products.index');

Route::get('/products/{product}/{relatedProduct?}', [ProductController::class, 'showProduct'])->name('products.show');

//Home revisore
Route::get('/revisor/home', [RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

//Accetta annuncio
Route::patch('/accetta/annuncio/{product}', [RevisorController::class, 'acceptProduct'])->middleware('isRevisor')->name('revisor.accept_product');

//Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{product}', [RevisorController::class, 'rejectProduct'])->middleware('isRevisor')->name('revisor.reject_product');

// Richiesta di  diventare revisore
Route::post('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//* Ricerca Annuncio
Route::get('/ricerca/annuncio', [PublicController::class, 'searchProducts'])->name('products.search');

//Rotta lavora con noi
Route::get('/contattaci/revisore', [RevisorController::class, 'emailRevisor'])->middleware('auth')->name('mail.revisor');

// cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');


