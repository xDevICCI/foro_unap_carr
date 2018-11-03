@extends('layouts.app')

@section('content')
<h3>Resultado de la búsqueda: {{$search}}</h3>
@if (isset($message))
<div class='bg-warning' style='padding: 20px'>
    {{$message}}
</div>
@endif
<hr />
@if (isset($comments))
<?php
        $modal = 0;
        foreach($comments as $comment):
            $user = App\User::select()->where('id', '=', $comment->id_user)->first();
        ?>
        <div class="row">
            <div class="col-md-1">
                <img src='{{url($user->perfiles)}}' class='img-responsive' style='max-width: 60px' />
                <strong>{{$user->name}}</strong>
            </div>
            <div class='col-md-6'>
               {{$comment->comment}}
               <br />
               <i>Fecha: {{$comment->date}} · Hora: {{$comment->time}}</i>


               @if(isset(Auth::user()->id))
               @if($comment->id_user == Auth::user()->id)
               <hr />
                <!-- Botón que abre la ventana modal eliminar -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteComment{{$modal}}">
                  Eliminar
                </button>

                <!-- Ventana modal para eliminar -->
                <div class="modal fade" id="deleteComment{{$modal}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">¿Realmente quieres eliminar este comentario?</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="{{url('user/deletecomment')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id_comment" value="{{$comment->id}}" />
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Botón para abrir la ventana modal de editar -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editComment{{$modal}}">
                  Editar
                </button>

                <!-- Ventana modal editar -->
                <div class="modal fade" id="editComment{{$modal}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar comentario</h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <textarea name="comment" rows="10" class="form-control">{{$comment->comment}}</textarea>
                            </div>
                            <input type="hidden" name="id_comment" value="{{$comment->id}}" />
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $modal++ ?>
               @endif
               @endif
            </div>
        </div>
        <hr />
        <?php endforeach ?>
@endif
@stop
