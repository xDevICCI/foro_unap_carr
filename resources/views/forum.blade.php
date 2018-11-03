@extends('layouts.app')



@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
              <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                  <div class="navbar-header">
                    <a id="menu-toggle" href="#" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </a>
                    <div class="well text-center">
                        <button type="button" class="btn btn-hot text-capitalize btn-xs"><a href="{{ url('/forum?filter=all') }}">Ver Todo</a></button>
                        @auth
                        <button type="button" class="btn btn-sunny text-capitalize btn-xs"><a href="{{ url('/forum?filter=me') }}">Mis temas</a></button>
                        @endauth
                        <button type="button" class="btn btn-fresh text-capitalize btn-xs"><a href="{{ url('/forum?filter=sloved') }}">Temas Removidos</a></button>
                        <button type="button" class="btn btn-sky text-capitalize btn-xs"><a href="{{ url('/forum?filter=notsloved') }}">Posts Abiertos</a></button>
                        <button type="button" class="btn btn-fresh text-capitalize btn-xs"><a href="{{ url('/forum?filter=new') }}">Nuevos Temas </a></button>
                        <button type="button" class="btn btn-sky text-capitalize btn-xs"><a href="{{ url('/forum?filter=old') }}">Temas Antiguos</a></button>
                    </div>
                  </div>




                  </div>
              </nav>

              

                @foreach($threads as $thread)
                    <div class="card shadow-lg">
                    <div class="card bg-light text-dark card-header bg-secondary text-white d-flex">
                        <div class="">
                        Iniciado por : <img src="" width="50px" height="50px" alt="">
                        {{ $thread->user->name }}
                        <br>
                        Asignatura : {{ $thread->channel->title}}</div>
                        <div class="ml-auto">
                            <a href="{{ route('show_thread_id',$thread->slug) }}" class="badge badge-warning">ver</a>
                            @if(Auth::id() == $thread->user_id)
                            <a href="{{ route('edit_thread',$thread->id) }}" class="badge badge-success">editar</a>
                            @endauth
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{!!  Markdown::convertToHtml($thread->content) !!}</p>
                    </div>
                        <div class="card-footer text-muted d-flex">

                            <div class="">
                                {{ $thread->created_at->diffForHumans() }}
                            </div>

                            <div class="ml-auto">
                                @if($thread->hasclosed())
                                <span class="badge badge-danger">cerrado</span>
                                @else
                                <span class="badge badge-info">abierto</span>
                                @endif
                            </div>

                        </div>
                </div>
                    <br>
                @endforeach
                {{ $threads->links() }}
            </div>
            <div class="col-md-2">
                @include('inc.sidebar')
            </div>


            <!-- Footer -->
            <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
              <div class="container">
                <div class="row row-30">
                  <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                      <p>Este foro fue creado con el fin de unir a los estudiantes nuevos y antiguos de la carrera ICCI.</p>
                      <!-- Rights-->
                      <p class="rights"><span>©  </span><span class="copyright-year">2018</span><span> </span><span>ICCI</span><span>. </span><span>Todos los Derechos Reservados.</span></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h5>Contactos</h5>
                    <dl class="contact-list">
                      <dt>Dirección:</dt>
                      <dd>Universidad Arturo Prat, Playa Brava</dd>
                    </dl>
                    <dl class="contact-list">
                      <dt>E-mail:</dt>
                      <dd><a href="mailto:#">vgodoy.work@gmail.com</a></dd>
                    </dl>
                    <dl class="contact-list">
                    </dl>
                  </div>
                  <div class="col-md-4 col-xl-3">
                    <h5>Página Web ICCI UNAP</h5>
                    <ul class="nav-list">
                      <li><a href="http://www.inf.unap.cl/index.php/category/noticias/">Inicio</a></li>
                      <li><a href="http://www.inf.unap.cl/index.php/category/carrera/">Carrera</a></li>
                      <li><a href="http://www.inf.unap.cl/index.php/category/alumnos/">Alumnos</a></li>
                      <li><a href="https://twitter.com/icciunap">Twitter ICCI</a></li>
                      <li><a href="https://www.flickr.com/photos/icci_unap/albums">Fotos</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row no-gutters social-container">
                <div class="col"><a class="social-inner" href="https://www.facebook.com/icciunap/"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
                <div class="col"><a class="social-inner" href="https://www.flickr.com/photos/icci_unap/albums"><span class="icon mdi mdi-instagram"></span><span>Flickr</span></a></div>
                <div class="col"><a class="social-inner" href="https://twitter.com/icciunap"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
                <div class="col"><a class="social-inner" href="https://www.google.cl/"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
              </div>
            </footer>
            <!-- ./Footer -->

            </div>
            </div>
	<!-- ./Footer -->

        </div>
    </div>


@endsection
