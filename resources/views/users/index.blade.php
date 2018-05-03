
@extends('layouts.app')

@section('content')
    <div class="container shadow-lg rounded mb-5 bg-white mt-2 pt-4 pb-5 pl-2 pr-2">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">email</th>
                            <th scope="col">Role</th>
                            <th scope="col">action</th>
                            <th scope="col">Delete</th>

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
                                    <a href="{{ route('make_subsc',$user->id) }}" class="badge badge-dark">make subscriber</a>
                                @else
                                    <a href="{{ route('make_admin',$user->id) }}" class="badge badge-primary">make admin</a>
                                @endif

                            </td>

                            <td>
                                <a href="#" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
@endsection





