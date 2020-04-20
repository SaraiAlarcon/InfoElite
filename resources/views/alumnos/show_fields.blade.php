<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $alumno->nombre }}</p>
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{{ $alumno->apellidos }}</p>
</div>

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    <p>{{ $alumno->dni }}</p>
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <p>{{ $alumno->sexo }}</p>
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    <p>{{ $alumno->fecha_nacimiento }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $alumno->direccion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $alumno->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $alumno->updated_at }}</p>
</div>

