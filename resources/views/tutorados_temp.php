<div class="block-header">
    <h2>PROYECCIONES DEL ALUMNO</h2>
</div>
<!-- Basic Card -->
<div class="row clearfix" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue-grey">
                <h2>
                    {{pro.nombre}}
                </h2>
            </div>
            <div class="body">
                <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                    <a href="javascript:void(0);" class="btn waves-effect" role="button" ng-repeat="grupo in grupos" ng-class="$index == numGrupo? 'inactive': 'bg-cyan'" ng-click="seleccionarGrupo($index)">{{grupo.carrera + ' ' + grupo.periodo}}</a>
                </div>
                <a type="button" class="btn btn-success waves-effect" ng-if="numGrupo >= 0" href="{{'alumnos/excel?seccion='+grupos[numGrupo].seccion+'&count='+totalAlumnos}}">Descargar <i class="material-icons">file_download</i></a>
                <table class="table" ng-if="numGrupo >= 0">
                    <thead>
                        <tr>
                            <th>Matr&iacute;cula</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Promedio</th>
                            <th><a class="btn btn-link" ng-click="ordenarPor('recursos')" href="#">Total de recursos
                                <i class="material-icons" ng-if="ordenadoPor['recursos']==0">arrow_drop_down</i>
                                <i class="material-icons" ng-if="ordenadoPor['recursos']==1">keyboard_arrow_down</i>
                                <i class="material-icons" ng-if="ordenadoPor['recursos']==-1">keyboard_arrow_up</i>
                            </a></th>
                            <th><a class="btn btn-link" ng-click="ordenarPor('total_creditos')" href="#">Porcentaje
                                <i class="material-icons" ng-if="ordenadoPor['total_creditos']==0">arrow_drop_down</i>
                                <i class="material-icons" ng-if="ordenadoPor['total_creditos']==1">keyboard_arrow_down</i>
                                <i class="material-icons" ng-if="ordenadoPor['total_creditos']==-1">keyboard_arrow_up</i>
                            </a></th>
                            <th>Materias faltantes</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Matr&iacute;cula</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Promedio</th>
                            <th>Total de recursos</th>
                            <th>Porcentaje</th>
                            <th>Materias faltantes</th>
                            <th>Ver</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr dir-paginate="alumno in tutorados.data | filter:q | itemsPerPage: pageSize" total-items="totalAlumnos" current-page="currentPage">
                            <td class="uk-text-large uk-text-nowrap">
                                {{ alumno.matricula }}
                            </td>
                            <td class="uk-text-nowrap">{{ alumno.nombreCompleto }}</td>
                            <td class="uk-text-nowrap">{{ alumno.estado }}</td>
                            <td class="uk-text-nowrap">{{ alumno.promedio }}</td>
                            <td class="uk-text-nowrap">{{ alumno.recursos }}</td>
                            <td class="uk-text-nowrap">{{ alumno.porcentaje + '%' }}</td>
                            <td class="uk-text-nowrap">{{ alumno.faltantes }}</td>
                            <td class="uk-text-nowrap">
                                <div class="btn-group" role="group">
                                    <a title="Kardex" class="btn btn-default waves-effect waves-circle waves-float" ui-sref="kardex({matricula:alumno.matricula})">
                                        <i class="material-icons md-24 uk-text-primary">show_chart</i>
                                    </a>
                                    <a title="Mapa de avance" class="btn btn-default btn-circle waves-effect waves-circle waves-float" ui-sref="mapaAcademico({matricula:alumno.matricula})">
                                        <i class="material-icons md-24 uk-text-primary">map</i>
                                    </a>
                                    <a title="Proyecciones" class="btn btn-default btn-circle waves-effect waves-circle waves-float" ui-sref="proyeccionFutura({matricula:alumno.matricula})">
                                        <i class="material-icons md-24 uk-text-primary">school</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dirpagination">
                </dir-pagination-controls>
            </div>
        </div>
    </div>
</div>