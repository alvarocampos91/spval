<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mensaje::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nueva_area');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = Mensaje::create($request->all());

        return response()->json($mensaje,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        return $mensaje;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje)
    {
        return view('editar_mensaje');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        $mensaje->update($request->all());

        return response()->json($mensaje,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();

        return response()->json(null,204);
    }
}
