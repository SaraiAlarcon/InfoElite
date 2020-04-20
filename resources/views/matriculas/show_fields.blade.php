<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del Estudiante</h3>
    </div>
    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <!-- Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombre', 'Nombre:') !!}
                <p>{{ $matricula->alumno->nombre }}</p>
            </div>

            <!-- Apellidos Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellidos', 'Apellidos:') !!}
                <p>{{ $matricula->alumno->apellidos }}</p>
            </div>

            <!-- Dni Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dni', 'Dni:') !!}
                <p>{{ $matricula->alumno->dni }}</p>
            </div>

            <!-- Sexo Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('sexo', 'Sexo:') !!}
                <p>{{ $matricula->alumno->sexo }}</p>
            </div>

            <!-- Fecha Nacimiento Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
                <p>{{ date("d/m/Y", strtotime($matricula->alumno->fecha_nacimiento)) }}</p>
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('direccion', 'Direccion:') !!}
                <p>{{ $matricula->alumno->direccion }}</p>
            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del Apoderado</h3>
    </div>
    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <!-- Dni Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dni_apoderado', 'Dni:') !!}
                <p>{{ $matricula->apoderado->dni_apoderado }}</p>
            </div>
            <!-- Nombres Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombres_a', 'Nombres:') !!}
                <p>{{ $matricula->apoderado->nombres_a }}</p>
            </div>

            <!-- Apellidos Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellidos_a', 'Apellidos:') !!}
                <p>{{ $matricula->apoderado->apellidos_a }}</p>
            </div>

            <!-- Telefono Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('telefono', 'Telefono:') !!}
                <p>{{ $matricula->apoderado->telefono }}</p>
            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Datos de Matricula</h3>
    </div>
    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <!-- Colegio Procedencia Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('colegio_procedencia', 'Colegio Procedencia:') !!}
                <p>{{ $matricula->colegio_procedencia }}</p>
            </div>

            <!-- Grado Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('idgrado', 'Grado:') !!}
                <p>{{ $matricula->grado->descripcion }}</p>
            </div>

            <!-- Idaula Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('idaula', 'Aula:') !!}
                @if(isset($matricula->aula->seccion))
                <p>{{ $matricula->aula->seccion }}</p>
                @else
                <p>PENDIENTE</p>
                @endif
            </div>

            <!-- Created At Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('created_at', 'Creado en:') !!}
                <p>{{ date("d/m/Y h:i a", strtotime($matricula->created_at)) }}</p>
            </div>

            <!-- Updated At Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('updated_at', 'Actualizado en:') !!}
                <p>{{ date("d/m/Y h:i a", strtotime($matricula->updated_at)) }}</p>
            </div>
        </div>
    </div>
</div>