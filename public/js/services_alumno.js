/**
 * Created by Sandeep on 01/06/14.
 */

angular.module('alumnoApp.services',[]).factory('Alumno',function($resource){
    return $resource('alumnos/:matricula',{matricula:'@matricula'});
}).factory('DatosKardex',function($resource){
    return $resource('kardex/:id',{id:'@_id'});
}).factory('AsignaturasAprobadas',function($resource){
    return $resource('aprobadas/:id',{id:'@_id'});
}).factory('AsignaturasCarrera',function($resource){
    return $resource('asignaturasCarrera/:id',{id:'@_id'});
}).factory('ProyeccionAlumno',function($resource){
    return $resource('proyecciones/:id_proyeccion',{id:'@id_proyeccion'});
}).factory('Mensajes',function($resource){
    return $resource('mensajes/:id',{id:'@_id'});
}).factory('AsignaturasCursadas',function($resource){
    return $resource('cursadas/:id',{id:'@_id'});
}).factory('DetallesCurso',function($resource){
    return $resource('detalles/:id',{id:'@_id'});
}).factory('CursosUltimoPeriodo',function($resource){
    return $resource('ultimoPeriodo/:id',{id:'@_id'});
}).factory('Tutorados',function($resource){
    return $resource('grupos/:id',{id:'@_id'});
});