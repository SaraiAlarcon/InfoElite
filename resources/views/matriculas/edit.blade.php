@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Matricula
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    {!! Form::model($matricula, ['route' => ['matriculas.update', $matricula->id], 'method' => 'patch']) !!}

    @include('matriculas.fields')

    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    setSeccion();
</script>
@endsection