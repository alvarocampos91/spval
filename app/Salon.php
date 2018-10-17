<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
	protected $primaryKey = 'id_salon';
	protected $table = 'salon';
	public $timestamps = false;
	protected $guarded = ['id_salon'];
}
