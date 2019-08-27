@extends('layout.master')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('barcodeedit.update',$barcode->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>Update Barcode</b></h5>
          </div>
          <div class="form-group">
            <label for="code" class="text-center"> <b>Barcode : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="{{$barcode->code}}" value="{{$barcode->code}}" name="code" autofocus required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="updatebarcode">UPDATE NOW</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
