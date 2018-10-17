<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
	protected $primaryKey	= 'id_campus';
	protected $table		= 'campus';
	protected $fillable		= ['nombre','direccion'];
	public 	$timestamps		= false;
}
