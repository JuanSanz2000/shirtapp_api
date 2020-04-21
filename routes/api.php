<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });

//LOGIN
Route::post('login', 'ClientesController@login');

// ARTÍCULOS
Route::get('articulos', 'ArticulosController@index');
Route::get('ofertas',   'ArticulosController@dameOfertas');
Route::get('busqueda/{strBusqueda}', 'ArticulosController@busqueda');

//CLIENTES
Route::get('clientes', 'ClientesController@index');

//PEDIDOS
Route::middleware('auth:api')->get('pedidos', 'PedidosController@index');

//LINEAS_PEDIDOS
Route::get('lineas_pedido', 'Linea_PedidosController@index');