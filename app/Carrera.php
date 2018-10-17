<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
	protected $primaryKey 	= 'id_carrera';
	protected $table 		= 'carrera';
	protected $guarded		= ['id_carrera'];
	public 	$timestamps		= false;
}
