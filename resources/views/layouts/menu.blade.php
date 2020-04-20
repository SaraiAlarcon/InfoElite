<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('matriculas*') ? 'active' : '' }}">
    <a href="{{ route('matriculas.index') }}"><i class="fa fa-edit"></i><span>Matricula</span></a>
</li>

<li class="{{ Request::is('pagos*') ? 'active' : '' }}">
    <a href="{{ route('pagos.index') }}"><i class="fa fa-edit"></i><span>Pagos</span></a>
</li>

<li class="{{ Request::is('aulas*') ? 'active' : '' }}">
    <a href="{{ route('aulas.index') }}"><i class="fa fa-edit"></i><span>Aula</span></a>
</li>

<!-- <li class="{{ Request::is('alumnos*') ? 'active' : '' }}">
    <a href="{{ route('alumnos.index') }}"><i class="fa fa-edit"></i><span>Alumnos</span></a>
</li> -->

<!-- <li class="{{ Request::is('apoderados*') ? 'active' : '' }}">
    <a href="{{ route('apoderados.index') }}"><i class="fa fa-edit"></i><span>Apoderado</span></a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{{ route('grados.index') }}"><i class="fa fa-edit"></i><span>Grados</span></a>
</li>

<li class="{{ Request::is('privilegios*') ? 'active' : '' }}">
    <a href="{{ route('privilegios.index') }}"><i class="fa fa-edit"></i><span>Privilegios</span></a>
</li> -->