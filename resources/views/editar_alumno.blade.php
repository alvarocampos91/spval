<div class="card">
    <div class="card-body">
        <h4 class="card-title">Datos del alumno</h4>
        <h6 class="card-subtitle">Modifique los datos del alumno</h6>

        <form>
            @include('formulario_alumno')
            <button class="btn btn-light btn--icon-text" ng-click="updateAlumno()">
            	<i class="zmdi zmdi-mail-send zmdi-hc-fw"></i> Guardar
            </button>
        </form>        
    </div>
</div>