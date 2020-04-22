<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });

//LOGIN
Route::post('login', 'ClientesController@login');

// ARTÍCULOS
Route::middleware('auth:api')->get('articulos', 'ArticulosController@index');
Route::middleware('auth:api')->get('ofertas',   'ArticulosController@dameOfertas');
Route::middleware('auth:api')->get('busqueda/{strBusqueda}', 'ArticulosController@busqueda');

//CLIENTES
Route::middleware('auth:api')->get('clientes', 'ClientesController@index');

//PEDIDOS
Route::middleware('auth:api')->get('pedidos', 'PedidosController@index');

//LINEAS_PEDIDOS
Route::middleware('auth:api')->get('lineas_pedido', 'Linea_PedidosController@index');