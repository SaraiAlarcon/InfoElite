<!-- Idmatricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idmatricula', 'Alumno:') !!}
    <p>{{ $pagos->matricula->alumno->nombre." ".$pagos->matricula->alumno->apellidos }}</p>
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{{ $pagos->numero }}</p>
</div>

<!-- Mes Pension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mes_pension', 'Mes Pension:') !!}
    <p>{{ $pagos->mes_pension }}</p>
</div>

<!-- Monto Pension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_pension', 'Monto Pension:') !!}
    <p>{{ $pagos->monto_pension }}</p>
</div>

<!-- Monto Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_matricula', 'Monto Matricula:') !!}
    <p>{{ $pagos->monto_matricula }}</p>
</div>

<!-- Monto Material Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_material', 'Monto Material:') !!}
    <p>{{ $pagos->monto_material }}</p>
</div>

<!-- Monto Copias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_copias', 'Monto Copias:') !!}
    <p>{{ $pagos->monto_copias }}</p>
</div>

<!-- Monto Actividades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_actividades', 'Monto Actividades:') !!}
    <p>{{ $pagos->monto_actividades }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{{ date("d/m/Y h:i a", strtotime($pagos->created_at)) }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{{ date("d/m/Y h:i a", strtotime($pagos->updated_at)) }}</p>
</div>

<div class="form-group col-sm-6">
    <a href="{{ route('pagos.index') }}" class="btn btn-default">Atras</a>
</div>