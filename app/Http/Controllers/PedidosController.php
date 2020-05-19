<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Pedido;
use App\LineasPedido;
use Carbon\Carbon;

class PedidosController extends Controller
{
    public function index()
    {
        $datosUsuario = Auth::user();
        
        $pedidos = Pedido::where('pedidos.cliente_id', $datosUsuario->id)
                    ->where('pedidos.estado','<>','carrito')
                    ->orderBy('pedidos.created_at', 'desc')
                    ->get();

        return (new Response($pedidos, "200"));
    }

    // sobra
    /*
    public function damePedido()
    {   
        $datosUsuario = Auth::user();
        
        $pedidos = Pedido::where('pedidos.cliente_id', $datosUsuario->id)
                    ->where('pedidos.estado', 'pedido')
                    ->get();

        return (new Response($pedidos, "200"));
    }
    */

    public function carrito()
    {
        $datosUsuario = Auth::user();
        
        $datosCarrito = Pedido::where('pedidos.cliente_id', $datosUsuario->id)
                        ->where('pedidos.estado','carrito')
                        ->first();

        $lineasCarrito = LineasPedido::select('lineas_pedido.*','articulos.nombre','articulos.precio')
                        ->join('articulos','articulos.id','lineas_pedido.articulo_id')
                        ->where('lineas_pedido.pedido_id', $datosCarrito->id)
                        ->orderBy('lineas_pedido.created_at','desc')
                        ->get();

        $datosCarrito["lineas"] = $lineasCarrito;
            
        return (new Response($datosCarrito, "200"));
    }

    public function borraLineaPedido($lineaId) {
        $borrado = LineasPedido::where('id',$lineaId)
                    ->delete();
        return (new Response($borrado, "200"));
    }

  
    function insertaLineaPedido(Request $request ) {
        $nuevaLinea = new LineasPedido();

        $nuevaLinea->pedido_id      = $request["pedido_id"];
        $nuevaLinea->articulo_id    = $request["articulo_id"];
        $nuevaLinea->talla          = $request["talla"];
        $nuevaLinea->color          = $request["color"];
        $nuevaLinea->cantidad       = $request["cantidad"];
        $nuevaLinea->total          = $request["total"];

        $nuevaLinea->save();

        return (new Response($nuevaLinea, "200"));
    }

    public function confirmaPedido($pedidoId) {

        $total_lineas = LineasPedido::where('lineas_pedido.pedido_id', $pedidoId)
                    ->sum('total');

        $pedido = Pedido::where('pedidos.id', $pedidoId)
                    ->first();
        
        if(($pedido->count())>0) {
            $pedido->estado = 'pedido';
            $pedido->fecha = Carbon::now()->format('Y-m-d H:i:s');
            $pedido->total = $total_lineas;
            $pedido->save();
        }

        return (new Response($pedido, "200"));
    }

    public function crearCarrito() {

        $datosUsuario = Auth::user();

        $carrito = new Pedido;
        
        $carrito->cliente_id = $datosUsuario->id;
        $carrito->fecha = Carbon::now()->format('Y-m-d H:i:s');
        $carrito->estado = 'carrito';

        $carrito->save();

        return (new Response($carrito, "200"));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
