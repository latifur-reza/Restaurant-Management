@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createfixedcosts.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Costing</b> </h5>
          </div>
          <div class="form-group">
            <label for="reason" class="text-center"> <b>Reason : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="Example: Rent" name="reason" autofocus required>
          </div>
          <div class="form-group">
            <label for="amount" class="text-center"> <b>Amount : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="Example: 20000" name="amount" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createfixedcosts">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
