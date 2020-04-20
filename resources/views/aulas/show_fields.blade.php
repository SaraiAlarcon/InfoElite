<!-- Idgrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idgrado', 'Grado:') !!}
    <p>{{ $aula->grado->descripcion }}</p>
</div>

<!-- Seccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion', 'Seccion:') !!}
    <p>{{ $aula->seccion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{{ $aula->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{{ $aula->updated_at }}</p>
</div>

<div class="form-group col-sm-12">
    <a href="{{ route('aulas.index') }}" class="btn btn-default">Atras</a>
</div>