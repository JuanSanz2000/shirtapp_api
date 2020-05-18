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
Route::middleware('auth:api')->get('articulo/{idArticulo}', 'ArticulosController@dameDetalles');

//CLIENTES
Route::middleware('auth:api')->get('clientes', 'ClientesController@index');

//PEDIDOS
Route::middleware('auth:api')->get('pedidos',                       'PedidosController@index');
//Route::middleware('auth:api')->get('pedidos/datos',                 'PedidosController@damePedido');

//CARRITOS
Route::middleware('auth:api')->get('carrito',                       'PedidosController@carrito');
Route::middleware('auth:api')->delete('carrito/linea/{lineaId}',    'PedidosController@borraLineaPedido');
Route::middleware('auth:api')->post('carrito/linea',                'PedidosController@insertaLineaPedido');
Route::middleware('auth:api')->get('carrito/confirma/{pedidoId}',   'PedidosController@confirmaPedido');
Route::middleware('auth:api')->get('carrito/nuevo',                 'PedidosController@crearCarrito');