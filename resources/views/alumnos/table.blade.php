<div class="table-responsive">
    <table class="table" id="alumnos-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dni</th>
                <th>Sexo</th>
                <th>Fecha Nacimiento</th>
                <th>Direccion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->dni }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->direccion }}</td>
                <td>
                    {!! Form::open(['route' => ['alumnos.destroy', $alumno->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('alumnos.show', [$alumno->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('alumnos.edit', [$alumno->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>