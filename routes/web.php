<?php

use Illuminate\Support\Facades\Auth;

use App\Archivo;

use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('alumnos/excel','AlumnoController@excel');
Route::get('alumnos/porcentaje','AlumnoController@excelPorcentaje');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('grupos',		'ProfesorController@grupos');
Route::get('kardex','AlumnoController@kardex');

Route::get('aprobadas','AlumnoController@aprobadas');
Route::get('asignaturasCarrera','CarreraController@asignaturas');
Route::get('validarUsuario','UsuarioController@validar');

Route::get('/imgPerfil/{idImg}', function ($idImg) {
	$archivo = Archivo::find($idImg);
	$pic = Image::make($archivo->dato);
    $response = Response::make($pic->encode('png'));
    $response->header('Content-Type','image/png');
    return $response;
});

Route::get('/tutoradosTemplate', function () {
	return view('tutorados_temp');
});
Route::get('/kardexTemplate', function () {
	return view('kardex_temp');
});
Route::get('/mapaTemplate', function () {
	return view('mapa_temp');
});
Route::get('/proyeccionTemplate', function () {
	return view('proyeccion_temp');
});

Route::get('/dirpagination', function () {
	return view('dir_pagination');
});

Route::get('/pagination', function () {
	return view('pagination');
});

Route::get('/tabla/{nombre}', function ($nombre) {
	return view('tablas_datos',array(
		'nombreTabla'=>'Alumno',
		'nombreArreglo'=>'alumnos',
		'datosTabla'=>array(
			'matricula'=>'Matricula',
			'nombreCompleto'=>'Nombre completo',
			'sexo'=>'Género',
			'fechaNacimiento'=>'Fecha de Nacimiento',
			'fechaIngreso'=>'Fecha de Ingreso'
		)));
});

Route::get('/ver/{nombre}', function ($nombre) {
	return view('vista_datos',array(
		'nombre'=>'Alumno',
		'objeto'=>'alumno',
		'variable'=>'nombreCompleto',
		'datos'=>array(
			'matricula'=>'Matricula',
			'nombreCompleto'=>'Nombre completo',
			'sexo'=>'Género',
			'fechaNacimiento'=>'Fecha de Nacimiento',
			'fechaIngreso'=>'Fecha de Ingreso',
			'nombreTutor'=>'Tutor',
			'nombreCarrera'=>'Carrera'
		)));
});

Route::resource('alumnos',		'AlumnoController');
Route::resource('archivos',		'ArchivoController');
Route::resource('areas',		'AreaController');
Route::resource('asignaturas',	'AsignaturaController');
Route::resource('campuses',		'CampusController');
Route::resource('carreras',		'CarreraController');
Route::resource('cursos',		'CursoController');
Route::resource('horarios',		'HorarioController');
Route::resource('mensajes',		'MensajeController');
Route::resource('periodos',		'PeriodoController');
Route::resource('profesores',	'ProfesorController');
Route::resource('proyecciones',	'ProyeccionController');
Route::resource('salones',		'SalonController');
Route::resource('usuarios',		'UsuarioController');
Auth::routes();
