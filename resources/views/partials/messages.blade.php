@if ($errors->all())
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul>
      @foreach ($errors->all() as $item)
        <p>
          {{$item}}
        </p>
      @endforeach
    </ul>
  </div>
@endif

@if (Session::has('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>{{Session::get('success')}}</p>
  </div>
@endif
