
        @extends('layouts.app')

        @section('content')
        <div class="container ">
        <div class="row justify-content-center">
        <div class="col-md-8 mb-2  pt-4 pb-5 pl-2 pr-2 bg-white shadow-lg">
        <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
        <th scope="col">title</th>
        <th scope="col">channel</th>
                <th scope="col">edit</th>
                <th scope="col">view</th>
                <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach(App\Thread::paginate(5) as $thread)
        <tr>
        <td>{{ $thread->title }}</td>

        <td>{{ $thread->channel->title }}</td>
        
                <td> 
                                @if(Auth::id() == $thread->user_id || Auth::user()->role)

                        <a href="{{ route('edit_thread',$thread->id) }}" class="btn btn-outline-success btn-sm">edit</a>
                        @endif

                </td>
                <td> <a href="{{ route('show_thread_id',$thread->slug) }}" class="btn btn-outline-primary btn-sm">show</a></td>
        <td>
    @if(Auth::id() == $thread->user_id || Auth::user()->role)
        <form action="{{ route('delete_thread',$thread->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit"
                onclick="return confirm('Are you sure you want to delete ? ');" class="btn btn-outline-danger btn-sm">
            <i class="fas fa-minus-circle"></i>
            trash
        </button>
        </form>
   @endif

        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
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





