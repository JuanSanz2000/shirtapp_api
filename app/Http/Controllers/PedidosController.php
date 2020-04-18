<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Pedido;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::get();
        return (new Response($pedidos, "200"));
    }

        /*
        $datosUsuario = auth['api']->user();
        
        $pedidos = Pedido::where('usuario_id', $datosUsuario->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return (new Response($pedidos, "200"));
    }
*/
    public function damePedidosRealizados()
    {
        $total = Pedido::where('cliente_id', 1)
        ->orderBy('fecha', 'desc')
        ->get();
        return (new Response($total, "200"));
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
