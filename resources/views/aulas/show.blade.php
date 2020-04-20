@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Aula
    </h1>
</section>
<div class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('aulas.show_fields')
            </div>
        </div>
    </div>
</div>
@endsection