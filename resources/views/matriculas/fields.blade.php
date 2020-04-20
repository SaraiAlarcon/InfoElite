<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del Estudiante</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombre', 'Nombre:') !!}
                @if(isset($matricula->alumno))
                {!! Form::text('nombre', $matricula->alumno->nombre, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Apellidos Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellidos', 'Apellidos:') !!}
                @if(isset($matricula->alumno))
                {!! Form::text('apellidos', $matricula->alumno->apellidos, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Dni Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dni', 'Dni:') !!}
                @if(isset($matricula->alumno))
                {!! Form::text('dni', $matricula->alumno->dni, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('dni', null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Sexo Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('sexo', 'Sexo:') !!}
                @if(isset($matricula->alumno))
                {!! Form::select('sexo',['' => 'Seleccionar Sexo','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $matricula->alumno->sexo, ['class' => 'form-control']) !!}
                @else
                {!! Form::select('sexo',['' => 'Seleccionar Sexo','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Fecha Nacimiento Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
                @if(isset($matricula->alumno))
                {!! Form::text('fecha_nacimiento', date("d-m-Y", strtotime($matricula->alumno->fecha_nacimiento)), ['class' => 'form-control','id'=>'datepicker']) !!}
                @else
                {!! Form::text('fecha_nacimiento', null, ['class' => 'form-control','id'=>'datepicker']) !!}
                @endif
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('direccion', 'Direccion:') !!}
                @if(isset($matricula->alumno))
                {!! Form::text('direccion', $matricula->alumno->direccion, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Datos del Apoderado</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Dni Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dni_apoderado', 'Dni:') !!}
                @if(isset($matricula->apoderado))
                {!! Form::text('dni_apoderado', $matricula->apoderado->dni_apoderado, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('dni_apoderado', null, ['class' => 'form-control']) !!}
                @endif
            </div>
            <!-- Nombres Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombres_a', 'Nombres:') !!}
                @if(isset($matricula->apoderado))
                {!! Form::text('nombres_a', $matricula->apoderado->nombres_a, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('nombres_a', null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Apellidos Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellidos_a', 'Apellidos:') !!}
                @if(isset($matricula->apoderado))
                {!! Form::text('apellidos_a', $matricula->apoderado->apellidos_a, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('apellidos_a', null, ['class' => 'form-control']) !!}
                @endif
            </div>

            <!-- Telefono Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('telefono', 'Telefono:') !!}
                @if(isset($matricula->apoderado))
                {!! Form::text('telefono', $matricula->apoderado->telefono, ['class' => 'form-control']) !!}
                @else
                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Registro de Matricula</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Colegio Procedencia Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('colegio_procedencia', 'Colegio Procedencia:') !!}
                {!! Form::text('colegio_procedencia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Grado Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('idgrado', 'Grado:') !!}
                {!! Form::select('idgrado',$listGrado, null, ['class' => 'form-control select2' ,'onchange' => 'setSeccion()']) !!}
            </div>

            <!-- Grado Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('idaula', 'Seccion:') !!}
                {!! Form::select('idaula',['' => 'Seleccionar Seccion'], null, ['class' => 'form-control select2']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
                <a href="{{ route('matriculas.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::hidden('idalumno', null, ['class' => 'form-control']) !!}
            {!! Form::hidden('idapoderado', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>