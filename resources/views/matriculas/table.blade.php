<div class="table-responsive">
    <table class="table text-center" id="example">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Grado</th>
                <th>Seccion</th>
                <th>Apoderado</th>
                <th>Colegio Procedencia</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matriculas as $matricula)
            <tr>
                <td>{{ $matricula->alumno->nombre." ".$matricula->alumno->apellidos }}</td>
                <td>{{ $matricula->grado->descripcion }}</td>
                @if(isset($matricula->aula->seccion))
                <td>{{ $matricula->aula->seccion }}</td>
                @else
                <td>
                    <span class="badge bg-primary">PENDIENTE</span>
                </td>
                @endif
                <td>{{ $matricula->apoderado->nombres_a." ".$matricula->apoderado->apellidos_a }}</td>
                <td>{{ $matricula->colegio_procedencia }}</td>
                <td>
                    {!! Form::open(['route' => ['matriculas.destroy', $matricula->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matriculas.show', [$matricula->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('matriculas.edit', [$matricula->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>