@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('createbanking.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Add New Transaction</b> </h5>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Transaction Type : </b><span style="color: red">*</span></label>
            <select class="form-control" name="transactiontype">
              <option value="Deposit">Deposit</option>
              <option value="Withdraw">Withdraw</option>
            </select>
          </div>
          <div class="form-group">
            <label for="amount" class="text-center"> <b>Amount : </b><span style="color: red">*</span></label>
            <input type="number" class="form-control" placeholder="Example: 5000" name="amount" required>
          </div>
          <div class="form-group">
            <label for="doneby" class="text-center"> <b>By :</b> </label>
            <input type="text" class="form-control" placeholder="Example: Mr. x" name="doneby">
          </div>
          <div class="form-group">
            <label for="ext" class="text-center"> <b>Ext. :</b> </label>
            <input type="text" class="form-control" placeholder="Example: etc" name="ext">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="createbanking">ADD NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
