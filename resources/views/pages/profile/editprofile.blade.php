@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
          <form action="{!! route('editprofilenow') !!}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <h5 class="text-center"><b>Edit Profile</b> </h5>
            </div>
            @foreach ($users as $u)
                <div class="form-group">
                  <label for="name" class="text-center"> <b>Name : </b><span style="color: red">*</span> </label>
                  <input type="text" class="form-control" placeholder="{{$u->name}}" name="name" value="{{$u->name}}" autofocus required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            @endforeach


          </form>
      </div>
    </div>
  </div>
@endsection
