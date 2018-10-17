<div class="block-header">
    <h2>INFORMACION DEL ALUMNO {{datosAlumno.nombreCompleto.nombre + ' ' + datosAlumno.nombreCompleto.aPaterno + ' ' + datosAlumno.nombreCompleto.aMaterno + ' ' + datosAlumno.matricula}}</h2>
</div>

<div class="btn-group" role="group">
    <a type="button" class="btn btn-default waves-effect">Kardex</a>
    <a type="button" class="btn btn-primary waves-effect" ui-sref="mapaAcademico({matricula:datosAlumno.matricula})">Mapa</a>
    <a type="button" class="btn btn-primary waves-effect" ui-sref="proyeccionFutura({matricula:datosAlumno.matricula})">Proyección</a>
</div><hr />

<!-- Basic Card -->
<div class="row clearfix">
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Datos del alumno
                </h2>
            </div>
            <div class="body">
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-responsive" src="<?php echo 'sesion/foto_fondo'; ?>">
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>{{alumno.nombreCompleto}}</strong></h4>
                    <h2><small class="text-success">{{alumno.matricula}}</small></h2>
                    <p><i class="fa fa-map-marker"></i>{{kardex.carrera.nombre}}</p>
                    <h5>Historia acad&eacute;mica</h5>
                    <p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge badge-primary">{{kardex.aprobadas}}</span>
                                Materias aprobadas
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-primary">{{kardex.reprobadas}}</span>
                                Materias reprobadas
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-primary">{{kardex.creditos}}</span>
                                Cr&eacute;ditos obtenidos
                            </li>
                        </ul>
                    </p>
                    <div class="row m-t-lg">
                        <div class="col-md-6">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" style="width: {{kardex.promedio*10|number:0}}%;"></div>
                            </div>
                            <h5> Promedio                                               
                                <strong> {{kardex.promedio|number:2}}</strong>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" style="width: {{kardex.porcentaje|number:0}}%;"></div>
                            </div>
                            <h5> Creditos                                               
                                <strong> {{kardex.porcentaje|number:2}} %</strong>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <a ui-sref="mapaAcademico" class="btn btn-block btn-lg bg-orange waves-effect">Mapa de avance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Informaci&oacute;n acad&eacute;mica
                </h2>
            </div>
            <div class="body">
                <div class="panel-group" id="accordion_periodos" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-col-indigo" ng-repeat="periodo in kardex.periodos">
                        <div class="panel-heading" role="tab" id="periodo{{periodo.id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion_periodos" href="#asignaturas{{periodo.id}}" aria-expanded="true" aria-controls="asignaturas{{periodo.id}}">
                                    {{periodo.nombre}}<small><strong>&nbsp;&nbsp;&nbsp;{{periodo.f_inicio}}</strong></small><strong class="pull-right">{{periodo.promedio|number:2}}</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="asignaturas{{periodo.id}}" class="panel-collapse collapse" ng-class="{in: $index == 0}" role="tabpanel" aria-labelledby="asignaturas{{periodo.id}}">
                            <div class="body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item" ng-repeat="curso in periodo.materias" ui-sref="curso({id:curso.id_curso})">
                                        {{curso.nombre_corto}} <span class="badge badge-white">{{curso.calificacion}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Card -->