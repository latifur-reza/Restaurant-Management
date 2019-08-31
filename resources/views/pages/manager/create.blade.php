@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createmanager.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Manager</b> </h5>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Name : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="Example:Mr. xxxx" name="name" value="{{ old('name') }}" autofocus required>
          </div>
          <div class="form-group">
            <label for="email" class="text-center"> <b>Email : </b><span style="color: red">*</span> </label>
            <input type="email" class="form-control" placeholder="Example: mail@email.com" name="email" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label for="password"="text-center"> <b>Password : </b><span style="color: red">*</span> </label>
            <input type="password" class="form-control" placeholder="*********" name="password" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createmanager">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
