@extends('layouts.app_material')
                
@section('scripts')
    {{HTML::script('js/app_tutor.js')}}
    {{HTML::script('js/dirPagination.js')}}
    {{HTML::script('js/controllers_tutor.js')}}
    {{HTML::script('js/services_alumno.js')}}
@endsection

@section('datosUsuario')
    <a class="navbar-brand" href="">Álvaro Enrique Campos Gregorio - 201208598</a>
@endsection

@section('listaMenu')
<li  class="active">
	<a ui-sref="tutorados">
		<i class="material-icons">home</i>
		<span>Tutorados</span>
	</a>
</li>
<li>
	<a ui-sref="ultimoCurso">
		<i class="material-icons">home</i>
		<span>Ultimo curso</span>
	</a>
</li>
@endsection