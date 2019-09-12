@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
          <form action="{!! route('changepasswordstore') !!}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <h5 class="text-center"><b>Change Password</b> </h5>
            </div>
            <div class="form-group">
              <label for="password" class="text-center"> <b>Password : </b><span style="color: red">*</span> </label>
              <input type="password" class="form-control" placeholder="********" name="password" autofocus required>
            </div>

            <div class="form-group">
              <label for="password" class="text-center"> <b>Confirm Password : </b><span style="color: red">*</span> </label>
              <input type="password" class="form-control" placeholder="********" name="confirmation" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>

          </form>
      </div>
    </div>
  </div>
@endsection
