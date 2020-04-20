<!-- Idmatricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idmatricula', 'Alumno:') !!}
    <input type="text" id="matricula" value="@if(isset($pagos)){{$pagos->matricula->alumno->nombre.' '.$pagos->matricula->alumno->apellidos }} @else @endif " class="form-control" onclick="getMatricula();" onkeypress="return bloquear(event)">
    {!! Form::hidden('idmatricula', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Mes Pension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mes_pension', 'Mes Pension:') !!}
    {!! Form::select('mes_pension',['' => 'Seleccionar Mes','Enero' => 'Enero','Febrero' => 'Febrero','Marzo'=> 'Marzo','Abril'=> 'Abril','Mayo'=> 'Mayo','Junio' => 'Junio','Julio'=> 'Julio','Agosto'=> 'Agosto','Septiembre'=> 'Septiembre','Octubre'=> 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'], null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Pension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_pension', 'Monto Pension:') !!}
    {!! Form::number('monto_pension', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Monto Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_matricula', 'Monto Matricula:') !!}
    {!! Form::number('monto_matricula', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Monto Material Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_material', 'Monto Material:') !!}
    {!! Form::number('monto_material', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Monto Copias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_copias', 'Monto Copias:') !!}
    {!! Form::number('monto_copias', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Monto Actividades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_actividades', 'Monto Actividades:') !!}
    {!! Form::number('monto_actividades', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('pagos.index') }}" class="btn btn-default">Cancelar</a>
</div>

<!-- Modal Users -->
<div class="modal fade bd-example-modal-lg" id="matricula_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table text-center" id="example2">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $item)
                            <tr>
                                <td>{{ $item->alumno->dni }}</td>
                                <td>{{ $item->alumno->nombre }}</td>
                                <td>{{ $item->alumno->apellidos }}</td>
                                <td>
                                    <div class='btn-group'>
                                        <button type="button" class="btn btn-dark btn-xs" onclick="setMatricula('<?= $item->id; ?>','<?= $item->alumno->nombre; ?>','<?= $item->alumno->apellidos; ?>');">
                                            <i class="fa fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>