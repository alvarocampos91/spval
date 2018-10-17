<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
	protected $primaryKey	= 'id_periodo';
	protected $table		= 'periodo';
	protected $guarded		= ['id_periodo'];
	public 	$timestamps		= false;
}
