<div class="block-header">
	<h2>PROYECCIONES DEL ALUMNO {{datosAlumno.nombreCompleto + ' ' + datosAlumno.matricula}}</h2>
</div>

<div class="btn-group" role="group">
    <a type="button" class="btn btn-primary waves-effect" ui-sref="kardex({matricula:datosAlumno.matricula})">Kardex</a>
    <a type="button" class="btn btn-primary waves-effect" ui-sref="mapaAcademico({matricula:datosAlumno.matricula})">Mapa</a>
    <a type="button" class="btn btn-default waves-effect">Proyección</a>
</div><hr />

<!-- Basic Card -->
<div class="row clearfix">
	<div ng-repeat="pro in proyecciones">
		<div class="row clearfix"  ng-if="$index % 3 == 0"></div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-blue-grey">
					<h2>
						{{pro.datosPeriodo.nombre}}
					</h2>
				</div>
				<div class="body">
					<div class="row clearfix">
						<div class="col-sm-3">
							<label for="creditos">Cr&eacute;ditos:</label>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-line">
									<input type="number" class="form-control" placeholder="Cr&eacute;ditos" max="{{pro.datosPeriodo.creditos_maximos}}" min="{{pro.datosPeriodo.creditos_minimos}}" ng-model="pro.datosPeriodo.creditos" />
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<button type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float waves-light" ng-click="actualizarCreditos($index)">
								<i class="material-icons">check</i>
							</button>
						</div>
					</div>
					<ul class="list-group">
						<li class="list-group-item" ng-repeat="asignatura in pro.listaAsignaturas">
							<div ng-switch="asignatura.tipo">
								<div ng-switch-when="optativa">
									<select ng-model="asignatura.nombre_corto">
										<option ng-repeat="(cod, opt) in asignatura.optativas" >{{opt}}</option>
									</select>
								</div>
								<div ng-switch-when="desit">
									<select ng-model="asignatura.nombre_corto">
										<option ng-repeat="(cod, opt) in asignatura.desits" >{{opt}}</option>
									</select>
								</div>
								<div ng-switch-default>{{asignatura.nombre_corto}}</div>
							</div>
							<!--a ng-click="eliminarMateria(pro.id_periodo,asignatura.codigo)" class="pull-right"><i class="material-icons danger-text">clear</i></a-->
						</li>
					</ul>
				</div>
			</div>
			<br ng-if="($index + 1) % 3 == 0"/>
		</div>
	</div>
</div>