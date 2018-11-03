@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 bg-white pt-4 pb-4 shadow-lg">
        @include('inc.errors')
    <div class="form">
    <form action="{{ route('update_channel',$channel->id) }}" method="post">
        @csrf
        @method('put')
    <div class="row">
    <div class="col-sm-8">
        <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ $channel->title }}">
            </div>
    </div>
    <div class="col-sm-4">
    <button  class="btn btn-outline-danger" type="submit">Actualizar</button>
    </div>
    </div>
    </form>
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
