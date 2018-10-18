<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Alumno;
use App\DatosAlumno;
use App\Carrera;
use App\Profesor;

class AlumnoController extends Controller
{
    private function getSelects()
    {
        $carreras = Carrera::all();
        $profesores = Profesor::all();

        $selectCarrera = array();
        $selectTutores = array();

        foreach ($carreras as $carrera)
        {
            $selectCarrera[''.$carrera->id_carrera] = $carrera->nombre;
        }

        foreach ($profesores as $profesor)
        {
            $selectTutores[''.$profesor->DNI] = $profesor->nombre.' '.$profesor->a_paterno.' '.$profesor->a_materno;
        }
        return array('carreras'=>$selectCarrera,'tutores'=>$selectTutores);   
    }

    public function excelPorcentaje(Request $request)
    {
        $alumnos = Alumno::getPorcentaje(90,'>');
        
        Excel::create('Laravel Excel', function($excel) use($alumnos) {
 
            $excel->sheet('Alumnos', function($sheet) use($alumnos) {
 
                $sheet->fromArray($alumnos); 
            });
        })->export('xls');
    }

    public function excel(Request $request)
    {
        $seccion = $request->input('seccion');
        $numPerPage = $request->input('count');

        $alumnos = Alumno::getPorGrupo($seccion,$numPerPage,'matricula','ASC');
        
        Excel::create('Laravel Excel', function($excel) use($alumnos) {
 
            $excel->sheet('Alumnos', function($sheet) use($alumnos) {
                $array = array();

                foreach ($alumnos as $value)
                {
                    $array[] = array(
                        'Matricula' => $value['matricula'],
                        'Nombre del alumno' => $value['nombreCompleto'],
                        'Promedio' => $value['promedio'],
                        'Recursos' => $value['recursos'],
                        'Porcentaje' => $value['porcentaje'].'%',
                        'Estado' => $value['estado'],
                        'Faltantes' => $value['faltantes']
                    );
                }
 
                $sheet->fromArray($array); 
            });
        })->export('xls');
    }

    public function aprobadas(Request $request)
    {
        $matricula = $request->input('matricula');
        return DB::table('alumno_has_curso')
        ->select(DB::raw('curso.fk_asignatura AS codigo, COUNT(alumno_has_curso.calificacion_extraordinaria=5) AS recursos, MAX(IF(alumno_has_curso.calificacion_ordinaria = 5, alumno_has_curso.calificacion_extraordinaria, alumno_has_curso.calificacion_ordinaria)) AS calificacion'))
        ->join('curso','alumno_has_curso.fk_curso','=','curso.id_curso')
        ->where('alumno_has_curso.fk_alumno','=',$matricula)
        ->groupBy('curso.fk_asignatura')->having('calificacion', '>', 5)->get();
    }

    public function kardex(Request $request)
    {
        $alumno = DB::table('alumno')->select(DB::raw(''))
        ->join('grupo','grupo.seccion','=','alumno.seccion');
        Alumno::find($request->input('_id'));
        $carrera = Carrera::find(1);
        $materias = DB::table('curso')
        ->select(DB::raw('curso.id_curso,IF(alumno_has_curso.calificacion_ordinaria = 5, alumno_has_curso.calificacion_extraordinaria, alumno_has_curso.calificacion_ordinaria) AS calificacion,asignatura.codigo,asignatura.nombre,asignatura.nombre_corto,periodo.id_periodo,periodo.nombre AS nombre_periodo, periodo.abreviacion,periodo.f_inicio'))
        ->join('alumno_has_curso','curso.id_curso','=','alumno_has_curso.fk_curso')
        ->join('asignatura','asignatura.codigo','=','curso.fk_asignatura')
        ->join('periodo','periodo.id_periodo','=','curso.fk_periodo')
        ->where('alumno_has_curso.fk_alumno', '=', $alumno->matricula)->orderBy('periodo.f_inicio', 'desc')->get();

        $datos = DB::table('alumno_has_curso')
            ->select(DB::raw('SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 1, 0)) AS reprobadas, SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 0, 1)) AS aprobadas, AVG( CASE WHEN `calificacion_ordinaria`>5 THEN `calificacion_ordinaria` ELSE ( CASE WHEN `calificacion_extraordinaria`>5 THEN `calificacion_extraordinaria` ELSE null END ) END ) AS promedio,SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 0, asignatura.creditos)) AS creditos'))
            ->join('curso', 'curso.id_curso', '=', 'alumno_has_curso.fk_curso')
            ->join('asignatura', 'asignatura.codigo', '=', 'curso.fk_asignatura')
            ->where('fk_alumno', '=', $alumno->matricula)->groupBy('fk_alumno')->first();

        $i = 0;
        $periodos = array();
        $kardex = array(
            'aprobadas'=>intval($datos->aprobadas),
            'reprobadas'=>intval($datos->reprobadas),
            'promedio'=>round(floatval($datos->promedio),2),
            'creditos'=>intval($datos->creditos),
            'porcentaje'=>round(intval($datos->creditos)/$carrera->creditosMinimos*100,2),
            'alumno'=>$alumno,
            'carrera'=>$carrera,
            'periodos'=>array()
        );

        $puntaje = 0;
        foreach ($materias as $materia)
        {
            if(!array_key_exists ('p'.$materia->id_periodo,$periodos))
            {
                $periodos['p'.$materia->id_periodo] = $i;
                $kardex['periodos'][$i++] = array(
                    'id'=>$materia->id_periodo,
                    'nombre'=>$materia->nombre_periodo,
                    'abreviacion'=>$materia->abreviacion,
                    'f_inicio'=>$materia->f_inicio,
                    'materias'=>array()
                );
            }

            $indice = $periodos['p'.$materia->id_periodo];
            $kardex['periodos'][$indice]['materias'][] = $materia;
        }

        return $kardex;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seccion = $request->input('seccion');

        if($seccion)
        {
            $numPerPage = $request->input('count');
            $ordenarPor = $request->input('ordenarPor');
            $tipoOrdenar = $request->input('tipoOrdenar');

            if(!$ordenarPor){
                $ordenarPor = 'matricula';
                $tipoOrdenar = 'asc';
            }

            return Alumno::getPorGrupo($seccion,$numPerPage,$ordenarPor,$tipoOrdenar);
        }

        return DatosAlumno::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevo_alumno',$this->getSelects());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = Alumno::create($request->all());
        return response()->json($alumno,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return $alumno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('editar_alumno',$this->getSelects());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());

        return response()->json($alumno, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return response()->json(null, 204);
    }
}
