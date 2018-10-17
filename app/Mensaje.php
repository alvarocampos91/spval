<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
	protected $primaryKey	= 'id_mensaje';
	protected $table		= 'mensaje';
	protected $guarded		= ['id_mensaje'];

	const CREATED_AT = 'fh_envio';
	const UPDATED_AT = 'fh_recibo';

	public function setVistoAttribute($value)
	{
		return $this->attributes['visto'] = $value != 0;
	}
}
