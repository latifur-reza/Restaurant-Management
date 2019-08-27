@extends('layout.master')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('staffedit.update',$staff->id) }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <h5 class="text-center"><b>Update Staff</b> </h5>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Name : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="{{$staff->name}}" name="name" value="{{$staff->name}}" required>
          </div>
          <div class="form-group">
            <label for="email" class="text-center"> <b>Email :</b> </label>
            <input type="email" class="form-control" placeholder="{{$staff->email}}" value="{{$staff->email}}" name="email">
          </div>
          <div class="form-group">
            <label for="phone" class="text-center"> <b>Phone :</b> </label>
            <input type="text" class="form-control" placeholder="{{$staff->phone}}" value="{{$staff->phone}}" name="phone">
          </div>
          <div class="form-group">
            <label for="address" class="text-center"> <b>Address :</b> </label>
            <input type="text" class="form-control" placeholder="{{$staff->address}}" value="{{$staff->address}}" name="address">
          </div>
          <div class="form-group">
            <label for="salary" class="text-center"> <b>Salary :</b> </label>
            <input type="number" class="form-control" placeholder="{{$staff->salary}}" value="{{$staff->salary}}" name="salary">
          </div>
          <div class="form-group">
            <label for="joiningdate" class="text-center"> <b>Joining Date :</b> </label>
            <input type="date" class="form-control" value="{{$staff->joiningdate}}" name="joiningdate">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="updatestaff">UPDATE NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
