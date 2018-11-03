@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="card">
                    <div class="card-body">

                        <div class="row d-flex" style="justify-content: space-evenly">


                            <div class="col-sm-12 col-lg-4 col-md-3 shadow-lg text-center bg-success pt-5 pb-5 text-white mb-3 ">
                                <h4>Asignaturas : </h4>
                                <h1>{{ App\Channel::all()->count() }}</h1>
                            </div>

                            <div class="col-sm-12 col-lg-4 ml-1 col-md-3 shadow-lg text-center bg-warning pt-5 pb-5 mb-3">
                                <h4>Temas : </h4>
                                <h1>{{ App\Thread::all()->count() }}</h1>
                            </div>

                            @if(Auth::user()->role)

                            <div class="col-sm-12 col-lg-4 col-md-3 shadow-lg text-center bg-info pt-5 pb-5 text-white  mb-3 ">
                                <h4>Usuarios : </h4>
                                <h1>{{ App\User::all()->count() }}</h1>
                            </div>

                            <div class="col-sm-12 col-lg-4 ml-1 col-md-3 shadow-lg text-center bg-danger pt-5 pb-5 text-white mb-3 ">
                                <h4>Likes : </h4>
                                <h1>{{ App\Reply::all()->count() }}</h1>
                            </div>
@endif
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
