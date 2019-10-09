@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Menu List</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
        <tr>
          <th>Sl No.</th>
          <th>Invoice No</th>
          <th>Order No</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $counter = 1;
        @endphp
        @foreach ($orders as $item)
          <tr>
            <td>{{$counter++}}</td>
            <td>{{$item->invoiceno}}</td>
            <td>{{$item->orderno}}</td>
            <td>
                <a href="#serve{{$item->invoiceno}}" data-toggle="modal"><button type="button" value="serve" class="btn btn-success">Serve</button></a>
                <!-- Modal -->
                <div class="modal fade" id="serve{{$item->invoiceno}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Served Menus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container-fluid table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                        <th>Sl No.</th>
                                        <th>Food</th>
                                        <th>Net Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $count = 1;
                                      @endphp
                                      @foreach ($orderitems as $key)
                                          @if ($key->invoiceno == $item->invoiceno)
                                              <tr>
                                                  <th>{{$count ++ }}</th>
                                                  <th>{{$key->food}}</th>
                                                  <th>{{$key->price}}</th>
                                                  <th>{{$key->quantity}}</th>
                                                  <th>{{$key->itemtotal}}</th>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form class="" action="{!! route('serveall',$item->id) !!}" method="post" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success">Serve Now</button>
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
              var url = "invoice/"+invonow;
              window.open(url);
          }
      </script>
  @endif
  
@endsection
