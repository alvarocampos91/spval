<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $primaryKey	= 'id_curso';
	protected $table		= 'curso';
	protected $guarded		= ['id_curso'];
	public 	$timestamps		= false;
}
