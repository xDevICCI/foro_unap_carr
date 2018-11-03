@extends('layouts.app')

@section('content')
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a id="menu-toggle" href="#" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
      </a>
    </div>
    <div id="sidebar-wrapper" class="sidebar-toggle">
      <ul class="sidebar-nav">
          <li>
              <a href="{{ url('/forum?filter=all') }}" class="nav-link">Ver Todo</a>
          </li>
          <li>
            @auth
            <a href="{{ url('/forum?filter=me') }}"  class="nav-link">Mis Hilos</a>
            @endauth
          </li>
          <li>
              <a href="{{ url('/forum?filter=sloved') }}"  class="nav-item nav-link">Temas Removidos</a>
          </li>
          <li>
              <a href="{{ url('/forum?filter=notsloved') }}"  class="nav-item nav-link">Posts Abiertos</a>
          </li>
          <li>
              <a href="{{ url('/forum?filter=new') }}"  class="nav-item nav-link">Nuevos Hilos</a>
          </li>
          <li>
              <a href="{{ url('/forum?filter=old') }}"  class="nav-item nav-link">Temas Antiguos</a>
          </li>

        </ul>
    </div>
    </div>
</nav>
@endsection
