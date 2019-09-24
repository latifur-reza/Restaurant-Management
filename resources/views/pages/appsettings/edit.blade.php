@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form_custom">
        <form action="{{ route('appsettings.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5 class="text-center"><b>APP Settings</b> </h5>
          </div>
          @foreach ($settings as $item)
              @if ($item->reason == "Name")
                  @php
                      $name = $item->value;
                  @endphp

                  @elseif ($item->reason == "Address")
                      @php
                          $address = $item->value;
                      @endphp
                  @elseif ($item->reason == "Contact")
                      @php
                          $contact = $item->value;
                      @endphp
                  @elseif ($item->reason == "Payment")
                      @php
                          $payment = $item->value;
                      @endphp
                  @elseif ($item->reason == "Charge")
                      @php
                          $charge = $item->value;
                      @endphp
                  @elseif ($item->reason == "Vat")
                      @php
                          $vat = $item->value;
                      @endphp
                  @elseif ($item->reason == "Vatreg")
                      @php
                          $vatreg = $item->value;
                      @endphp
                  @elseif ($item->reason == "Instructions")
                      @php
                          $instructions = $item->value;
                      @endphp
                  @elseif ($item->reason == "Logo")
                      @php
                          $logo = $item->value;
                      @endphp
              @endif

          @endforeach
          <div class="form-group">
            <label for="name" class="text-center"> <b>Restaurant Name : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="{{ $name }}" name="name" value="{{ $name }}" required>
            <input type="hidden" class="form-control" name="oldname" value="{{ $name }}">
          </div>
          <div class="form-group">
            <label for="address" class="text-center"> <b>Restaurant Address : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="{{$address}}" name="address" value="{{$address}}" required>
            <input type="hidden" class="form-control" name="oldaddress" value="{{$address}}">
          </div>
          <div class="form-group">
            <label for="file" class="text-center"> <b>Restaurant Logo : </b></label>
            <input type="file" class="form-control" name="logo">
          </div>
          <div class="form-group">
            <label for="contact" class="text-center"> <b>Contact Number : </b><span style="color: red">*</span></label>
            <input type="text" class="form-control" placeholder="{{$contact}}" name="contact" value="{{$contact}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
            <input type="hidden" class="form-control" name="oldcontact" value="{{$contact}}">
            <input type="hidden" class="form-control" name="oldpaymentpattern" value="{{$payment}}">
          </div>
          <div class="form-group">
            <label for="name" class="text-center"> <b>Payment Pattern : </b><span style="color: red">*</span></label>
            <select class="form-control" name="paymentpattern">
              <option value="Pay First" @if ($payment == "Pay First") selected @endif>Pay First</option>
              <option value="Pay Last" @if ($payment == "Pay Last") selected @endif>Pay Last</option>
            </select>
          </div>
          <div class="form-group">
            <label for="servicecharge" class="text-center"> <b>Service Charge(%) : </b></label>
            <input type="text" class="form-control" placeholder="{{$charge}}" name="servicecharge" value="{{$charge}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
            <input type="hidden" class="form-control" name="oldservicecharge" value="{{$charge}}" >
          </div>
          <div class="form-group">
            <label for="vat" class="text-center"> <b>VAT(%) : </b></label>
            <input type="text" class="form-control" placeholder="{{$vat}}" name="vat" value="{{$vat}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
            <input type="hidden" class="form-control" name="oldvat" value="{{$vat}}" >
          </div>
          <div class="form-group">
            <label for="vatreg" class="text-center"> <b>VAT Reg. No. : </b></label>
            <input type="text" class="form-control" placeholder="{{$vatreg}}" name="vatreg" value="{{$vatreg}}">
            <input type="hidden" class="form-control" name="oldvatreg" value="{{$vatreg}}">
          </div>
          <div class="form-group">
            <label for="instructions" class="text-center"> <b>Receipt Instructions : </b></label>
            <input type="text" class="form-control" placeholder="{{$instructions}}" name="instructions" value="{{$instructions}}">
            <input type="hidden" class="form-control" name="oldinstructions" value="{{$instructions}}">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="setup">SAVE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
