<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//IF ROUTES
Route::get('/', [App\Http\Controllers\DecidingController::class, 'index'])->name('decision');

//SPOT ROUTES
Route::get('/spot', [App\Http\Controllers\Spot\HomeController::class, 'index'])->name('spot');
Route::get('/spot/home', [App\Http\Controllers\Spot\HomeController::class, 'index'])->name('homeSpot');
Route::get('/spot/consultaBanco', [App\Http\Controllers\Spot\ProdutosController::class, 'consultaBanco'])->name('consultaBancoSpot');
Route::get('/spot/view/{ProdReference}', [App\Http\Controllers\Spot\ProdutosController::class, 'viewProduct'])->name('viewProduct');

//SPOT ORDERS FILTERS ROUTES
Route::get('/spot/consultaBanco/orderCodigo', [App\Http\Controllers\spot\ProdutosController::class, 'orderCodigo'])->name('orderCodigoSpot');
Route::get('/spot/consultaBanco/orderNome', [App\Http\Controllers\spot\ProdutosController::class, 'orderNome'])->name('orderNomeSpot');
Route::get('/spot/consultaBanco/orderCategoria', [App\Http\Controllers\spot\ProdutosController::class, 'orderCategoria'])->name('orderCategoriaSpot');
Route::get('/spot/consultaBanco/orderMarca', [App\Http\Controllers\spot\ProdutosController::class, 'orderMarca'])->name('orderMarcaSpot');

//XBZ ROUTES
Route::get('/xbz', [App\Http\Controllers\Xbz\HomeController::class, 'index'])->name('xbz');
Route::get('/xbz/home', [App\Http\Controllers\Xbz\HomeController::class, 'index'])->name('home');
Route::get('/xbz/consultaBanco', [App\Http\Controllers\Xbz\ProdutosController::class, 'consultaBanco'])->name('consultaBanco');

//XBZ ORDERS FILTERS ROUTES
Route::get('/xbz/consultaBanco/orderCodigo', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderCodigo'])->name('orderCodigo');
Route::get('/xbz/consultaBanco/orderNome', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderNome'])->name('orderNome');
Route::get('/xbz/consultaBanco/orderCor', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderCor'])->name('orderCor');
Route::get('/xbz/consultaBanco/orderStatus', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderStatus'])->name('orderStatus');
