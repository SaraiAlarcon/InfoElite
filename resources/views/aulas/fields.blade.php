<!-- Idgrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idgrado', 'Grado:') !!}
    {!! Form::select('idgrado',$listGrado, null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion', 'Seccion:') !!}
    {!! Form::text('seccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('aulas.index') }}" class="btn btn-default">Cancelar</a>
</div>