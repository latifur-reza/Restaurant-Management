@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Reservation List</h1>
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
              <a href="{{ route('editreservation',$item->invoiceno) }}"><button type="button" value="edit" class="btn btn-info"><i class="fa fa-edit"></i></button></a>
              <a href="#confirm{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="confirm" class="btn btn-success"><i class="fa fa-check"></i></button></a>
              <a href="#cancel{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="cancel" class="btn btn-warning"><i class="fa fa-remove"></i></button></a>
              <a href="#delete{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="delete" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

              <!-- Confirm Modal -->
              <div class="modal fade" id="confirm{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirm Reservation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: green">
                      {{$item->orderno}} no reservation is Confirmed. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('reservationconfirm',$item->invoiceno) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-success">Confirm</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>

              <!-- Cancel Modal -->
              <div class="modal fade" id="cancel{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cancel Reservation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: red">
                      {{$item->orderno}} no reservation will be Canceled. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('reservationcancel',$item->invoiceno) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancel Reservation</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>

              <!-- Delete Modal -->
              <div class="modal fade" id="delete{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Reservation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: red">
                      {{$item->orderno}} no reservation will be Deleted. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('reservationdelete',$item->invoiceno) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
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

  @if (Session::has('invoicenonow'))
      @php
          $invonow = Session::get('invoicenonow');
      @endphp

      <script type="text/javascript">
          var invonow = @php echo json_encode($invonow);@endphp;
          if (invonow != "") {
              var url = "reservedinvoice/"+invonow;
              window.open(url);
          }
      </script>
  @endif

  @if (Session::has('invoicenonowserved'))
      @php
          $invonow = Session::get('invoicenonowserved');
      @endphp

      <script type="text/javascript">
          var invonow = @php echo json_encode($invonow);@endphp;
          if (invonow != "") {
              var url = "reserveservedinvoice/"+invonow;
              window.open(url);
          }
      </script>
  @endif

@endsection
