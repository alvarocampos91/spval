<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Profesor;
use DateTime;

class Alumno extends Model
{
	protected $primaryKey = 'matricula';
	protected $table = 'alumno';
	public $timestamps = false;
	protected $guarded = [];

	public static function getPorcentaje($porcentaje,$signo)
	{
		$creditos = round($porcentaje * 271 / 100);
		$alumnos = DB::table('alumno')->
    	select(DB::raw("alumno.f_ingreso AS fechaIngreso,alumno.fk_carrera,alumno.matricula,CONCAT(usuario.nombre,' ',usuario.a_paterno,' ',usuario.a_materno) AS nombreCompleto,SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 1, 0)) AS recursos, AVG( CASE WHEN `calificacion_ordinaria`>5 THEN `calificacion_ordinaria` ELSE ( CASE WHEN `calificacion_extraordinaria`>5 THEN `calificacion_extraordinaria` ELSE null END ) END ) AS promedio,SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 0, asignatura.creditos)) AS total_creditos"))->
        join('usuario', 'usuario.matricula', '=', 'alumno.matricula')->
    	join('alumno_has_curso', 'alumno_has_curso.fk_alumno', '=', 'alumno.matricula')->
    	join('curso', 'curso.id_curso', '=', 'alumno_has_curso.fk_curso')->
    	join('asignatura', 'asignatura.codigo', '=', 'curso.fk_asignatura')
    	->groupBy('alumno.matricula')->having('total_creditos',$signo,$creditos)->get();
    	$ret = [];

    	foreach ($alumnos as $alumno)
    	{
    		$carrera = Carrera::find($alumno->fk_carrera);
    		$porcentaje = round($alumno->total_creditos / 271 * 100);

            $CREDITOS_MAX_POR_ANIO = 30 + 30 + 15;
            $fechaIngreso = new DateTime($alumno->fechaIngreso);
            $fechaEgreso = new DateTime($alumno->fechaIngreso);
            $fechaEgreso->setDate( intval( $fechaIngreso->format('Y') ) + $carrera->estadia, intval( $fechaIngreso->format('m') ), intval( $fechaIngreso->format('d') ) );

            $fechaActual = new DateTime();

            $difAnios = intval($fechaEgreso->diff($fechaActual)->format('%a')) / 365.25;
            $creditosAcumulables = $CREDITOS_MAX_POR_ANIO * $difAnios;
            $creditosFaltantes = $carrera->creditosMinimos - $alumno->total_creditos;
            $difCreditos = $creditosAcumulables - $creditosFaltantes;

            $creditosPosibles = $CREDITOS_MAX_POR_ANIO * $carrera->estadia;
            $creditosSobrantes = $creditosPosibles - $carrera->creditosMaximos;

            $estado = 'excelente';

            if( $difCreditos < -( $creditosSobrantes / 2 ) )
            {
                $estado = 'baja';
            }
            else if( $difCreditos < 0 )
            {
                $estado = 'crítico';
            }
            else if( $difCreditos < $creditosSobrantes / 4 )
            {
                $estado = 'retraso';
            }
            else if( $difCreditos < $creditosSobrantes / 2 )
            {
                $estado = 'regular';
            }

            if($porcentaje >= 100)
            {
                $estado = 'completo';
            }

            $faltantes = DB::table('proyeccion')
            ->join('proyeccion_has_asignatura','proyeccion.id_proyeccion','=','proyeccion_has_asignatura.fk_proyeccion')
            ->where('fk_alumno','=',$alumno->matricula)->count();

    		$ret[] = array(
                        'Matricula' => $alumno->matricula,
                        'Nombre del alumno' => $alumno->nombreCompleto,
                        'Promedio' => round(floatval($alumno->promedio),2),
                        'Recursos' => intval($alumno->recursos),
                        'Porcentaje' => $porcentaje,
                        'Estado' => $estado,
                        'Faltantes' => $faltantes
                    );
    	}

    	return $ret;
	}

	public static function getPorGrupo($seccion,$numPerPage,$orderBy,$orderType)
    {
    	$alumnos = DB::table('alumno')->
    	select(DB::raw("grupo.f_ingreso AS fechaIngreso,grupo.fk_carrera,alumno.matricula,CONCAT(usuario.nombre,' ',usuario.a_paterno,' ',usuario.a_materno) AS nombreCompleto,SUM(IF(alumno_has_curso.calificacion_extraordinaria = 5, 1, 0)) AS recursos, AVG( CASE WHEN `calificacion_ordinaria`>5 THEN `calificacion_ordinaria` ELSE ( CASE WHEN `calificacion_extraordinaria`>5 THEN `calificacion_extraordinaria` ELSE null END ) END ) AS promedio,SUM(IF(alumno_has_curso.calificacion_ordinaria > 5 OR alumno_has_curso.calificacion_extraordinaria > 5 OR alumno_has_curso.calificacion_ordinaria = 0, asignatura.creditos, 0)) AS total_creditos"))->
        join('usuario', 'usuario.matricula', '=', 'alumno.matricula')->
    	join('alumno_has_curso', 'alumno_has_curso.fk_alumno', '=', 'alumno.matricula')->
    	join('curso', 'curso.id_curso', '=', 'alumno_has_curso.fk_curso')->
        join('asignatura', 'asignatura.codigo', '=', 'curso.fk_asignatura')->
        join('grupo', 'grupo.seccion', '=', 'alumno.seccion')->        
    	where('alumno.seccion', '=', $seccion)->groupBy('alumno.matricula')->orderBy($orderBy,$orderType)->paginate($numPerPage);

        $alumnos->getCollection()->transform(function($alumno, $key) {
            $carrera = Carrera::find($alumno->fk_carrera);
            $porcentaje = round($alumno->total_creditos / $carrera->creditosMinimos * 100);

            $CREDITOS_MAX_POR_ANIO = 30 + 30 + 15;
            $fechaIngreso = new DateTime($alumno->fechaIngreso);
            $fechaEgreso = new DateTime($alumno->fechaIngreso);
            $fechaEgreso->setDate( intval( $fechaIngreso->format('Y') ) + $carrera->estadia, intval( $fechaIngreso->format('m') ), intval( $fechaIngreso->format('d') ) );

            // $fechaActual = new DateTime();
            $fechaActual = new DateTime("2018-11-01");

            $difAnios = intval($fechaEgreso->diff($fechaActual)->format('%a')) / 365.25;
            $creditosAcumulables = $CREDITOS_MAX_POR_ANIO * $difAnios;
            $creditosFaltantes = $carrera->creditosMinimos - $alumno->total_creditos;
            $difCreditos = $creditosAcumulables - $creditosFaltantes;

            $creditosPosibles = $CREDITOS_MAX_POR_ANIO * $carrera->estadia;
            $creditosSobrantes = $creditosPosibles - $carrera->creditosMaximos;

            $estado = 'excelente';

            if( $difCreditos < -( $creditosSobrantes / 2 ) )
            {
                $estado = 'baja';
            }
            else if( $difCreditos < 0 )
            {
                $estado = 'crítico';
            }
            else if( $difCreditos < $creditosSobrantes / 4 )
            {
                $estado = 'retraso';
            }
            else if( $difCreditos < $creditosSobrantes / 2 )
            {
                $estado = 'regular';
            }

            if($porcentaje >= 100)
            {
                $estado = 'completo';
            }

            $faltantes = DB::table('proyeccion')
            ->join('proyeccion_has_asignatura','proyeccion.id_proyeccion','=','proyeccion_has_asignatura.fk_proyeccion')
            ->where('fk_alumno','=',$alumno->matricula)->count();

            return [
                'matricula'     => $alumno->matricula,
                'nombreCompleto'=> $alumno->nombreCompleto,
                'promedio'      => round(floatval($alumno->promedio),2),
                'recursos'      => intval($alumno->recursos),
                'porcentaje'    => $porcentaje,
                'estado'        => $estado,
                'faltantes'     => $faltantes
            ];
        });

        return $alumnos;
    }
}
