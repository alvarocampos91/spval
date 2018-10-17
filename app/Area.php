<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $primaryKey	= 'id_area';
	protected $table		= 'area';
	protected $fillable		= ['nombre','descripcion'];
	public 	$timestamps		= false;
}
