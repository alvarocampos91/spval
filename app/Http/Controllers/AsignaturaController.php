<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;
use mysqli;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matricula = $request->input('matricula');
        if($matricula)
        {
            $mysqli=new mysqli('127.0.0.1','root','','spva');

            $sql="SELECT *, $matricula AS matricula FROM `asignatura` INNER JOIN carrera_has_asignatura ON carrera_has_asignatura.fk_asignatura = asignatura.codigo WHERE carrera_has_asignatura.tipo = 'normal' AND asignatura.codigo NOT LIKE '%FGUS%' AND carrera_has_asignatura.fk_carrera = 1 AND asignatura.codigo NOT IN ( SELECT asignatura.codigo FROM asignatura INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE alumno_has_curso.fk_alumno = '$matricula' AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria IS NULL OR alumno_has_curso.calificacion_extraordinaria>5) )";
            // echo $sql;
            $resultado=$mysqli->query($sql);
            // echo $resultado->num_rows;
            $datos = [];
            while ($row=$resultado->fetch_assoc()) {
                $datos[] = $row;
            }

            // var_dump($datos);

            $sql="SELECT asignatura.codigo FROM asignatura INNER JOIN carrera_has_asignatura ON carrera_has_asignatura.fk_asignatura = asignatura.codigo INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE carrera_has_asignatura.tipo = 'optativa' AND alumno_has_curso.fk_alumno = '$matricula' AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria>5)";
            $resultado=$mysqli->query($sql);
            $num_opt = $resultado->num_rows;

            $sql="SELECT asignatura.codigo FROM asignatura INNER JOIN carrera_has_asignatura ON carrera_has_asignatura.fk_asignatura = asignatura.codigo INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE carrera_has_asignatura.tipo = 'desit' AND alumno_has_curso.fk_alumno = '$matricula' AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria>5)";
            $resultado=$mysqli->query($sql);
            $num_des = $resultado->num_rows;

            $falt_opt = 5 - $num_opt;
            $falt_des = 3 - $num_des;

            if($falt_opt > 0)
            {
                $sql="SELECT *, $matricula AS matricula  FROM `asignatura` INNER JOIN carrera_has_asignatura ON carrera_has_asignatura.fk_asignatura = asignatura.codigo WHERE carrera_has_asignatura.tipo = 'optativa' AND carrera_has_asignatura.fk_carrera = 1 AND asignatura.codigo NOT IN ( SELECT asignatura.codigo FROM asignatura INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE alumno_has_curso.fk_alumno = '$matricula' AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria>5) ) LIMIT $falt_opt";
                
                $resultado=$mysqli->query($sql);
                while ($row=$resultado->fetch_assoc()) {
                    $datos[] = $row;
                }
            }

            if($falt_des > 0)
            {
                $sql="SELECT *, $matricula AS matricula  FROM `asignatura` INNER JOIN carrera_has_asignatura ON carrera_has_asignatura.fk_asignatura = asignatura.codigo WHERE carrera_has_asignatura.tipo = 'desit' AND carrera_has_asignatura.fk_carrera = 1 AND asignatura.codigo NOT IN ( SELECT asignatura.codigo FROM asignatura INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE alumno_has_curso.fk_alumno = '$matricula' AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria>5) ) LIMIT $falt_des";
                
                $resultado=$mysqli->query($sql);
                while ($row=$resultado->fetch_assoc()) {
                    $datos[] = $row;
                }
            }

            return $datos;
        }
        return Asignatura::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nueva_asignatura');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignatura = Asignatura::create($request->all());

        return response()->json($asignatura,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return $asignatura;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return view('editar_asignatura');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->update($request->all());

        return response()->json($asignatura, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

        return response()->json(null, 204);
    }
}
