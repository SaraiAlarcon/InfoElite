@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Aula
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-danger">
        <div class="box-body">
            <div class="row">
                {!! Form::model($aula, ['route' => ['aulas.update', $aula->id], 'method' => 'patch']) !!}

                @include('aulas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection