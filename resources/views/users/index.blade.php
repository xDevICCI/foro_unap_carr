
@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2  pt-4 pb-5 pl-2 pr-2 bg-white shadow-lg">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Tipo de Usuario</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->role == false )subscriber @else admin @endif</td>
                            <td>
                                @if($user->role == true )
                                    <a href="{{ route('make_subsc',$user->id) }}" class="badge badge-dark">hacer Estudiante</a>
                                @else
                                    <a href="{{ route('make_admin',$user->id) }}" class="badge badge-primary">Hacer Administrador</a>
                                @endif

                            </td>

                            <td>
                                <form action="{{ route('delete_user',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Estas seguro de eliminar ? ');" class="btn btn-outline-danger btn-sm"><i class="fas fa-minus-circle"></i>
                                         trash
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-4">

                <div class="shadow-lg">
                    @include('inc.sidebar')

                </div>
            </div>
        </div>
    </div>
@endsection
