<?php

namespace App\Http\Controllers;

use App\Profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profesor::all();
    }

    public function grupos(Request $request)
    {
        $dni = $request->input('dni');
        return DB::table('vista_grupos')->where('idTutor','=',$dni)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevo_profesor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesor = Profesor::create($request->all());

        return response()->json($profesor,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($profesor)
    {
        return response()->json(DB::table('usuario')->select(DB::raw('usuario.matricula AS DNI, usuario.nombre, usuario.a_paterno AS apellidoPaterno, usuario.a_materno AS apellidoMaterno, users.email AS correo, usuario.img_perfil AS idImagenPerfil'))->
            join('users','users.name','=','usuario.matricula')->
            where('usuario.matricula','=',$profesor)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('editar_profesor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profesor)
    {
        $profesor = Profesor::find($profesor);
        $profesor->update($request->all());

        return response()->json($profesor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($profesor)
    {
        $profesor = Profesor::find($profesor);
        $profesor->delete();

        return response()->json($profesor, 204);
    }
}
