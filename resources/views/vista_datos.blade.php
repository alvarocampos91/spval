<div class="card">
    <div class="card-header">{{$nombre}}: <strong>
        @php
        echo '{{ '.$objeto.'.'.$variable.' }} {{ '.$objeto.'.id }}';
        @endphp
    </strong></div>
    <div class="card-body">
        <h6 class="card-subtitle">
            @php
            echo '{{ nombre }}';
            @endphp
        </h6>
        <div class="row">@php
            foreach ($datos as $key => $value) 
            {
                echo '<div class="col-md-3"><h5>'.$value.'</h5></div><div class="col-md-9">{{ '.$objeto.'.'.$key.' }} </div>';
            }
            @endphp
            <div class="col-md-offset-8">
                <a class="btn btn-warning btn--icon-text" ui-sref="edit{{$nombre}}({matricula:{{$objeto}}.matricula})">
                    <i class="zmdi zmdi-edit"></i> Editar
                </a>
            </div>
        
        </div>
    </div>
</div>