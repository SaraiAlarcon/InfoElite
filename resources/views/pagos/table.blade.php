<div class="table-responsive">
    <table class="table text-center" id="example">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Numero</th>
                <th>Mes</th>
                <th>Monto Pension</th>
                <th>Monto Matricula</th>
                <th>Monto Material</th>
                <th>Monto Copias</th>
                <th>Monto Actividades</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pagos)
            <tr>
                <td>{{ $pagos->matricula->alumno->nombre." ".$pagos->matricula->alumno->apellidos }}</td>
                <td>{{ $pagos->numero }}</td>
                <td>{{ $pagos->mes_pension }}</td>
                <td>{{ $pagos->monto_pension }}</td>
                <td>{{ $pagos->monto_matricula }}</td>
                <td>{{ $pagos->monto_material }}</td>
                <td>{{ $pagos->monto_copias }}</td>
                <td>{{ $pagos->monto_actividades }}</td>
                <td>
                    {!! Form::open(['route' => ['pagos.destroy', $pagos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pagos.show', [$pagos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pagos.edit', [$pagos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>