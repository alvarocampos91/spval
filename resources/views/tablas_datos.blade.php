<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$nombreTabla}}</h4>
        <h6 class="card-subtitle"><code>Tabla</code> {{$nombreTabla}}
        </h6>

        <table class="table mb-0 table-inverse table-bordered table-hover">
            <thead class="thead-inverse">
                <tr>
                    @php
                    foreach ($datosTabla as $key => $value) 
                    {
                        echo '<th>'.$value.'</th>';
                    }
                    @endphp
                </tr>
            </thead>
            <tbody>
                <tr dir-paginate="dato in {{$nombreArreglo}} | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                    @php
                    $i = 0;
                    foreach ($datosTabla as $key => $value) 
                    {
                        echo $i != 0? '<td>{{ dato.'.$key.' }}</td>':'<td><a class=""btn btn-link" style="color: #00bfff" ui-sref="view'.$nombreTabla.'({matricula:dato.id})">{{ dato.'.$key.' }}</a></td>';
                        $i++;
                    }
                    @endphp
                    <td class="uk-text-nowrap">
                        <a title="Eliminar" ng-click="delete{{$nombreTabla}}(dato)" class="uk-margin-left"><i class="text-danger zmdi zmdi-close zmdi-hc-fw"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <a type="button" class="btn btn-primary btn--icon-text btn-light btn-block" ui-sref="newAlumno"><i class="zmdi zmdi-plus"></i> Agregar</a>
    </div>
    <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="{{url('pagination')}}" class="card-header"></dir-pagination-controls>
</div>