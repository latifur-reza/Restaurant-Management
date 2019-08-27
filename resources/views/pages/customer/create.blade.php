@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createcustomer.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Customer</b> </h5>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Name : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="Example: Mr. Customer" name="name" autofocus required>
          </div>
          <div class="form-group">
            <label for="email" class="text-center"> <b>Email :</b> </label>
            <input type="email" class="form-control" placeholder="Example: mail@gmail.com" name="email">
          </div>
          <div class="form-group">
            <label for="phone" class="text-center"> <b>Phone :</b> </label>
            <input type="text" class="form-control" placeholder="Example: 01xxxxxxxxx" name="phone">
          </div>
          <div class="form-group">
            <label for="barcode" class="text-center"> <b>Barcode :</b> </label>
            <input type="text" class="form-control" placeholder="Example: Dhaka" name="barcode">
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createcustomer">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
