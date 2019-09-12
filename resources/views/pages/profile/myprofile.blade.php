@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
          <form method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <h5 class="text-center"><b>Profile</b> </h5>
            </div>
            @foreach ($users as $u)
                <div class="form-group">
                  <label for="name" class="text-center"> <b>Name : </b><span style="color: red">*</span> </label>
                  <input type="text" class="form-control" placeholder="{{$u->name}}" name="name" value="{{$u->name}}" readonly required>
                </div>

                <div class="form-group">
                  <label for="email" class="text-center"> <b>Email : </b><span style="color: red">*</span> </label>
                  <input type="email" class="form-control" placeholder="{{$u->email}}" name="email" value="{{$u->email}}" readonly required>
                </div>

                <div class="text-center">
                    <a href="{!! route('editprofile') !!}"><button type="button" class="btn btn-primary">Edit Profile</button></a>
                    <a href="{!! route('changepassword') !!}"><button type="button" class="btn btn-warning">Change Password</button></a>

                </div>
            @endforeach

          </form>
          <br>
          <br>
          <div class="text-center">
              <a class="btn btn-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
          </div>
      </div>
    </div>
  </div>
@endsection
