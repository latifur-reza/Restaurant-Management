@extends('layout.master')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <h5 class="text-center">Restaurant Name</h5>
          <!-- Restaurnet Logo -->

          <div class="text-center">

            <img class="img-fluid" src="./dist/img/res_logo.png" alt="" height="100" width="100">
          </div>
          <ul class="list-group text-center">
            <li class="list-group-item list-group-item-success text-center">Item 1
              <button class="btn btn-info pull-right">Select</button>
            </li>
          </ul>
        </div>

        <div class="col-md-5">
          <h5 class="text-center">Sub Item with Price(Removable)</h5>
          <div style="overflow-y: scroll; height:500px;">
            <ul class="list-group text-center">
              <li class="list-group-item list-group-item-success text-center">sub item 1 <b>(Price 200)</b>
                <button class="btn btn-info pull-right">ADD</button>


              </li>
              <li class="list-group-item list-group-item-success">sub item 2</li>
              <li class="list-group-item list-group-item-success">sub item 3</li>
              <li class="list-group-item list-group-item-success">sub item 4</li>

              <li class="list-group-item list-group-item-success">sub item 5</li>
              <li class="list-group-item list-group-item-success">sub item 1

                <b>(Price 200)</b>
              </li>
              <li class="list-group-item list-group-item-success">sub item 2</li>
              <li class="list-group-item list-group-item-success">sub item 3</li>
              <li class="list-group-item list-group-item-success">sub item 4</li>

              <li class="list-group-item list-group-item-success">sub item 5</li>

            </ul>
          </div>
        </div>

        <div class="col-md-4">
          <h5 class="text-center">Receipt Area</h5>
          <ol class="list-group text-center">
            <li class="list-group-item list-group-item-success">
              Item Name

              <div class="row">
                <div class="col-md-2">
                  <button class="btn btn-success" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-minus"></i></button>

                </div>
                <div class="col-md-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-times"></i></button>

                </div>
                <div class="col-md-6">
                  <button class="btn btn-light" style="padding: .375rem .75rem"><span>100x200=40000</span></button>
                </div>

              </div>
            </li>
          </ol>
          <br>
          <div class="text-center">
            <button class="btn btn-success">Confirm</button>
          </div>


        </div>
      </div>
    </div>
@endsection
