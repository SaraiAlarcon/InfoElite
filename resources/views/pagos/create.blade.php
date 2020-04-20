@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Pagos
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Registro de Pagos</h3>
        </div>
        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'pagos.store']) !!}

                @include('pagos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection