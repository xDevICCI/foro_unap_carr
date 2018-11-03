@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                @include('inc.errors')

                <div class="card">
                    <form action="{{ route('update_reply',$reply->id) }}" method="post">
                        @csrf
                        @method('put')
                    <div class="card-header"><input type="text" name="title" class="form-control" value="{{ $reply->title }}"></div>
                    <div class="card-body">
                        <textarea name="content" class="form-control" id="reply" cols="30" rows="10">{{ $reply->content }}</textarea>
                        <button class="btn btn-info mt-4" type="submit">update</button>
                        <a href="{{ route('show_thread_id',$reply->thread->slug) }}" class="btn btn-outline-warning mt-4 ml-2">Volver</a>
                    </div>
                    </form>
                    <form action="{{ route('delete_reply',$reply->id) }}" method="post" style="margin: 34px">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-outline-danger mt-4  mb-5 btn-block">Borrar</button>

                    </form>

                </div>


            </div>
            <div class="col-md-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
@endsection
