<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \Hash;

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

    public static function validarUsuario($username,$password)
    {
        $usuario = DB::table('users')->where('name',$username)->first();
        $envio = array('estado'=>-1,'token'=>'','id'=>0);

        if ($usuario)
        {
            if(Hash::check($password,$usuario->password))
            {
                $envio['estado'] = 0;
                $envio['token'] = $usuario->remember_token;
                $envio['id'] = $usuario->id;
            }
            else
            {            
                $envio['estado'] = 2;
            }
        }
        else
        {
            $envio['estado'] = 1;
        }

        return $envio;
    }
}
