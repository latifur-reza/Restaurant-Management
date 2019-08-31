@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Manager List</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
        <tr>
          <th>Sl No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Permission</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @foreach ($manager as $item)
            @if (Auth::user()->email != $item->email)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->permission}}</td>
                  <td>
                    <a href="#admin{{$item->id}}" data-toggle="modal"><button type="button" value="admin" class="btn btn-success">Admin</button></a>
                    <a href="#manager{{$item->id}}" data-toggle="modal"><button type="button" value="manager" class="btn btn-primary">Manager</button></a>
                    <a href="#deny{{$item->id}}" data-toggle="modal"><button type="button" value="deny" class="btn btn-warning">Deny</button></a>
                    <a href="#delete{{$item->id}}" data-toggle="modal"><button type="button" value="delete" class="btn btn-danger"><i class="fa fa-remove"></i></button></a>

                    <!-- Modal Admin -->
                    <div class="modal fade" id="admin{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Make Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color: red">
                            {{$item->name}} will have Admin permission. Are you sure?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class="" action="{!! route('makeadmin',$item->id) !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-success">Make Admin</button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="manager{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Make Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color: red">
                            {{$item->name}} will have Manager permission. Are you sure?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class="" action="{!! route('makemanager',$item->id) !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-primary">Make Manager</button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deny{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deny User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color: red">
                            {{$item->name}}, permission will be denied. Are you sure?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class="" action="{!! route('makenone',$item->id) !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-warning">Deny Permission</button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color: red">
                            {{$item->name}} will be Deleted. Are you sure?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class="" action="{!! route('managerdelete',$item->id) !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
            @endif

        @endforeach
      </tbody>
    </table>

  </div>
@endsection
