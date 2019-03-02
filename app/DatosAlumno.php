<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosAlumno extends Model
{
	protected $table		= 'alumno_completo';
	protected $primaryKey = 'matricula';
	public 	$timestamps		= false;
}