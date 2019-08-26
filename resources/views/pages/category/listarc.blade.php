@extends('layout.master')
@section('content')
  @include('partials.messages')
  <div class="container-fluid ">
    <h1 class="text-center" style="color: black">Category List Archive</h1>
  </div>
  <div class="container-fluid table-responsive">
    <table class="table" id="mydatatable1">
      <thead>
        <tr>
          <th>Sl No.</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @foreach ($category as $item)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$item->categoryname}}</td>
            <td>
              <a href="{{ route('categoryedit',$item->id) }}"><button type="button" value="edit" class="btn btn-info"><i class="fa fa-edit"></i></button></a>
              <a href="#active{{$item->id}}" data-toggle="modal"><button type="button" value="active" class="btn btn-warning"><i class="fa fa-check"></i></button></a>
              <a href="#delete{{$item->id}}" data-toggle="modal"><button type="button" value="delete" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

              <!-- Permanent Delete Modal -->
              <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: red">
                      {{$item->categoryname}} will be Deleted Premanently. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('categorydestroy',$item->id) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Permanently</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>

              <!-- Active Modal -->
              <div class="modal fade" id="active{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Active Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: green">
                      {{$item->categoryname}} will be Shown in list. Are you sure?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form class="" action="{!! route('categoryactive',$item->id) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-success">Active</button>
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
