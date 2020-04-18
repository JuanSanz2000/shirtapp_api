<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();
        return (new Response($clientes, "200"));
    }

    public function login(Request $request)
    {     
        
        $cliente = Cliente::where('email', $request->email)->first();
        
        if (!$cliente) {
            return (new Response(null, "401"));
        }

        if (Hash::check($request->password, $cliente->password)) {
            $return["cliente"] = $cliente;
            $return["token"] =  $cliente->createToken('ShirtApp')->accessToken;
            return (new Response($return, "200"));
            
        } else {
            return (new Response(null, "401"));
        }   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
