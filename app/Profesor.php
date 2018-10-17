<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $primaryKey = 'DNI';
	protected $table = 'profesor';
	public $timestamps = false;
	protected $guarded = [];
}
