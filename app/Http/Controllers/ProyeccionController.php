<?php

namespace App\Http\Controllers;

use App\Proyeccion;
use Illuminate\Http\Request;

class ProyeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matricula = $request->input('matricula');
        
        return Proyeccion::delAlumno($matricula)->get();
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
        $proyeccion = Proyeccion::create($requuest->all());

        return response()->json($proyeccion,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyeccion  $proyeccion
     * @return \Illuminate\Http\Response
     */
    public function show(Proyeccion $proyeccion)
    {
        return $proyeccion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyeccion  $proyeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyeccion $proyeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyeccion  $proyeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyeccion $proyeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyeccion  $proyeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyeccion $proyeccion)
    {
        //
    }
}
