@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Reservation List Archive</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
          <tr>
            <th>Sl No.</th>
            <th>Order No</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Guests</th>
            <th>Table No</th>
            <th>Reserved Time</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @foreach ($reservations as $item)
          <tr>
              <td>{{$count++}}</td>
              <td>{{$item->orderno}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->phone}}</td>
              <td>{{$item->noofguest}}</td>
              <td>{{$item->tableno}}</td>
              <td>{{$item->reserved_at}}</td>
              <td>{{$item->status}}</td>
              <td>{{$item->created_at}}</td>
              <td>
                <a href="#active{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="confirm" class="btn btn-success"><i class="fa fa-check"></i></button></a>
                <a href="#delete{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="delete" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

                <!-- Active Modal -->
                <div class="modal fade" id="active{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Active Reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="color: green">
                        {{$item->orderno}} no reservation will Active. Are you sure?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form class="" action="{!! route('reservationactive',$item->invoiceno) !!}" method="post" enctype="multipart/form-data">
                          @csrf
                          <button type="submit" class="btn btn-success">Active</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- Destroy Modal -->
                <div class="modal fade" id="delete{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Destroy Reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="color: red">
                        {{$item->orderno}} no reservation will be Destroyed. Are you sure?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form class="" action="{!! route('reservationdestroy',$item->invoiceno) !!}" method="post" enctype="multipart/form-data">
                          @csrf
                          <button type="submit" class="btn btn-danger">Destroy</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
@endsection
