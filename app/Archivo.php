<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
	protected $primaryKey = 'id_archivo';
	protected $table = 'archivo';
	public $timestamps = false;
	protected $guarded = [];
}
