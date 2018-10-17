<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Alumno;
use App\Profesor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $us = Usuario::find($user->name);
            if($us->tipo == 'alumno')
            {
                return Alumno::find($user->name);
            }
            else
            {
                return view('tutor');
            }
        }
        
        return view('home');
    }
}
