@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('appsettings.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>APP Settings</b> </h5>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Restaurant Name : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="Example: My Pizza" name="name" value="{{old('name')}}" required>
          </div>
          <div class="form-group">
            <label for="address" class="text-center"> <b>Restaurant Address : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="Example: Dhaka" name="address" value="{{old('address')}}" required>
          </div>
          <div class="form-group">
            <label for="file" class="text-center"> <b>Restaurant Logo : </b></label>
            <input type="file" class="form-control" name="logo">
          </div>
          <div class="form-group">
            <label for="contact" class="text-center"> <b>Contact Number : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="Example: 01xxxxxxxxx" name="contact" value="{{old('contact')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Payment Pattern : </b><span style="color: red">*</span></label>
            <select class="form-control" name="paymentpattern">
              <option value="Pay First">Pay First</option>
              <option value="Pay Last">Pay Last</option>
            </select>
          </div>
          <div class="form-group">
            <label for="servicecharge" class="text-center"> <b>Service Charge(%) : </b></label>
            <input type="text" class="form-control" placeholder="Example: 5" name="servicecharge" value="{{old('servicecharge')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
          </div>
          <div class="form-group">
            <label for="vat" class="text-center"> <b>VAT(%) : </b></label>
            <input type="text" class="form-control" placeholder="Example: 5" name="vat" value="{{old('vat')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
          </div>
          <div class="form-group">
            <label for="vatreg" class="text-center"> <b>VAT Reg. No. : </b></label>
            <input type="text" class="form-control" placeholder="Example: xxxxx" name="vatreg" value="{{old('vatreg')}}">
          </div>
          <div class="form-group">
            <label for="instructions" class="text-center"> <b>Receipt Instructions : </b></label>
            <input type="text" class="form-control" placeholder="Example: Thank You" name="instructions" value="{{old('instructions')}}">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="setup">SAVE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
