<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });

// ARTÍCULOS
Route::get('articulos', 'ArticulosController@index');
Route::get('ofertas',   'ArticulosController@dameOfertas');
Route::get('busqueda/{strBusqueda}', 'ArticulosController@busqueda');

//CLIENTES
Route::get('clientes', 'ClientesController@index');

//PEDIDOS
Route::get('pedidos', 'PedidosController@index');

//LINEAS_PEDIDOS
Route::get('lineas_pedido', 'Linea_PedidosController@index');