@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="card">
                    <div class="card-body">

                        <div class="row">


                            <div class="col-sm-3 shadow-lg text-center bg-success pt-5 pb-5 text-white ml-5 mb-3 mr-1">
                                <h4>Channels : </h4>
                                <h1>{{ App\Channel::all()->count() }}</h1>
                            </div>

                            <div class="col-sm-3 shadow-lg text-center bg-warning pt-5 pb-5  ml-5 mb-3 mr-1">
                                <h4>Threads : </h4>
                                <h1>{{ App\Thread::all()->count() }}</h1>
                            </div>


                            <div class="col-sm-3 shadow-lg text-center bg-info pt-5 pb-5 text-white ml-5 mb-3 mr-1">
                                <h4>Users : </h4>
                                <h1>{{ App\User::all()->count() }}</h1>
                            </div>

                            <div class="col-sm-3 shadow-lg text-center bg-danger pt-5 pb-5 text-white ml-5 mb-3 mr-1">
                                <h4>Replies : </h4>
                                <h1>{{ App\Reply::all()->count() }}</h1>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
@endsection
