<?php

use App\Http\Controllers\v1\ProductosController;
use App\Http\Controllers\v1\CategoriasController;
use App\Http\Controllers\v1\VentasController;
use App\Http\Controllers\v1\AutorizacionController;
use App\Http\Controllers\v1\UsersController;

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
Route::get('/v1/categorias', [CategoriasController::class,'getAll']); //recupera todo
Route::get('/v1/categorias/{id}', [CategoriasController::class,'getItem']);//recupera solo un producto
Route::get('/v1/ventas', [VentasController::class,'getAll']); //recupera todo
Route::get('/v1/ventas/{id}', [VentasController::class,'getItem']);//recupera solo un producto

Route::post('/v1/seguridad/login', [AutorizacionController::class,'login']); 


Route::middleware('auth:api')->group(function () {


    Route::post('/v1/productos', [ProductosController::class,'store']);
    Route::put('/v1/productos', [ProductosController::class,'putUpdate']);
    Route::patch('/v1/productos', [ProductosController::class,'patchUpdate']);
    Route::delete('/v1/productos/{id}', [ProductosController::class,'delete']);
    
    // Categorias
    
    Route::post('/v1/categorias', [CategoriasController::class,'store']);
    Route::put('/v1/categorias', [CategoriasController::class,'putUpdate']);
    Route::patch('/v1/categorias', [CategoriasController::class,'patchUpdate']);
    Route::delete('/v1/categorias/{id}', [CategoriasController::class,'delete']);
    
    // Ventas
    
    Route::post('/v1/ventas', [VentasController::class,'store']);
    Route::put('/v1/ventas', [VentasController::class,'putUpdate']);
    Route::patch('/v1/ventas', [VentasController::class,'patchUpdate']);
    Route::delete('/v1/ventas/{id}', [VentasController::class,'delete']);
    
    
    Route::post('/v1/users',[UsersController::class,'save']);

});





