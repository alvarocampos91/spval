/**
 * Created by Sandeep on 01/06/14.
 */

angular.module('alumnoApp.controllers',['angularUtils.directives.dirPagination']).controller('TutoradosController',function($scope,$stateParams,$window,Tutorados,Alumno)
{   
    $scope.grupos = [];
    $scope.currentPage = 1;
    $scope.totalAlumnos = 0;
    $scope.pageSize    = 5;
    $scope.numGrupo = -1;
    $scope.nombreOrdenado = '';
    $scope.ordenadoPor = {
        'recursos': 0,
        'total_creditos': 0
    };
    
    Tutorados.query({_id:123456789,dni:123456789},function(data){
        $scope.grupos = data;
        $scope.grupos.forEach(function(grupo,index){
            grupo.currentPage = 1;
        });

        $scope.pageChangeHandler = function(pageNumber){
            var grupo = $scope.grupos[$scope.numGrupo];
            var tipo = $scope.ordenadoPor[$scope.nombreOrdenado] > 0? 'asc': 'desc';
            Alumno.get({
                seccion: grupo.seccion,
                page: pageNumber,
                count: $scope.pageSize,
                ordenarPor: $scope.nombreOrdenado,
                tipoOrdenar: tipo
            },function(data){
                $scope.tutorados = data;
                if($stateParams.tutorados)
                {
                    for(var k in $scope.tutorados)
                    {
                        // $scope.tutorados[k].asignaturas = 
                    }
                }
            });
        };

        $scope.seleccionarGrupo = function(index){
            if($scope.numGrupo === index) return;

            if($scope.numGrupo >= 0)
                $scope.grupos[$scope.numGrupo].currentPage = $scope.currentPage;

            $scope.numGrupo = index;
            $scope.totalAlumnos = $scope.grupos[$scope.numGrupo].cantidad;
            $scope.currentPage = $scope.grupos[$scope.numGrupo].currentPage;
            $scope.pageChangeHandler($scope.currentPage);
        };

        $scope.ordenarPor = function(nomTabla){
            var nombre = $scope.nombreOrdenado;
            $scope.nombreOrdenado = nomTabla;

            if($scope.ordenadoPor[nombre] !== undefined && nomTabla != nombre){
                $scope.ordenadoPor[nombre] = 0;
            }

            if($scope.ordenadoPor[nomTabla] == 1){
                $scope.ordenadoPor[nomTabla] = -1;
            }
            else if($scope.ordenadoPor[nomTabla] == 0){
                $scope.ordenadoPor[nomTabla] = 1;
            }
            else{
                $scope.nombreOrdenado = '';
                $scope.ordenadoPor[nomTabla] = 0;
            }
            $scope.currentPage = 1;
            $scope.pageChangeHandler();   
        }
        
        $scope.seleccionarGrupo(0);
    });
}).controller('AlumnoKardexController',function($scope,$stateParams,$window,DatosKardex,Alumno)
{   
    DatosKardex.get({_id:$stateParams.matricula},function(kardex)
    {
        $scope.datosAlumno = kardex.alumno;
        $scope.kardex = kardex;
        
        for(var k in $scope.kardex.periodos)
        {
            var puntaje = 0;
            var asignaturas = $scope.kardex.periodos[k].length;

            for(var k2 in $scope.kardex.periodos[k])
            {
                $puntaje += $scope.kardex.periodos[k][k2].calificacion;
            }

            $scope.kardex.periodos[k].promedio = puntaje / asignaturas;
        }
    });
}).controller('MapaAcademicoController',function($scope,$stateParams,$window,AsignaturasAprobadas,AsignaturasCarrera,Alumno)
{
    Alumno.get({matricula:$stateParams.matricula},function(alumno){
        $scope.datosAlumno = alumno;
        console.log(alumno);
        AsignaturasCarrera.get({_id:0,id_carrera:alumno.carrera},function(asignaturas){
            $scope.asignaturas = asignaturas;
            $scope.optativas = [];
            $scope.desits = [];
                
            AsignaturasAprobadas.query({matricula:$stateParams.matricula},function(aprobadas){
                aprobadas.forEach(function(val){
                    var key = val.codigo;
                    var tipo = $scope.asignaturas[key].tipo;
                    $scope.asignaturas[key].aprobada = true;
                    $scope.asignaturas[key].calificacion = val.calificacion;

                    if ( tipo == 'optativa' )
                    {
                        $scope.optativas.push($scope.asignaturas[key]);
                    }
                    if ( tipo == 'desit' )
                    {
                        $scope.desits.push($scope.asignaturas[key]);
                    }
                });

                $scope.obtenerClase = function(codigo)
                {
                    if($scope.asignaturas[codigo] === undefined) console.log(codigo);
                    if(!$scope.asignaturas[codigo].aprobada)
                    {
                        var pre = $scope.asignaturas[codigo].prerrequisitos;
                        var enProyeccion = true;

                        pre.forEach(function(val){
                            var cod = val.codigo;
                            if(!$scope.asignaturas[cod].aprobada)
                            {
                                enProyeccion = false;
                            }
                        });

                        if(enProyeccion) return 'proyeccion';

                        return 'white-bg';
                    }
                }

                $scope.obtenerCalificacion = function(codigo)
                {
                    if($scope.asignaturas[codigo].aprobada)
                    {
                        return $scope.asignaturas[codigo].calificacion;
                    }
                }
            });
        });
    });
}).controller('ProyeccionController',function($scope,$stateParams,$window,ProyeccionAlumno,Alumno){
    
    $scope.datosAlumno = Alumno.get({matricula:$stateParams.matricula});
    $scope.restricciones = {};

    $scope.actualizarProyeccion = function()
    {
        $scope.proyecciones = ProyeccionAlumno.query({
            _id:$stateParams.matricula,
            matricula:$stateParams.matricula});
    }
    
    $scope.eliminarMateria = function(idPeriodo,codigo)
    {
        if( $scope.restricciones[idPeriodo] === undefined )
        {
            $scope.restricciones[idPeriodo] = {};
        }

        if( $scope.restricciones[idPeriodo].materiasEliminadas === undefined )
        {
            $scope.restricciones[idPeriodo].materiasEliminadas = [];
        }

        $scope.restricciones[idPeriodo].materiasEliminadas.push(codigo);

        $scope.actualizarProyeccion();
    };

    $scope.actualizarCreditos = function(posicion)
    {
        var idPeriodo = $scope.proyecciones[posicion].id_periodo;
        if( $scope.restricciones[idPeriodo] === undefined )
        {
            $scope.restricciones[idPeriodo] = {};
        }

        $scope.restricciones[idPeriodo].creditosMaximos = $scope.proyecciones[posicion].creditos_maximos;

        $scope.actualizarProyeccion();
    };

    $scope.actualizarProyeccion();
});