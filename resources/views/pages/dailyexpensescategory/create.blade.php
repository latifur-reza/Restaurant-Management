@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createdailyexpensescategory.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Category</b> </h5>
          </div>
          <div class="form-group">
            <label for="categoryname" class="text-center"> <b>Category Name : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="Example:Refreshment" name="categoryname" autofocus required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createcategory">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
