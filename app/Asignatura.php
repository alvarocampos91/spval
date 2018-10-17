<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asignatura extends Model
{
	protected $primaryKey	= 'codigo';
	protected $table		= 'asignatura';
	protected $guarded		= [];
	public 	$timestamps		= false;
	public $incrementing	= false;

	public static function noAprobadas($matricula)
	{
		return DB::query('asignatura')->select(DB::raw('asignatura.*'))
		->join('carrera_has_asignatura','carrera_has_asignatura.fk_asignatura','=','asignatura.codigo')
		->WHERE(DB::raw("carrera_has_asignatura.fk_carrera = 1 AND tipo = 'normal' AND codigo NOT LIKE '%FGUS%' AND codigo NOT IN (SELECT asignatura.codigo FROM asignatura INNER JOIN curso ON curso.fk_asignatura = asignatura.codigo INNER JOIN alumno_has_curso ON alumno_has_curso.fk_curso = curso.id_curso WHERE alumno_has_curso.fk_alumno = $matricula AND (alumno_has_curso.calificacion_ordinaria>5 OR alumno_has_curso.calificacion_extraordinaria>5))"))->get();
	}
}
