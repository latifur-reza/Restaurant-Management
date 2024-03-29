@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createmenu.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Menu</b></h5>
          </div>

          <div class="form-group">
            <label for="categoryname" class="text-center"> <b>Category Name : </b><span style="color: red">*</span></label>
            <select class="form-control" name="categoryname" autofocus>
              @foreach ($category as $item)
                <option value="{{ $item->categoryname }}">{{ $item->categoryname }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="foodname" class="text-center"><b>Food Name : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="Example: BBQ Cheese Burger" name="food" required>
          </div>
          <div class="form-group">
            <label for="price" class="text-center"> <b>Price : </b><span style="color: red">*</span></label>
            <input type="number" class="form-control" placeholder="Example: 220" name="price" required>
          </div>
          <div class="form-group">
            <label for="discountcash" class="text-center"> <b>Discount <i>Percentage (%)</i> :</b> </label>
            <input type="number" class="form-control" placeholder="Example: 20%" name="discountpercent">
          </div>
          <div class="form-group">
            <label for="discountcash" class="text-center"> <b>Discount <i>Fixed</i> :</b> </label>
            <input type="number" class="form-control" placeholder="Example: 30" name="discountcash">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createmenu">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
