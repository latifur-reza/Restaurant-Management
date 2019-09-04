@extends('layout.master')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h3 class="text-center">Food Category</h3>
          <ul class="list-group text-center" style="list-style: none">
            <li class="list-group-item list-group-item-success text-center">
              <button class="btn btn-info" style="width: 100%" data-toggle="modal" data-target="#cat1">This Is a large Category in Here</button>
            </li>
            <li class="list-group-item list-group-item-success text-center">
              <button class="btn btn-info" style="width: 100%">Category 2</button>
            </li>
            <li class="list-group-item list-group-item-success text-center">
              <button class="btn btn-info" style="width: 100%">Category 3</button>
            </li>



            <!-- Modal -->
            <div class="modal fade" id="cat1" tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="catTitle">Category title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <ul class="list-group text-center" style="list-style: none">
                          <li class="list-group-item list-group-item-success text-center">
                            <span class="servs"><label><input type="checkbox" value="code1"><span>Name 1</span></label></span>
                          </li>
                          <li class="list-group-item list-group-item-success text-center">
                            <span class="servs"><label><input type="checkbox" value="code2"><span>Name 2</span></label></span>
                          </li>
                          <li class="list-group-item list-group-item-success text-center">
                            <span class="servs"><label><input type="checkbox" value="code3"><span>Name 3</span></label></span>
                          </li>
                      </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </ul>
        </div>

        <div class="col-md-2 col-sm-2">

        </div>
        <div class="col-md-4 col-sm-4">
          <ol class="list-group text-center" style="list-style: none">
            <h3 class="text-center">Receipt Area</h3>
            <li class="list-group-item list-group-item-success">
              Item Name 1
              <div class="row">
                <div class="col-sm-2">
                  <button class="btn btn-success" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-plus"></i></button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-minus"></i></button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-times"></i></button>
                </div>
                <div class="col-sm-6">
                  <button class="btn btn-light" style="padding: .375rem .75rem"><span>100x200=40000</span></button>
                </div>
              </div>
            </li>
            <li class="list-group-item list-group-item-success">
              Item Name 2
              <div class="row">
                <div class="col-sm-2">
                  <button class="btn btn-success" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-plus"></i></button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-minus"></i></button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-danger" style="padding: .375rem .75rem"><i style="margin: 0px" class="fa fa-times"></i></button>
                </div>
                <div class="col-sm-6">
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
