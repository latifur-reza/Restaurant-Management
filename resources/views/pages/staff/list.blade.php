@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Staff List</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
        <tr>
          <th>Sl No.</th>
          <th>Name</th>
          <th>Type</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Salary</th>
          <th>Joining</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @foreach ($staff as $item)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->salary}}</td>
            <td>{{$item->joiningdate}}</td>
            <td>
              <a href="{{ route('staffedit',$item->id) }}"><button type="button" value="edit" class="btn btn-info"><i class="fa fa-edit"></i></button></a>
              <a href="#delete{{$item->id}}" data-toggle="modal"><button type="button" value="delete" class="btn btn-danger"><i class="fa fa-remove"></i></button></a>

              <!-- Modal -->
              <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: red">
                      {{$item->name}} will be Deleted. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('staffdelete',$item->id) !!}" method="post" enctype="multipart/form-data">
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
@endsection
