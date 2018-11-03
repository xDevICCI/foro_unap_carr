@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 bg-white pt-4 pb-4 shadow-lg">
    @include('inc.errors')
<div class="form">
<form action="{{ route('new_channel') }}" method="post">
    @csrf
<div class="row">
<div class="col-sm-8">
    <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Título de la asignatura">
        </div>
</div>
<div class="col-sm-4">
<button  class="btn btn-outline-danger" type="submit">Agregar categoría</button>
</div>
</div>
</form>
</div>
<div class="col-md-12">
<div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Asignatura</th>
        @if(Auth::user()->role)
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
        @endif
    </tr>
    </thead>
    <tbody>
        @foreach(App\Channel::paginate(5) as $channel)
        <tr>
            <td>{{ $channel->id}}</td>
            <td>
                    <div class="form-group col-sm-10">
                        <input type="text" name="title" value="{{ $channel->title }}" disabled class="form-control">
                    </div>
                    @if(Auth::user()->role)
                    <td>
                    <a class="badge badge-success" href="{{ route('edit_channel',$channel->id) }}">editar</a>
                    </td>
                    @endif
                </form>
            </td>
            @if(Auth::user()->role)
            <td>
                <form action="{{ route('delete_channel',$channel->id) }}" method="post">
                    @csrf
                    @method('delete')
                        <button onclick="return confirm('Estás seguro que quieres eliminar?');" class="badge badge-danger" type="submit">Basura</button>
                </form>
            </td>
            @endif

        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
<div class="col-md-4 ">
<div class=" shadow-lg">
@include('inc.sidebar')
</div>
</div>
</div>
</div>
@endsection
