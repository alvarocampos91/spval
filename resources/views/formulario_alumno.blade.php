<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label class="uk-form-label" for="matricula">Matrícula</label>
            <input type="text" class="form-control" ng-model="alumno.matricula" id="matricula" class="md-input" placeholder="Matrícula" />
            <i class="form-group__bar"></i>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="uk-form-label" for="nombre">Nombre(s)</label>
            <input type="text" class="form-control" ng-model="alumno.nombre" id="nombre" class="md-input" placeholder="Nombre(s)" />
            <i class="form-group__bar"></i>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="uk-form-label" for="paterno">Apellido paterno</label>
            <input type="text" class="form-control" ng-model="alumno.a_paterno" id="paterno" class="md-input" placeholder="Apellido Paterno" />
            <i class="form-group__bar"></i>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="uk-form-label" for="materno">Apellido materno</label>
            <input type="text" class="form-control" ng-model="alumno.a_materno" id="materno" class="md-input" placeholder="Apellido Materno" />
            <i class="form-group__bar"></i>
        </div>
    </div>

    <div class="col-sm-4">        
        <div class="form-group">
            <label class="uk-form-label" for="nacimiento">Fecha de nacimiento</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="form-group">
                    <input type="text" class="form-control datetime-picker" placeholder="Fecha de Nacimiento" ng-model="alumno.fechaNacimiento" id="nacimiento">
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="uk-form-label" for="ingreso">Fecha de ingreso</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="form-group">
                    <input type="text" class="form-control datetime-picker" ng-model="alumno.fechaIngreso" id="ingreso" placeholder="Fecha de Ingreso">
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">        
        <div class="form-group">
            <label class="uk-form-label" for="egreso">Fecha de egreso</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="form-group">
                    <input type="text" class="form-control datetime-picker" ng-model="alumno.fechaEgreso" id="egreso" placeholder="Fecha de Egreso">
                    <i class="form-group__bar"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label class="uk-form-label" for="sexo">Tutor</label>
            <div class="select">
                {{ Form::select('tutor',
                $tutores,1,
                [
                    'class'=>'form-control',
                    'ng-model'=>'alumno.tutor',
                    'data-md-selectize'=>''
                ]) }}
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="uk-form-label" for="sexo">Carrera</label>
            <div class="select">
                {{ Form::select('carrera',
                $carreras,1,
                [
                    'class'=>'form-control',
                    'ng-model'=>'alumno.carrera',
                    'data-md-selectize'=>''
                ]) }}
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="uk-form-label" for="sexo">Sexo</label>
            <div class="select">
                {{ Form::select('sexo',
                [
                    'masculino'=>'Masculino',
                    'femenino'=>'Femenino'
                ],1,
                [
                    'class'=>'form-control',
                    'ng-model'=>'alumno.sexo',
                    'data-md-selectize'=>''
                ]) }}
            </div>
        </div>
    </div>
</div>