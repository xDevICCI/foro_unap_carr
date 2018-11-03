@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-lg-8 bg-white pt-4 pb-4 shadow-lg">
                 @include('inc.errors')

                 <form action="{{ route('store_new_user') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('patch')
                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="inputEmail4">Nombre</label>
                             <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Ingrese Nombre" {{ old('name') }}>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="inputPassword4">Email</label>
                             <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="ejemplo@hotmail.com" {{ old('email') }}>
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="inputEmail4">Nueva Contraseña</label>
                             <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Contraseña">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="inputPassword4">Re-Ingrese Contraseña</label>
                             <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Re-ingrese contraseña">
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="form-group col-md-8">
                             <label for="inputState">Rol</label>
                             <select id="inputState" class="form-control" name="role" {{ old('role') }}>
                                 <option selected>Elige...</option>
                                 <option value="1">Administrador</option>
                                 <option  value="0">Estudiante</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputAddress">Descripción</label>
                         <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Información ... " {{ old('description') }}></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Registrar</button>
                 </form>
             </div>
            <div class="col-lg-4">
                <div class="shadow-lg">
                @include('inc.sidebar')
            </div>
            </div>
        </div>
    </div>
@endsection
