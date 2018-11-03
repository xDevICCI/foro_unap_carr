@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
               <div class="shadow-lg bg-white pt-3 pb-3 ">

                <div class="col-md-12">
                    @include('inc.errors')
                   {{ Form::open(['route'=>'store_thread','method'=>'post']) }}
                   @csrf
                  <div class="row">

                      <div class="col-md-6">
                        <div class="form-group"><input type="text" class="form-control" placeholder="Título" name="title"></div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="channel_id" id="channelid" class="form-control">
                                @foreach(App\Channel::all() as $channel)
                                <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                      <div class="col-md-12">
                          <textarea name="content"  class="form-control __editor" id="" cols="30" rows="10"></textarea>
                      </div>
                      <button class="btn btn-danger mt-3 ml-3" type="submit">Enviar</button>
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
