<div class="table-responsive">
    <table class="table text-center" id="example">
        <thead>
            <tr>
                <th>Grado</th>
                <th>Seccion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->grado->descripcion }}</td>
                <td>{{ $aula->seccion }}</td>
                <td>
                    {!! Form::open(['route' => ['aulas.destroy', $aula->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('aulas.show', [$aula->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('aulas.edit', [$aula->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>