@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">

                @foreach($threads as $thread)

                    <div class="card shadow-lg">
                    <div class="card-header bg-secondary text-white d-flex">
                        <div class="">
                        Posted By : <img src="" width="50px" height="50px" alt="">
                        {{ $thread->user->name }}</div>
                        <div class="ml-auto">
                            <a href="{{ route('show_thread_id',$thread->slug) }}" class="badge badge-warning">view</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{ $thread->content }}</p>
                    </div>
                        <div class="card-footer text-muted d-flex">

                            <div class="">
                                {{ $thread->created_at->diffForHumans() }}
                            </div>

                            <div class="ml-auto">
                                <span class="badge badge-info">opened</span>
                                <span class="badge badge-danger">closed</span>
                            </div>

                        </div>
                </div>
                    <br>
                @endforeach
                {{ $threads->links() }}
            </div>
            <div class="col-md-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
@endsection
