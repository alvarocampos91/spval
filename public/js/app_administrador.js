/**
 * Created by Sandeep on 01/06/14.
 */

angular.module('alumnoApp',['ui.router','ngResource','alumnoApp.controllers','alumnoApp.services']);

angular.module('alumnoApp').config(function($stateProvider,$httpProvider){
    $stateProvider.state('alumnos',{
        url:'/alumnos',
        templateUrl:'tabla/alumno',
        controller:'AlumnoListController'
    }).state('viewAlumno',{
       url:'/alumnos/:matricula/view',
       templateUrl:'ver/alumno',
       controller:'AlumnoViewController'
    }).state('newAlumno',{
        url:'/alumnos/new',
        templateUrl:'alumnos/create',
        controller:'AlumnoCreateController'
    }).state('editAlumno',{
        url:'/alumnos/:matricula/edit',
        templateUrl:'alumnos/1/edit',
        controller:'AlumnoEditController'
    });
    $stateProvider.state('profesores',{
        url:'/profesores',
        templateUrl:'partials/get/profesores.html',
        controller:'ProfesorListController'
    }).state('viewProfesor',{
       url:'/profesores/:dni/view',
       templateUrl:'partials/get/profesor-view.html',
       controller:'ProfesorViewController'
    }).state('newProfesor',{
        url:'/profesores/new',
        templateUrl:'partials/get/profesor-add.html',
        controller:'ProfesorCreateController'
    }).state('editProfesor',{
        url:'/profesores/:dni/edit',
        templateUrl:'partials/get/profesor-edit.html',
        controller:'ProfesorEditController'
    });
    $stateProvider.state('asignaturas',{
        url:'/asignaturas',
        templateUrl:'partials/get/asignaturas.html',
        controller:'AsignaturaListController'
    }).state('viewAsignatura',{
       url:'/asignaturas/:codigo/view',
       templateUrl:'partials/get/asignatura-view.html',
       controller:'AsignaturaViewController'
    }).state('newAsignatura',{
        url:'/asignaturas/new',
        templateUrl:'partials/get/asignatura-add.html',
        controller:'AsignaturaCreateController'
    }).state('editAsignatura',{
        url:'/asignaturas/:codigo/edit',
        templateUrl:'partials/get/asignatura-edit.html',
        controller:'AsignaturaEditController'
    });
    $stateProvider.state('areas',{
        url:'/areas',
        templateUrl:'partials/get/areas.html',
        controller:'AreaListController'
    }).state('viewArea',{
       url:'/areas/:_id/view',
       templateUrl:'partials/get/area-view.html',
       controller:'AreaViewController'
    }).state('newArea',{
        url:'/areas/new',
        templateUrl:'partials/get/area-add.html',
        controller:'AreaCreateController'
    }).state('editArea',{
        url:'/areas/:_id/edit',
        templateUrl:'partials/get/area-edit.html',
        controller:'AreaEditController'
    });
    $stateProvider.state('campus',{
        url:'/campus',
        templateUrl:'partials/get/campus.html',
        controller:'CampusListController'
    }).state('viewCampus',{
       url:'/campus/:id_campus/view',
       templateUrl:'partials/get/campus-view.html',
       controller:'CampusViewController'
    }).state('newCampus',{
        url:'/campus/new',
        templateUrl:'partials/get/campus-add.html',
        controller:'CampusCreateController'
    }).state('editCampus',{
        url:'/campus/:id_campus/edit',
        templateUrl:'partials/get/campus-edit.html',
        controller:'CampusEditController'
    });
    $stateProvider.state('carreras',{
        url:'/carreras',
        templateUrl:'partials/get/carreras.html',
        controller:'CarreraListController'
    }).state('viewCarrera',{
       url:'/carreras/:_id/view',
       templateUrl:'partials/get/carrera-view.html',
       controller:'CarreraViewController'
    }).state('newCarrera',{
        url:'/carreras/new',
        templateUrl:'partials/get/carrera-add.html',
        controller:'CarreraCreateController'
    }).state('editCarrera',{
        url:'/carreras/:_id/edit',
        templateUrl:'partials/get/carrera-edit.html',
        controller:'CarreraEditController'
    });
    $stateProvider.state('cursos',{
        url:'/cursos',
        templateUrl:'partials/get/cursos.html',
        controller:'CursoListController'
    }).state('viewCurso',{
       url:'/cursos/:nrc/view',
       templateUrl:'partials/get/curso-view.html',
       controller:'CursoViewController'
    }).state('newCurso',{
        url:'/cursos/new',
        templateUrl:'partials/get/curso-add.html',
        controller:'CursoCreateController'
    }).state('editCurso',{
        url:'/cursos/:nrc/edit',
        templateUrl:'partials/get/curso-edit.html',
        controller:'CursoEditController'
    });
    $stateProvider.state('horarios',{
        url:'/horarios',
        templateUrl:'partials/get/horarios.html',
        controller:'HorarioListController'
    }).state('viewHorario',{
       url:'/horarios/:nrc/view',  //no se que poner
       templateUrl:'partials/get/horario-view.html',
       controller:'HorarioViewController'
    }).state('newHorario',{
        url:'/horarios/new',
        templateUrl:'partials/get/horario-add.html',
        controller:'HorarioCreateController'
    }).state('editHorario',{
        url:'/horarios/:nrc/edit',  //quien sabe
        templateUrl:'partials/get/horario-edit.html',
        controller:'HorarioEditController'
    });
    $stateProvider.state('periodos',{
        url:'/periodos',
        templateUrl:'partials/get/periodos.html',
        controller:'PeriodoListController'
    }).state('viewPeriodo',{
       url:'/periodos/:_id/view',
       templateUrl:'partials/get/periodo-view.html',
       controller:'PeriodoViewController'
    }).state('newPeriodo',{
        url:'/periodos/new',
        templateUrl:'partials/get/periodo-add.html',
        controller:'PeriodoCreateController'
    }).state('editPeriodo',{
        url:'/periodos/:_id/edit',
        templateUrl:'partials/get/periodo-edit.html',
        controller:'PeriodoEditController'
    });
    $stateProvider.state('prerrequisitos',{
        url:'/prerrequisitos',
        templateUrl:'partials/get/prerrequisitos.html',
        controller:'PrerrequisitoListController'
    }).state('viewPrerrequisito',{
       url:'/prerrequisitos/:asignatura/view',  //no sepo
       templateUrl:'partials/get/prerrequisito-view.html',
       controller:'PrerrequisitoViewController'
    }).state('newPrerrequisito',{
        url:'/prerrequisitos/new',
        templateUrl:'partials/get/prerrequisito-add.html',
        controller:'PrerrequisitoCreateController'
    }).state('editPrerrequisito',{
        url:'/prerrequisitos/:asignatura/edit',
        templateUrl:'partials/get/prerrequisito-edit.html',
        controller:'PrerrequisitoEditController'
    });
    $stateProvider.state('salones',{
        url:'/salones',
        templateUrl:'partials/get/salones.html',
        controller:'SalonListController'
    }).state('viewSalon',{
       url:'/salones/:_id/view',
       templateUrl:'partials/get/salon-view.html',
       controller:'SalonViewController'
    }).state('newSalon',{
        url:'/salones/new',
        templateUrl:'partials/get/salon-add.html',
        controller:'SalonCreateController'
    }).state('editSalon',{
        url:'/salones/:_id/edit',
        templateUrl:'partials/get/salon-edit.html',
        controller:'SalonEditController'
    });
    $stateProvider.state('usuarios',{
        url:'/usuarios',
        templateUrl:'partials/get/usuarios.html',
        controller:'UsuarioListController'
    }).state('viewUsuario',{
       url:'/usuarios/:identificador/view',
       templateUrl:'partials/get/usuario-view.html',
       controller:'UsuarioViewController'
    }).state('newUsuario',{
        url:'/usuarios/new',
        templateUrl:'partials/get/usuario-add.html',
        controller:'UsuarioCreateController'
    }).state('editUsuario',{
        url:'/usuarios/:identificador/edit',
        templateUrl:'partials/get/usuario-edit.html',
        controller:'UsuarioEditController'
    });
    $stateProvider.state('calificaciones',{
        url:'/calificaciones',
        templateUrl:'partials/get/calificaciones.html',
        controller:'CalificacionListController'
    }).state('viewCalificacion',{
       url:'/calificaciones/:_id/view',
       templateUrl:'partials/get/calificacion-view.html',
       controller:'CalificacionViewController'
    }).state('newCalificacion',{
        url:'/calificaciones/new',
        templateUrl:'partials/get/calificacion-add.html',
        controller:'CalificacionCreateController'
    }).state('editCalificacion',{
        url:'/calificaciones/:_id/edit',
        templateUrl:'partials/get/calificacion-edit.html',
        controller:'CalificacionEditController'
    });
}).run(function($state){
   $state.go('alumnos');
});