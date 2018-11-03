
@auth
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" >Dashboard</a>
    </li>
@endauth

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="http://www.inf.unap.cl/index.php/category/noticias/" >Ir a Página Web ICCI Unap</a>

    </li>
    @auth

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('my_profile') }}" >Mi perfil</a>
    </li>

    @if(Auth::user()->role)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a  href="#" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" aria-expanded="false">Usuarios</a>
        <span class="badge badge-success badge-pill">{{ App\User::all()->count() }}</span>

    </li>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
            <a href="{{ route('new_user_create') }}" >Nuevo Usuario</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
            <a href="{{ route('show_all_users') }}">Todos los Usuarios</a>
        </li>
    </div>
    @endif
    @if(Auth::user()->role)
    <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('create_channel') }}">Asignaturas</a>
    <span class="badge badge-danger badge-pill">{{ App\Channel::all()->count() }}</span>
    </li>
    @endif

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#"  data-toggle="collapse" data-target="#collapse2" aria-controls="collapse2" aria-expanded="false">Temas</a>
        <span class="badge badge-info badge-pill">{{ App\Thread::all()->count() }}</span>
    </li>
    <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
            <a href="{{ route('create_thread') }}">Nuevo Tema</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
            <a href="{{ route('show_all_threads') }}">Todos los Temas</a>
        </li>
    </div>
@endauth
