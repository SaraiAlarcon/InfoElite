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
        <div class="box-body">
            <div class="row">
                {!! Form::model($pagos, ['route' => ['pagos.update', $pagos->id], 'method' => 'patch']) !!}

                @include('pagos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection