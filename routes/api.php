<?php

use App\Http\Controllers\{LojaController, ProdutoController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/lojas', [LojaController::class, 'index']);
Route::post('/lojas', [LojaController::class, 'store']);
Route::get('/lojas/{loja}', [LojaController::class, 'show'])->name('showLoja');
Route::put('/lojas/{loja}', [LojaController::class, 'update']);
Route::delete('/lojas/{loja}', [LojaController::class, 'destroy']);

Route::get('/lojas/{loja}/produtos', [ProdutoController::class, 'index']);
Route::post('/lojas/{loja}/produtos', [ProdutoController::class,  'store']);
Route::put('/lojas/{loja}/produtos', [ProdutoController::class,  'update']);
Route::get('/lojas/{loja}/produtos/{produto}', [ProdutoController::class, 'show']);

Route::delete('/lojas/{loja}/produtos/{produto}', [ProdutoController::class, 'destroy']);
Route::put('/lojas/{loja}/produtos/{produto}', [ProdutoController::class, 'update']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
