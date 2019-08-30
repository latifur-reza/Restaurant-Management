@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createfixedcostsexpenses.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Expense Now</b> </h5>
          </div>
          <div class="form-group">
            <label for="reason" class="text-center"> <b>Reason : </b><span style="color: red">*</span> </label>
            <input type="text" class="form-control" placeholder="{{$fixedcosts->reason}}" value="{{$fixedcosts->reason}}" name="reason" required readonly>
          </div>
          <div class="form-group">
            <label for="amount" class="text-center"> <b>Amount : </b><span style="color: red">*</span> </label>
            <input type="number" class="form-control" placeholder="{{$fixedcosts->amount}}" value="{{$fixedcosts->amount}}" name="amount" required readonly>
          </div>
          <div class="form-group">
            <label for="doneby" class="text-center"> <b>Done By : </b></label>
            <input type="text" class="form-control" placeholder="Example: Mr. xxxx" name="doneby" autofocus>
          </div>
          <div class="form-group">
            <label for="ext" class="text-center"> <b>Ext. : </b></label>
            <input type="text" class="form-control" placeholder="Example: xxxx" name="ext">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createfixedcostsexpenses">Expense NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
