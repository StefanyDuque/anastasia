<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('usuarios', 'usuarioAPIController');

Route::resource('sesions', 'sesionAPIController');

Route::resource('servicios', 'servicioAPIController');

Route::resource('detalle_servicios', 'detalle_servicioAPIController');

Route::resource('categorias', 'categoriaAPIController');

Route::resource('productos', 'productoAPIController');

Route::resource('pedidos', 'pedidoAPIController');

Route::resource('detalle_pedidos', 'detalle_pedidoAPIController');
