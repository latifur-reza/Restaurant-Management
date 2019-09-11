@extends('layout.master')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4 mb-3">
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
        <div class="col-md-8 col-sm-8">
            <form class="form-group" action="{!! route('servicestore') !!}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ol class="list-group text-center" style="list-style: none">
                          <h3 class="text-center">Receipt</h3>
                          <div id="show">

                          </div>

                        </ol>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <ol class="list-group text-center" style="list-style: none">
                          <h3 class="text-center">Calculation</h3>
                          <li class="list-group-item list-group-item-success">
                            <div class="row">
                                <div class="col-sm-6">
                                    Table No : <input type="text" class="form-control" name="tableno" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>
                                <div class="col-sm-6" id="total">
                                    Total : <input type="text" class="form-control" name="total" value="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                  Discount(%) : <input type="text" class="form-control" name="discounttotalpercent" onkeyup="calculateDiscount()" id="percentDiscountId" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                              </div>
                              <div class="col-sm-6">
                                  Discount($) : <input type="text" class="form-control" name="discounttotalcash" onkeyup="calculateDiscount()" id="cashDiscountId" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                              </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    VAT(%) : <input type="text" class="form-control" name="vat" value="0" readonly>
                                </div>
                                <div class="col-sm-6">
                                    Service Charge(%) : <input type="text" class="form-control" name="servicecharge" value="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6" id="grandtotal">
                                    Grand Total : <input type="text" class="form-control" name="grandtotal" value="0" readonly>
                                </div>
                            </div>
                          </li>

                          <li class="list-group-item list-group-item-success">
                            <div class="row">
                                <div class="col-sm-6">
                                    Pay Type :
                                    <select class="form-control" name="paytype">
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card</option>
                                        <option value="bCash">bCash</option>
                                        <option value="Rocket">Rocket</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    Cash Received : <input type="text" class="form-control btn-success" name="receivedcash" placeholder="0" onkeyup="calculateChange()" id="receivedCash" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                                </div>

                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                  Transaction No : <input type="text" class="form-control" name="transactionno" value="" />
                              </div>
                              <div class="col-sm-6" id="changeAmount">
                                  Change : <input type="text" class="form-control" name="change" value="0" readonly>

                              </div>

                            </div>
                            @foreach ($customer as $c)
                                <input type="hidden" name="id" value="{{$c->id}}">
                                <input type="hidden" name="name" value="{{$c->name}}">
                                <input type="hidden" name="email" value="{{$c->email}}">
                                <input type="hidden" name="phone" value="{{$c->phone}}">
                                <input type="hidden" name="barcode" value="{{$c->barcode}}">
                            @endforeach
                          </li>

                        </ol>
                        <br>
                        <div class="text-center" id="submitbtn">

                        </div>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>


    <script type="text/javascript">
        var finalTotal = 0;
        var payable = 0;
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
            var discountPercent = 0;
            var discountCash = 0;
            var offer = "";
            var total = 0;
            var grandTotal = 0;
            for (var i = 0; i < menuCodeArray.length; i++) {
                for (var j = 0; j < itemall.length; j++) {
                    if (itemall[j].id == menuCodeArray[i]) {
                        code = itemall[j].id;
                        categoryname = itemall[j].categoryname;
                        food = itemall[j].food;
                        originalprice = itemall[j].price;
                        price = itemall[j].price;
                        quantity = itemall[j].quantity;
                        discountCash = itemall[j].discountcash;
                        discountPercent = itemall[j].discountpercent;
                        price = price - discountCash;
                        price = price - (discountPercent * price)/100;
                        total = price * quantity;
                        grandTotal += total;
                    }
                }
                if (discountPercent>0) {
                    offer = '<div style="color: red">('+discountPercent+'% Discount)</div>';
                }
                else if (discountCash>0) {
                    offer = '<div style="color: red">('+discountCash+' Taka Discount)</div>';
                }else {
                    offer = "";
                }
                items += '<li class="list-group-item list-group-item-success">\
                  '+food+'\
                  '+offer+'\
                  <div class="row">\
                    <div class="col-sm-12">\
                      <button class="btn btn-success pull-left" style="padding: .375rem .75rem;margin: 0px 2px" onClick="incrementQuantity(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-plus"></i></button>\
                      <button class="btn btn-primary pull-left" style="padding: .375rem .75rem;margin: 0px 2px" onClick="decrementQuantity(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-minus"></i></button>\
                      <button class="btn btn-danger pull-left" style="padding: .375rem .75rem;margin: 0px 2px" onClick="removeItem(\''+menuCodeArray[i]+'\')"><i style="margin: 0px" class="fa fa-times"></i></button>\
                      <input type="text" class="form-control pull-right" style="max-width: 120px; font-weight: bold; height: 28px; text-align: center" name="calc[]" value="'+quantity+'x'+price+'='+total+'" readonly>\
                      <input type="hidden" name="menucode[]" value="'+code+'">\
                      <input type="hidden" name="categoryname[]" value="'+categoryname+'">\
                      <input type="hidden" name="food[]" value="'+food+'">\
                      <input type="hidden" name="originalprice[]" value="'+originalprice+'">\
                      <input type="hidden" name="price[]" value="'+price+'">\
                      <input type="hidden" name="quantity[]" value="'+quantity+'">\
                      <input type="hidden" name="discountcash[]" value="'+discountCash+'">\
                      <input type="hidden" name="discountpercent[]" value="'+discountPercent+'">\
                      <input type="hidden" name="itemtotal[]" value="'+total+'">\
                    </div>\
                  </div>\
                </li>';
            }
            finalTotal = grandTotal;
            document.getElementById("show").innerHTML = items;
            var totalBox;
            totalBox = 'Total : <input type="text" class="form-control" name="total" value="'+grandTotal+'" readonly>';
            document.getElementById("total").innerHTML = totalBox;
            var btn;
            if (menuCodeArray.length > 0) {
                btn = '<input type="submit" class="btn btn-success" name="confirm" value="Confirm">';
            }else {
                btn = "";
            }
            document.getElementById("submitbtn").innerHTML = btn;
            calculateDiscount();
        }
    </script>

    <script type="text/javascript">
        function calculateDiscount(){
            var disCash = document.getElementById("cashDiscountId").value;
            if (disCash == "") {
                disCash = 0;
            }
            var disPer = document.getElementById("percentDiscountId").value;
            if (disPer == "") {
                disPer = 0;
            }
            var vat = 0;
            var servicecharge = 0;
            var final;
            final = finalTotal - disCash;
            final = final - (final*disPer)/100;
            final = final + (final*vat)/100 + (final*servicecharge)/100;
            var grandTotalBox;
            grandTotalBox = 'Grand Total : <input type="text" class="form-control" name="grandtotal" value="'+final+'" readonly>';
            document.getElementById("grandtotal").innerHTML = grandTotalBox;
            payable = final;
            calculateChange();
        }
    </script>

    <script type="text/javascript">
        function calculateChange(){
            var receivedCash = document.getElementById("receivedCash").value;
            if (receivedCash == "") {
                receivedCash = 0;
            }
            var changeAmount;
            changeAmount = 0;
            if (receivedCash > 0) {
                changeAmount = payable - receivedCash;
            }
            var changeBox;
            changeBox = 'Change : <input type="text" class="form-control" name="change" value="'+changeAmount+'" readonly>';
            document.getElementById("changeAmount").innerHTML = changeBox;

        }
    </script>

@endsection
