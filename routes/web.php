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
Route::get('/ju', [App\Http\Controllers\Spot\HomeController::class, 'index'])->name('spot');
Route::get('/ju/consultaBanco', [App\Http\Controllers\Spot\ProdutosController::class, 'consultaBanco'])->name('consultaBancoSpot');

//SPOT ORDERS FILTERS ROUTES
Route::get('/ju/consultaBanco/orderCodigo', [App\Http\Controllers\spot\ProdutosController::class, 'orderCodigo'])->name('orderCodigoSpot');
Route::get('/ju/consultaBanco/orderNome', [App\Http\Controllers\spot\ProdutosController::class, 'orderNome'])->name('orderNomeSpot');
Route::get('/ju/consultaBanco/orderCategoria', [App\Http\Controllers\spot\ProdutosController::class, 'orderCategoria'])->name('orderCategoriaSpot');

//XBZ ROUTES
Route::get('/charlles', [App\Http\Controllers\Xbz\HomeController::class, 'index'])->name('xbz');
Route::get('/charlles/consultaBanco', [App\Http\Controllers\Xbz\ProdutosController::class, 'consultaBanco'])->name('consultaBanco');

//XBZ ORDERS FILTERS ROUTES
Route::get('/charlles/consultaBanco/orderCodigo', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderCodigo'])->name('orderCodigo');
Route::get('/charlles/consultaBanco/orderNome', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderNome'])->name('orderNome');
Route::get('/charlles/consultaBanco/orderCor', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderCor'])->name('orderCor');
Route::get('/charlles/consultaBanco/orderStatus', [App\Http\Controllers\Xbz\ProdutosController::class, 'orderStatus'])->name('orderStatus');


//API JOB
Route::get('/job/xbz/refreshDatabase', [App\Http\Controllers\JobController::class, 'refreshDatabaseXbz']);
Route::get('/job/spot/refreshDatabase', [App\Http\Controllers\JobController::class, 'refreshDatabaseSpot']);
Route::get('/job/spot/refreshStock', [App\Http\Controllers\JobController::class, 'refreshStock']);

