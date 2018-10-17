<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function asignaturas(Request $request)
    {
        $result = array();
        $id = $request->input('id_carrera');
        $asignaturas = DB::table('carrera_has_asignatura')
        ->select(DB::raw('asignatura.*,carrera_has_asignatura.tipo'))
        ->join('asignatura','asignatura.codigo','=','carrera_has_asignatura.fk_asignatura')
        ->where('carrera_has_asignatura.fk_carrera','=',$id)->get();

        foreach ($asignaturas as $asignatura)
        {
            $prerrequisitos = DB::table('prerrequisito')->select(DB::raw('fk_prerrequisito AS codigo'))->where('fk_asignatura','=',$asignatura->codigo)->get();
            $aperturas = DB::table('prerrequisito')->select(DB::raw('fk_asignatura AS codigo'))->where('fk_prerrequisito','=',$asignatura->codigo)->get();
            $result[$asignatura->codigo] = array(
                'nombre'=>$asignatura->nombre,
                'nombreCorto'=>$asignatura->nombre_corto,
                'creditos'=>$asignatura->creditos,
                'horasTeoria'=>$asignatura->h_teoria,
                'horasPractica'=>$asignatura->h_practica,
                'horasIndependiente'=>$asignatura->h_independiente,
                'tipo'=>$asignatura->tipo,
                'seleccionada'=>FALSE,
                'prerrequisitos'=>$prerrequisitos,
                'aperturas'=>$aperturas
            );
        }

        return $result;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Carrera::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nueva_carrera');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrera = Carrera::create($request->all());

        return response()->json($carrera,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return $carrera;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return view('editar_carrera');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $carrera->update($request->all());

        return response()->json($carrera,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return response()->json(null,204);
    }
}
