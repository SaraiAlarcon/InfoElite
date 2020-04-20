@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Matricula
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')

    {!! Form::open(['route' => 'matriculas.store']) !!}

    @include('matriculas.fields')

    {!! Form::close() !!}

</div>
@endsection