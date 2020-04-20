<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'Nombres:') !!}
    <p>{{ $users->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Correo:') !!}
    <p>{{ $users->email }}</p>
</div>

<!-- Privilegio Field -->
<div class="form-group col-sm-4">
    {!! Form::label('idprivilegio', 'Privilegio:') !!}
    <p>{{ $users->privilegio->nombre }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{{ date("d/m/Y h:i a", strtotime($users->created_at)) }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-8">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{{ date("d/m/Y h:i a", strtotime($users->updated_at)) }}</p>
</div>
