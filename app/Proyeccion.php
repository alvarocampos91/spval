<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asignatura;
use App\Periodo;

class Proyeccion extends Model
{
	protected $primaryKey = 'id_proyeccion';
	protected $table = 'proyeccion';
	public $timestamps = false;
	protected $guarded = ['id_proyeccion'];
	protected $appends = ['listaAsignaturas','datosPeriodo'];
	protected $hidden = ['fk_alumno','fk_periodo'];

	public function asignaturas()
	{
		return $this->belongsToMany(Asignatura::class, 'proyeccion_has_asignatura', 'fk_proyeccion', 'fk_asignatura');
	}

	public function periodo()
	{
		return $this->hasOne(Periodo::class, 'id_periodo', 'fk_periodo');
	}

	public function getListaAsignaturasAttribute()
	{
		return $this->asignaturas()->get()->toArray();;
	}	

	public function getDatosPeriodoAttribute()
	{
		return $this->periodo()->get()->toArray()[0];
	}

	public function scopeDelAlumno($query, $matricula)
    {
        return $query->where('fk_alumno', $matricula);
    }
}
