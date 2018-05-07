@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white d-flex">
                        <div class="">
                        Posted By : {{ $thread->user->name }} ( {{ $thread->user->points }} <i class="fas fa-dollar-sign"></i> )
                        </div>
                        <div class="ml-auto">


                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!!  Markdown::convertToHtml($thread->content)  !!}</p>
                        <br>
                                @if($bestanswer)
                                <div class="card text-white bg-info mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span style="text-decoration-line: underline">Best Answer By :</span> {{ $bestanswer->user->name }}
                                            ( {{ $bestanswer->user->points }} <i class="fas fa-dollar-sign"></i> )
                                        </h5>

                                        <h5 class="card-title">{{ $bestanswer->title }}</h5>
                                        <p class="card-text">
                                            {{ $bestanswer->content }}
                                        </p>
                                    </div>
                                </div>
                                @endif
                    </div>
                    <div class="card-footer text-muted">
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>

                <br>

        @foreach($thread->replies as $reply)
            <div class="card shadow-lg">
            <div class="card-header bg-secondary text-white ">
               <div class="d-flex">
                   <div class="">
                       {{ $reply->user->name }} ( {{ $reply->user->points }} <i class="fas fa-dollar-sign"></i> )
                   </div>
                   <div class="ml-auto" style="display: inline-flex">
                       @if(Auth::id() == $reply->user_id)
                           {{-- that mean if replay is not the best answer show the edit button --}}
                           {{-- b darija ida had reply maxi best answer show the edit button --}}
                       @if(!$reply->best_answer)

                               <a href="{{ route('edit_reply',$reply) }}"><i class="far fa-edit text-white"></i></a>&nbsp;

                               <a href="{{ route('edit_reply',$reply) }}"><i class="fas fa-trash"></i></a> &nbsp;

                           @endif
                       @endif
                   @auth
                       @if(Auth::id() == $thread->user->id)
                       {{-- that mean if not a best answer yet show the button --}}
                       @if(!$bestanswer)
                       <form action="{{ route('make_best_answer',$reply->id) }}" method="post">
                           @csrf
                           <button type="submit" class="btn btn-info btn-sm">mark as best answer</button>
                       </form>

                       @endif
                       @endif
                       @endauth

                   </div>
               </div>
            </div>
            <div class="card-body">
                <p>{!! Markdown::convertToHtml($reply->content) !!}</p>
            </div>
            <div class="card-footer text-muted">
                {{ $reply->created_at->diffForHumans() }}
            </div>
            </div>
            <br>
        @endforeach
@auth
                <div class="bg-white pt-4 pb-4 pl-3 pr-3 shadow-lg">
                    @include('inc.errors')
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
@endauth
@guest
<div class="bg-white pt-4 pb-4 pl-3 pr-3 shadow-lg">
    <h5 class="text-center">please <a href="{{ route('login')}}">login</a> or <a href="{{route('register')}}">register</a>to leave a reply</h5>
</div>
@endguest
            </div>

            <div class="col-md-4">
                <div class="shadow-lg">
                    @include('inc.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
