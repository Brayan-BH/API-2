<?php

use App\Http\Controllers\v1\ProductosController;
use App\Http\Controllers\v1\CategoriasController;
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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api1', function () {
    return "Hola mundo";
});*/

//Productos
Route::get('/v1/productos', [ProductosController::class,'getAll']); //recupera todo
Route::get('/v1/productos/{id}', [ProductosController::class,'getItem']);//recupera solo un producto
Route::post('/v1/productos', [ProductosController::class,'store']);

Route::put('/v1/productos', [ProductosController::class,'putUpdate']);

Route::patch('/v1/productos', [ProductosController::class,'patchUpdate']);
Route::delete('/v1/productos/{id}', [ProductosController::class,'delete']);


// Categorias
Route::get('/v1/categorias', [CategoriasController::class,'getAll']); //recupera todo
Route::get('/v1/categorias/{id}', [CategoriasController::class,'getItem']);//recupera solo un producto
Route::post('/v1/categorias', [CategoriasController::class,'store']);

Route::put('/v1/categorias', [CategoriasController::class,'putUpdate']);

Route::patch('/v1/categorias', [CategoriasController::class,'patchUpdate']);
Route::delete('/v1/categorias/{id}', [CategoriasController::class,'delete']);




