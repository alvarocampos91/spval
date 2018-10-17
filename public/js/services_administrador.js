/**
 * Created by Sandeep on 01/06/14.
 */

angular.module('alumnoApp.services',[]).factory('Alumno',function($resource){
    return $resource('alumnos/:id',{id:'@id'},{
        update: {
            method: 'PUT',
            params:{id:'@id'}
        },
        delete: {
        	method: 'DELETE',
        	params:{id:'@id'}
        }
    });
}).factory('Profesor',function($resource){
    return $resource('profesores/:dni',{dni:'@dni'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@dni'}
        }
    });
}).factory('Asignatura',function($resource){
    return $resource('./rest/asignatura_rest/asignaturas/:codigo',{codigo:'@codigo'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@codigo'}
        }
    });
}).factory('Area',function($resource){
    return $resource('./rest/area_rest/areas/:_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).factory('Campus',function($resource){
    return $resource('./rest/campus_rest/campus/:_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).factory('Carrera',function($resource){
    return $resource('carreras/:_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).factory('Curso',function($resource){
    return $resource('./rest/curso_rest/cursos/:nrc',{nrc:'@nrc'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@nrc'}
        }
    });
}).factory('Horario',function($resource){
    return $resource('./rest/horario_rest/horarios/:nrc',{nrc:'@nrc'},{ // je ne sais pas
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@nrc'}  //je ne sais rien
        }
    });
}).factory('Periodo',function($resource){
    return $resource('./rest/periodo_rest/periodos/:_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).factory('Prerrequisito',function($resource){
    return $resource('./prerrequisitosRest/:asignatura',{asignatura:'@asignatura'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@asignatura'}
        }
    });
}).factory('Salon',function($resource){
    return $resource('./rest/salon_rest/salones/:_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).factory('Usuario',function($resource){
    return $resource('./rest/usuario_rest/usuarios/:id',{id:'@identificador'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@identificador'}
        }
    });
}).factory('Calificacion',function($resource){
    return $resource('./calificacionesRest/_id',{_id:'@_id'},{
        update: {
            method: 'PUT'
        },
        delete: {
            method: 'DELETE',
            params:{id:'@_id'}
        }
    });
}).service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});