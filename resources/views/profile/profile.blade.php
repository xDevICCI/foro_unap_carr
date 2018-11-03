@extends('layouts.app')

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">
<div class="row justify-content-center">
<div class="col-md-8 mb-2 ">
<div class="card">
<div class="card-header">Mi Perfil</div>
<div class="card-body">
    @include('inc.errors')

<div class="row">
<div class="col-lg-4">
<img src="{{ $user->profile }}" class="ml-5 mt-2" alt="my image" width="100px" height="100px">
</div>
<div class="col-lg-8">
<p class="text-black-50">Nombre   : <span class="badge badge-info">{{ $user->name }}</span></p>
<p class="text-black-50">Tipo de Usuario   : <span class="badge badge-info">@if($user->role == false) Estudiante @else Admin @endif</span></p>
<p class="text-black-50">Likes : <span class="badge badge-info">{{ $user->points }} pt</span></p>
<p class="text-black-50">Email  : <span class="badge badge-info">{{ $user->email }}</span></p>
</div>
<div class="col-lg-12">
<p class="text-black-50">Información General :</p>
<p>
{{ $user->profile }}
</p>
</div>

<div class="col-lg-12">
<button class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</button>

    {{-- update profile --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="container">
    <h4 class="mt-2 mb-2"></h4>
    <form action="{{ route('update_my_profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <input type="text" name='name' class="form-control" value="{{ $user->name }}" >
                  </div>
              </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{ $user->profile }}</textarea>
                </div>

                <div class="custom-file mb-4">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="avatar" required>
                    <label class="custom-file-label" for="validatedCustomFile">imagen...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Contraseña Actual</label>
                            <input type="text" class="form-control" name="current_password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nueva Contraseña</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Re-ingrese nueva contraseña</label>
                                    <input type="text" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                    </div>



                <button class="btn btn-outline-primary mb-3" type="submit">Actualizar Información</button>

            </div>
         </div>
    </form>
</div>
</div>
</div>
</div>
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
