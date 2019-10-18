@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Reservation Invoices List</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
        <tr>
          <th>Sl No.</th>
          <th>Invoice No</th>
          <th>Order No</th>
          <th>Customer Name</th>
          <th>Contact</th>
          <th>Guests</th>
          <th>Table No</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @foreach ($orders as $item)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$item->invoiceno}}</td>
            <td>{{$item->orderno}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->noofguest}}</td>
            <td>{{$item->tableno}}</td>
            <td>{{$item->created_at}}</td>
            <td>
              <a href="{{ route('reserveservedinvoice',$item->invoiceno) }}" target="_blank"><button type="button" value="edit" class="btn btn-info"><i class="fa fa-print"></i></button></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
@endsection
