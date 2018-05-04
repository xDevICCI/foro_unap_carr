@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white d-flex">
                        <div class="">
                        Posted By : {{ $thread->user->name }}
                        </div>
                        <div class="ml-auto">
                            <button class="btn btn-warning">Subscribe</button>
                            <button class="btn btn-outline-warning">Unsubscribe</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p >{{ $thread->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>

                <br>
        @foreach($thread->replies as $reply)
            <div class="card shadow-lg">
            <div class="card-header bg-secondary text-white ">{{ $reply->user->name }}</div>
            <div class="card-body">
                <p>{{ $reply->content }}</p>
            </div>
            <div class="card-footer text-muted">
                {{ $reply->created_at->diffForHumans() }}
            </div>
            </div>
            <br>
        @endforeach

                <div class="bg-white pt-4 pb-4 pl-3 pr-3 shadow-lg">
                    <form action="{{ route('post_reply',$thread->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="title of your reply ...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-primary btn-block" type="submit">reply</button>
                            </div>

                        </div>

                        <div class="row pt-4 pb-4 pl-1 pr-1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="what your solution..."></textarea>
                                </div>
                            </div>

                        </div>

                    </form>
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
