@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createdailyexpenses.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Daily Expense</b></h5>
          </div>

          <div class="form-group">
            <label for="categoryname" class="text-center"> <b>Category Name : </b><span style="color: red">*</span></label>
            <select class="form-control" name="categoryname" autofocus>
              @foreach ($dailyexpensescategory as $item)
                <option value="{{ $item->categoryname }}">{{ $item->categoryname }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="reason" class="text-center"><b>Reason : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="Example: Expense" name="reason" required>
          </div>
          <div class="form-group">
            <label for="quantity" class="text-center"> <b>Quantity : </b></label>
            <input type="number" class="form-control" placeholder="Example: 20" name="quantity">
          </div>
          <div class="form-group">
            <label for="amount" class="text-center"> <b>Amount : </b><span style="color: red">*</span></label>
            <input type="number" class="form-control" placeholder="Example: 2000" name="amount" required>
          </div>
          <div class="form-group">
            <label for="doneby" class="text-center"> <b>Done By :</b></label>
            <input type="text" class="form-control" placeholder="Example: Mr. xxxx" name="doneby">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createdailyexpenses">Expense Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
