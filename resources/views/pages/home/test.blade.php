@extends('layout.master')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h3 class="text-center">Food Category</h3>
          <ul class="list-group text-center" style="list-style: none">
              @foreach ($category as $cat)
                  <li class="list-group-item list-group-item-success text-center">
                    <button class="btn btn-info" style="width: 100%" data-toggle="modal" data-target="#{{$cat->categoryname}}">{{$cat->categoryname}}</button>
                  </li>

                  <!-- Modal -->
                  <div class="modal fade" id="{{$cat->categoryname}}" tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="catTitle">{{$cat->categoryname}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group text-center" style="list-style: none">
                                @foreach ($menu as $item)
                                    @if ($cat->categoryname == $item->categoryname)
                                        <li class="list-group-item list-group-item-success text-center">
                                          <span class="servs"><label><input type="checkbox" class="checkmenu" value="{{$item->id}}"><span>{{$item->food}}({{$item->price}})</span></label></span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                        </div>
                      </div>
                    </div>
                  </div>
              @endforeach

          </ul>
        </div>

        <div class="col-md-2 col-sm-2">

        </div>
        <div class="col-md-4 col-sm-4">
          <ol class="list-group text-center" style="list-style: none">
            <h3 class="text-center">Receipt Area</h3>
            <div class="" id="show">

            </div>
            <li class="list-group-item list-group-item-success">
              Grand Total
              <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-6">
                  <button class="btn btn-light" style="padding: .375rem .75rem"><span id="grandtotal">0</span></button>
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


    <script type="text/javascript">
        var menuCodeArray = [];
        var itemall = {!! json_encode($menu->toArray()) !!};

        for (var k = 0; k < itemall.length; k++) {
            itemall[k].quantity = 1;
        }
        $(".checkmenu").change(function(){
            var code;
            var index;
            code = $(this).val();
            if ($(this).prop("checked") == true) {
                menuCodeArray.push(code);
            }else {
                removeItem(code);
            }
            makeList(menuCodeArray);
        });
    </script>

    <script type="text/javascript">
    function removeItem(x){
        index = menuCodeArray.indexOf(x);
        if (index >= 0) {
            menuCodeArray.splice(index,1);
            $('.checkmenu:checked').each(function(){
                var currentValue = $(this).val();
                if (currentValue == x) {
                    $(this).prop("checked", false);
                }
            });
        }
        makeList(menuCodeArray);
    }
    </script>

    <script type="text/javascript">
    function incrementQuantity(x){
        for (var z = 0; z < itemall.length; z++) {
            if (x == itemall[z].id) {
                itemall[z].quantity ++;
            }
        }
        makeList(menuCodeArray);
    }
    </script>

    <script type="text/javascript">
    function decrementQuantity(x){
        for (var z = 0; z < itemall.length; z++) {
            if (x == itemall[z].id) {
                if (itemall[z].quantity > 1) {
                    itemall[z].quantity --;
                }
            }
        }
        makeList(menuCodeArray);
    }
    </script>

    <script type="text/javascript">
        function makeList(menuCodeArray){
            var items = "";
            var food = "No name";
            var price = 0;
            var quantity = 0;
            var total = 0;
            var grandTotal = 0;
            for (var i = 0; i < menuCodeArray.length; i++) {
                for (var j = 0; j < itemall.length; j++) {
                    if (itemall[j].id == menuCodeArray[i]) {
                        food = itemall[j].food;
                        price = itemall[j].price;
                        quantity = itemall[j].quantity;
                        total = price * quantity;
                        grandTotal += total;
                    }
                }
                items += '<li class="list-group-item list-group-item-success">\
                  '+food+'\
                  <div class="row">\
                    <div class="col-sm-2">\
                      <button class="btn btn-success" style="padding: .375rem .75rem" onClick="incrementQuantity(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-plus"></i></button>\
                    </div>\
                    <div class="col-sm-2">\
                      <button class="btn btn-danger" style="padding: .375rem .75rem" onClick="decrementQuantity(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-minus"></i></button>\
                    </div>\
                    <div class="col-sm-2">\
                      <button class="btn btn-danger" style="padding: .375rem .75rem" onClick="removeItem(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-times"></i></button>\
                    </div>\
                    <div class="col-sm-6">\
                      <button class="btn btn-light" style="padding: .375rem .75rem"><span>'+quantity+'x'+price+'='+total+'</span></button>\
                    </div>\
                  </div>\
                </li>'
            }

            document.getElementById("show").innerHTML = items;
            document.getElementById("grandtotal").innerHTML = grandTotal;
        }
    </script>

@endsection
