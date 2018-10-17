<style type="text/css">
	.materia, 
	.area
	{
		color: black;
	}
	.row {
		padding-bottom: 5px;
	}

	.col-md-2 {
		padding: 0 5px;
	}

	.col-md-6 {
		padding: 0 30px;
	}

	.materia {
		border-radius: 5px 5px 0 0;
		border: 1px solid;
	}

	.col-md-4 > div {
		height: 4em;
	}

	.materia > strong {
		display: block;
		padding: 5px;
		border-bottom: 1px solid;
		height: 4em;
		overflow: hidden;
	}

	.materia.bg-teal,
	.materia.bg-teal > strong {
		border-color: green;
	}

	.bg-red.materia.proyeccion,
	.bg-red.area
	{
		color: black !important;
		background: url('img/red-bg.png');            
	}

	.bg-blue.materia.proyeccion,
	.bg-blue.area
	{
		color: black !important;
		background: url('img/blue-bg.png');            
	}

	.bg-teal.materia.proyeccion,
	.bg-teal.area
	{
		color: black !important;
		background: url('img/green-bg.png');            
	}

	.bg-yellow.materia.proyeccion,
	.bg-yellow.area
	{
		color: black !important;
		background: url('img/yellow-bg.png');            
	}

	.materia
	{
		overflow: hidden;
	}

	.bg-red,
	.bg-red > strong {
		border-color: crimson;
	}

	.bg-blue,
	.bg-blue > strong {
		border-color: blue;
	}

	.bg-yellow,
	.bg-yellow > strong {
		border-color: brown;
	}

	.materia li {
		cursor: pointer;
	}

	.materia.white-bg {
		background: white !important;
		color: cyan !important;
	}

	.materia.bg-teal.white-bg {
		color: green !important;
	}

	.materia.bg-red.white-bg {
		color: crimson !important;
	}

	.materia.bg-blue.white-bg {
		color: blue !important;
	}

	.materia.bg-yellow.white-bg {
		color: brown !important;
	}

	.materia.semi-opaco {
		opacity: .5;
	}

	.white-bg.semi-opaco {
		opacity: 1;
	}

	.img-perfil.inicio
	{
		width: 64px;
	}
</style>
<div class="block-header">
	<h2>INFORMACION DEL ALUMNO  {{datosAlumno.nombreCompleto.nombre + ' ' + datosAlumno.nombreCompleto.aPaterno + ' ' + datosAlumno.nombreCompleto.aMaterno + ' ' + datosAlumno.matricula}}</h2>
</div>

<div class="btn-group" role="group">
    <a type="button" class="btn btn-primary waves-effect" ui-sref="kardex({matricula:datosAlumno.matricula})">Kardex</a>
    <a type="button" class="btn btn-default waves-effect">Mapa</a>
    <a type="button" class="btn btn-primary waves-effect" ui-sref="proyeccionFutura({matricula:datosAlumno.matricula})">Proyección</a>
</div><hr />

<!-- Basic Card -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card" style="overflow: auto;">
			<div class="header">
				<h2>
					Mapa de avance acad&eacute;mico
				</h2>
			</div>
			<div class="body">

				<div class="row text-center tooltip-demo" style="width:1600px; background: white url('img/mapa.png') no-repeat right top; padding-top: 35px;">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4" id="celda-1">
								<div class="bg-teal area">&Aacute;rea de Ciencias B&aacute;sicas</div>
							</div>
							<div class="col-md-2" id="materia-5">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-001')">
									<strong>Introd. a las Matem&aacute;ticas</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-001')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-7">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-003')">
									<strong>C&aacute;lculo Dif. e Integ.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-003')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-8">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-004')">
									<strong>C&aacute;lculo Avanzado</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-004')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-11">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-007')">
									<strong>Probab. y Estad&iacute;stica</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-007')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-12"></div>
							<div class="col-md-2" id="celda-13"></div>
							<div class="col-md-2" id="celda-14"></div>
							<div class="col-md-2" id="celda-15"></div>
							<div class="col-md-2" id="materia-19">
								<div class="materia bg-red" ng-class="obtenerClase('CCOM-259')">
									<strong>Graficaci&oacute;n</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('CCOM-259')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-23">
								<div class="bg-red area">&Aacute;rea de Modelado de Sist&eacute;mas</div>
							</div>
							<div class="col-md-2" id="celda-24"></div>
							<div class="col-md-2" id="materia-6">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-002')">
									<strong>Alg. Lineal con Aplic.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-002')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">4</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-9">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-005')">
									<strong>Matem&aacute;ticas Discretas</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-005')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-12">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-008')">
									<strong>Invest. de Operaciones</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-008')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-34"></div>
							<div class="col-md-2" id="celda-35"></div>
							<div class="col-md-2" id="celda-36"></div>
							<div class="col-md-2" id="materia-10">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-006')">
									<strong>F&iacute;sica</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-006')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-13">

								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-009')">
									<strong>Circuitos El&eacute;ctricos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-009')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-45"></div>
							<div class="col-md-2" id="materia-14">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-010')">
									<strong>Introducci&oacute;n de la Prog.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-010')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-15">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-011')">
									<strong>Programaci&oacute;n O. O. I</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-011')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-16">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-012')">
									<strong>Programaci&oacute;n O. O. II</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-012')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-17">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-013')">
									<strong>Ing. de Software I</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-013')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div style="margin:45px;"></div>
						<div class="row">
							<div class="col-md-4" id="celda-56">
								<div class="bg-blue area">&Aacute;rea de Tecnolog&iacute;a</div>
							</div>
							<div class="col-md-2" id="celda-57"></div>
							<div class="col-md-2" id="celda-58"></div>
							<div class="col-md-2" id="celda-59"></div>
							<div class="col-md-2" id="materia-18">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-014')">
									<strong>Fund. de la Pro. L&oacute;giac</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-014')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-67"></div>
							<div class="col-md-2" id="celda-68"></div>
							<div class="col-md-2" id="celda-69"></div>
							<div class="col-md-2" id="celda-70"></div>
							<div class="col-md-2" id="materia-20">
								<div class="materia bg-blue" ng-class="obtenerClase('ITIM-015')">
									<strong>Sistemas Operativos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-015')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-78">
								<div class="bg-yellow area">&Aacute;rea de Formaci&oacute;n General Universitaria</div>
							</div>
							<div class="col-md-2" id="materia-22">
								<div class="materia bg-yellow" ng-class="obtenerClase('TCDM-002')">
									<strong>Redacci&oacute;n</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('TCDM-002')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">4</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-80"></div>
							<div class="col-md-2" id="materia-4">
								<div class="materia bg-yellow" ng-class="obtenerClase('FGUM-008')">
									<strong>Innovaci&oacute;n y Talento</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('FGUM-008')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">4</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-82"></div>
						</div>

						<div style="margin:45px;"></div>
						<div class="row">
							<div class="col-md-4" id="celda-89"></div>
							<div class="col-md-2" id="materia-21">
								<div class="materia bg-yellow" ng-class="obtenerClase('TCDM-001')">
									<strong>Herramientas Aprendizaje Aut&oacute;nomo</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('TCDM-001')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">2</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-91"></div>
							<div class="col-md-2" id="celda-92"></div>
							<div class="col-md-2" id="celda-93"></div>
						</div>
						<div class="row">
							<div class="col-md-4" id="celda-100"></div>
							<div class="col-md-2" id="materia-3">
								<div class="materia bg-yellow" ng-class="obtenerClase('FGUM-003')">
									<strong>DHTIC</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('FGUM-003')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">4</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">4</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-2">
								<div class="materia bg-yellow" ng-class="obtenerClase('FGUM-002')">
									<strong>DHPC</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('FGUM-002')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">4</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-1">
								<div class="materia bg-yellow" ng-class="obtenerClase('FGUM-001')">
									<strong>Formaci&oacute;n Humana y Soc.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('FGUM-001')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">4</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-104"></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2" id="materia-34">
								<div class="materia bg-teal" ng-class="obtenerClase('CCOM-258')">
									<strong>Redes de Compu.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('CCOM-258')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-35">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-251')">
									<strong>Redes y Servicios</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-251')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-24">
								<div class="materia bg-blue" ng-class="obtenerClase('IDTI-201')">
									<strong>Adm&oacute;n. de Redes</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDTI-201')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-9"></div>
							<div class="col-md-2" id="celda-10"></div>
							<div class="col-md-2" id="celda-11"></div>
						</div>
						<div class="row">
							<div class="col-md-2" id="materia-33">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-250')">
									<strong>M&eacute;todos Estad&iacute;sticos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-250')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-18"></div>
							<div class="col-md-2" id="celda-19"></div>
							<div class="col-md-2" id="materia-31">
								<div class="materia bg-red" ng-class="obtenerClase('SSTI-900')">
									<strong>Servicio Social</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('SSTI-900')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">10</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-21"></div>
							<div class="col-md-2" id="celda-22"></div>
						</div>
						<div class="row">
							<div class="col-md-2" id="celda-28"></div>
							<div class="col-md-2" id="celda-29"></div>
							<div class="col-md-2" id="materia-45">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-260')">
									<strong>M&eacute;todos Formales</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-260')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-31"></div>
							<div class="col-md-2" id="celda-32"></div>
							<div class="col-md-2" id="celda-33"></div>
						</div>
						<div class="row">
							<div class="col-md-2" id="materia-36">
								<div class="materia bg-teal" ng-class="obtenerClase('ITIM-004')">
									<strong>Sistemas Digitales</strong>
									<ul class="list-inline">
										<!--li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-008')}}</li-->
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-23">
								<div class="materia bg-red" ng-class="obtenerClase('IDTI-200')">
									<strong>Ing. de Software II</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDTI-200')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-28">
								<div class="materia bg-red" ng-class="obtenerClase('IDDM-001')">
									<strong>Adm&oacute;n de Proyectos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDDM-001')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-42"></div>
							<div class="col-md-2" id="materia-29">
								<div class="materia bg-blue" ng-class="obtenerClase('IDDM-002')">
									<strong>Proyecto I+D 1</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDDM-002')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-30">
								<div class="materia bg-blue" ng-class="obtenerClase('IDDM-003')">
									<strong>Proyecto I+D 2</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDDM-003')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">1</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2" id="materia-37">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-253')">
									<strong>Dise&ntilde;o de BD</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-253')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-38">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-254')">
									<strong>Adm&oacute;n de BD</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-254')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-46">
								<div class="materia bg-blue" ng-class="obtenerClase('ITIM-261')">
									<strong>Miner&iacute;a de Datos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-261')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-25">
								<div class="materia bg-blue" ng-class="obtenerClase('IDTI-202')">
									<strong>Intelig. de Negocios</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDTI-202')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-54"></div>
							<div class="col-md-2" id="celda-55"></div>
						</div>

						<div style="margin:45px;"></div>
						<div class="row">
							<div class="col-md-2" id="celda-61"></div>
							<div class="col-md-2" id="materia-39">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-255')">
									<strong>TG de Sist. y Sist. de Inf.</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-255')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-41">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-256')">
									<strong>Mod. de Pr. de Negocios</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-256')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-64"></div>
							<div class="col-md-2" id="celda-65"></div>
							<div class="col-md-2" id="celda-66"></div>
						</div>
						<div class="row">
							<div class="col-md-2" id="materia-43">
								<div class="materia bg-blue" ng-class="obtenerClase('ITIM-258')">
									<strong>Adm&oacute;n de Sist. Operativos</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-258')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-44">
								<div class="materia bg-red" ng-class="obtenerClase('ITIM-259')">
									<strong>C&oacute;mputo Distribuido</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-259')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-74"></div>
							<div class="col-md-2" id="materia-27">
								<div class="materia bg-blue" ng-class="obtenerClase('IDTI-204')">
									<strong>Trabajo Colaborativo</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDTI-204')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-76"></div>
							<div class="col-md-2" id="materia-32">
								<div class="materia bg-red" ng-class="obtenerClase('PPTI-901')">
									<strong>Pr&aacute;ctica Profesional</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('PPTI-901')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2" id="materia-42">
								<div class="materia bg-blue" ng-class="obtenerClase('ITIM-257')">
									<strong>Tecnolog&iacute;as Web</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-257')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-84"></div>
							<div class="col-md-2" id="materia-40">
								<div class="materia bg-blue" ng-class="obtenerClase('ICCM-605')">
									<strong>Ingenier&iacute;a Web</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ICCM-605')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-48">
								<div class="materia bg-blue">
									<strong>Servicios Web</strong>
									<ul class="list-inline" ng-class="obtenerClase('ITIM-262')">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ITIM-262')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="materia-26">
								<div class="materia bg-blue" ng-class="obtenerClase('IDTI-203')">
									<strong>Pr. de Disp. M&oacute;viles</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('IDTI-203')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">2</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">3</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-88"></div>
						</div>
						<div style="margin:45px;"></div>
						<div class="row">
							<div class="col-md-2" id="celda-94"></div>
							<div class="col-md-2" id="celda-95"></div>
							<div class="col-md-2" id="materia-47">
								<div class="materia bg-blue" ng-class="obtenerClase('ICCM-612')">
									<strong>IHC</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{obtenerCalificacion('ICCM-612')}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">5</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">0</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">5</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-97">
								<div class="materia gray-bg" ng-if="desits[0] == undefined">
									<strong>Optativa 1</strong>
									<ul class="list-inline">
										<li>DESIT</li>
									</ul>
								</div>
								<div class="materia bg-blue" ng-if="desits[0] != undefined">
									<strong>{{desits[0].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{desits[0].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{desits[0].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{desits[0].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{desits[0].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{desits[0].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-98">
								<div class="materia gray-bg" ng-if="desits[1] == undefined">
									<strong>Optativa 2</strong>
									<ul class="list-inline">
										<li>DESIT</li>
									</ul>
								</div>
								<div class="materia bg-blue" ng-if="desits[1] != undefined">
									<strong>{{desits[1].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{desits[1].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{desits[1].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{desits[1].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{desits[1].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{desits[1].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-99">
								<div class="materia gray-bg" ng-if="desits[2] == undefined">
									<strong>Optativa 3</strong>
									<ul class="list-inline">
										<li>DESIT</li>
									</ul>
								</div>
								<div class="materia bg-blue" ng-if="desits[2] != undefined">
									<strong>{{desits[2].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{desits[2].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{desits[2].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{desits[2].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{desits[2].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{desits[2].creditos}}</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2" id="celda-105">
								<div class="materia lazur-bg" ng-if="optativas[0] == undefined">
									<strong>Optativa 1</strong>
									<ul class="list-inline"></ul>
								</div>
								<div class="materia bg-blue" ng-if="optativas[0] != undefined">
									<strong>{{optativas[0].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{optativas[0].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{optativas[0].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{optativas[0].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{optativas[0].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{optativas[0].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-106">
								<div class="materia lazur-bg" ng-if="optativas[1] == undefined">
									<strong>Optativa 2</strong>
									<ul class="list-inline"></ul>
								</div>
								<div class="materia bg-blue" ng-if="optativas[1] != undefined">
									<strong>{{optativas[1].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{optativas[1].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{optativas[1].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{optativas[1].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{optativas[1].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{optativas[1].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-107"></div>
							<div class="col-md-2" id="celda-108">
								<div class="materia lazur-bg" ng-if="optativas[2] == undefined">
									<strong>Optativa 3</strong>
									<ul class="list-inline"></ul>
								</div>
								<div class="materia bg-blue" ng-if="optativas[2] != undefined">
									<strong>{{optativas[2].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{optativas[2].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{optativas[2].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{optativas[2].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{optativas[2].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{optativas[2].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-109">
								<div class="materia lazur-bg" ng-if="optativas[3] == undefined">
									<strong>Optativa 4</strong>
									<ul class="list-inline"></ul>
								</div>
								<div class="materia bg-blue" ng-if="optativas[3] != undefined">
									<strong>{{optativas[3].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{optativas[3].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{optativas[3].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{optativas[3].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{optativas[3].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{optativas[3].creditos}}</li>
									</ul>
								</div>
							</div>
							<div class="col-md-2" id="celda-110">
								<div class="materia lazur-bg" ng-if="optativas[4] == undefined">
									<strong>Optativa 5</strong>
									<ul class="list-inline"></ul>
								</div></div>
								<div class="materia bg-blue" ng-if="optativas[4] != undefined">
									<strong>{{optativas[4].nombreCorto}}</strong>
									<ul class="list-inline">
										<li data-toggle="tooltip" data-placement="bottom" title="Calificacion">{{optativas[4].calificacion}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas teoria">{{optativas[4].horasTeoria}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas laboratorio">{{optativas[4].horasPractica}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Horas trabajo independiente">{{optativas[4].horasIndependiente}}</li>
										<li data-toggle="tooltip" data-placement="bottom" title="Numero de creditos">{{optativas[4].creditos}}</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
