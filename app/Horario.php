<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
	protected $primaryKey	= null;
	protected $table		= 'horario';
	protected $guarded		= [];
	public 	$timestamps		= false;
	public $incrementing	= false;
}
