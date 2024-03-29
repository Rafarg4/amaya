<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
<br>
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('juzgados.index') }}"
       class="nav-link {{ Request::is('juzgados*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-gavel"></i>
        <p>Juzgados</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('circunscripcions.index') }}"
       class="nav-link {{ Request::is('circunscripcions*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-list"></i>
        <p>Circunscripciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('fueros.index') }}"
       class="nav-link {{ Request::is('fueros*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-building"></i>
        <p>Fueros</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clientes.index') }}"
       class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
       <i class="fa fas-regular fa-clipboard"></i>
        <p>Clientes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('expedientes.index') }}"
       class="nav-link {{ Request::is('expedientes*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-folder"></i>
        <p>Expedientes</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('audiencias.index') }}"
       class="nav-link {{ Request::is('audiencias*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-calendar"></i>        
       <p>Audiencias</p>
    </a>
  </li>
<li class="nav-item">
<a href="{{route('consultas')}}" class="nav-link"
    class="nav-link {{ Request::is('audiencias/consulta*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Consulta audiencias
</p>
</a>
</li>
<li class="nav-item">
<a href="{{ route('consultas.expedientes') }}" 
  class="nav-link {{ Request::is('consultas*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Consulta de expediente</p>
</a>
</li>
     @can('ver-pago')
<li class="nav-item">
<a href="{{ route('reporte.index') }}" 
  class="nav-link {{ Request::is('reporte*') ? 'active' : '' }}">
<i class="fa fas-regular fa-money-bill"></i>
<p>Pagos y gastos</p>
</a>
</li>
    @endcan

<li class="nav-item">
<a href="{{route('graficos')}}" class="nav-link"
    class="nav-link {{ Request::is('graficos/index*') ? 'active' : '' }}">
<i class="fa fas-solid fa fa-chart-bar"></i>
<p>Graficos
</p>
</a>
</li>
@can('ver-pago')

<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="fa fas-solid fa-user"></i>
        <p>Usuarios</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="" 
       class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i>
        <p>Salir</p>

    </a>
</li>



