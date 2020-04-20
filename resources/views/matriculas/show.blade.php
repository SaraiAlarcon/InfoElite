@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Matricula
    </h1>
</section>
<div class="content">
    @include('matriculas.show_fields')
    <a href="{{ route('matriculas.index') }}" class="btn btn-default">Atras</a>
</div>
@endsection