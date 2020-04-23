@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Usuarios
    </h1>
</section>
<div class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('users.show_fields')
                <div class="form-group col-sm-12">
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection