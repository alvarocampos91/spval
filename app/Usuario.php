<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Usuario extends Model
{
	protected $primaryKey = 'matricula';
	protected $table = 'usuario';
	public $timestamps = false;
	protected $guarded = [];
	protected $dates = [
        'f_nacimiento',
    ];
    public function setFNacimientoAttribute($value)
    {
        $this->attributes['f_nacimiento'] = Carbon::createFromFormat('Y-m-d', $value);
    }
}
