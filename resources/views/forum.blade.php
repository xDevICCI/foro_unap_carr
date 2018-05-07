@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-8 mb-2">
                <div class="mb-5 mt-3 d-flex" style="justify-content: space-evenly;">
                        <a href="{{ url('/forum?filter=all') }}" class="btn btn-outline-warning">All</a>
                        @auth
                        <a href="{{ url('/forum?filter=me') }}"  class="btn btn-outline-primary">My Threads</a>
                        @endauth
                        <a href="{{ url('/forum?filter=sloved') }}"  class="btn btn-outline-secondary">Sloved</a>
                        <a href="{{ url('/forum?filter=notsloved') }}"  class="btn btn-outline-success">Opened</a>
                        <a href="{{ url('/forum?filter=new') }}"  class="btn btn-dark">New Threads</a>
                        <a href="{{ url('/forum?filter=old') }}"  class="btn btn-danger">Old Threads</a>
                </div>
                @foreach($threads as $thread)

                    <div class="card shadow-lg">
                    <div class="card-header bg-secondary text-white d-flex">
                        <div class="">
                        Posted By : <img src="" width="50px" height="50px" alt="">
                        {{ $thread->user->name }} ( {{ $thread->user->points }} <i class="fas fa-dollar-sign"></i> )</div>
                        <div class="ml-auto">
                            <a href="{{ route('show_thread_id',$thread->slug) }}" class="badge badge-warning">view</a>
                            @if(Auth::id() == $thread->user_id)
                            <a href="{{ route('edit_thread',$thread->id) }}" class="badge badge-success">edit</a>
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
                                <span class="badge badge-danger">closed</span>
                                @else
                                <span class="badge badge-info">opened</span>
                                @endif
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
