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
                             <label for="inputEmail4">Name</label>
                             <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name" {{ old('name') }}>
                         </div>
                         <div class="form-group col-md-6">
                             <label for="inputPassword4">Email</label>
                             <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Email" {{ old('email') }}>
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="form-group col-md-6">
                             <label for="inputEmail4">New Password</label>
                             <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="password">
                         </div>
                         <div class="form-group col-md-6">
                             <label for="inputPassword4">Confirm password</label>
                             <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="confirm your password">
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="form-group col-md-4">
                             <label for="avatar">Avatar</label>
                             <div class="custom-file">
                                 <input type="file" name="avatar" class="custom-file-input" id="validatedCustomFile" {{ old('avatar') }}>
                                 <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                 <div class="invalid-feedback">Example invalid custom file feedback</div>
                             </div>
                         </div>
                         <div class="form-group col-md-8">
                             <label for="inputState">Role</label>
                             <select id="inputState" class="form-control" name="role" {{ old('role') }}>
                                 <option selected>Choose...</option>
                                 <option value="1">Admin</option>
                                 <option  value="0">Subscriber</option>
                             </select>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputAddress">Description</label>
                         <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Tell us about your self ... " {{ old('description') }}></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Register</button>
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


