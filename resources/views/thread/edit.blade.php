@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <div class="shadow-lg bg-white pt-3 pb-3 ">

                    <div class="col-md-12">
                        @include('inc.errors')
                        {{ Form::open(['route'=>['update_thread',$thread->id],'method'=>'post']) }}
                        @csrf
                        @method('put')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group"><input value="{{ $thread->title }}" type="text" class="form-control" placeholder="title" name="title"></div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="channel_id" id="channelid" class="form-control">
                                        @foreach(App\Channel::all() as $channel)

                                            <option value="{{ $channel->id }}"
                                            @if($channel->id == $thread->channel->id)
                                                selected
                                                    @endif
                                            >{{ $channel->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea name="content"  class="form-control" id="" cols="30" rows="10">{{ $thread->content }}</textarea>
                            </div>
                            <button class="btn btn-outline-info mt-3 ml-3" type="submit">update</button>
                        </div>
                        {{ Form::close() }}
                    </div>



                </div>
            </div>
            <div class="col-md-4 shadow-lg">
                @include('inc.sidebar')
            </div>
        </div>
    </div>
@endsection
