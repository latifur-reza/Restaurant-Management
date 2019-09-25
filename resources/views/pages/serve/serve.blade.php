@extends('layout.master')
@section('content')
    @include('partials.messages')
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
                              <div class="" id="selectedcustomer">
                                  @php
                                      $printcustomer = "None";
                                  @endphp
                                  @foreach ($customer as $c)
                                      @php
                                          $printcustomer = $c->name;
                                      @endphp
                                      <input type="hidden" name="id" value="{{$c->id}}">
                                      <input type="hidden" name="name" value="{{$c->name}}">
                                      <input type="hidden" name="email" value="{{$c->email}}">
                                      <input type="hidden" name="phone" value="{{$c->phone}}">
                                      <input type="hidden" name="barcode" value="{{$c->barcode}}">
                                  @endforeach
                              </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    Waiter :
                                    <select class="form-control" name="waiter">
                                        <option value="None">None</option>
                                        @foreach ($waiters as $waiter)
                                            <option value="{{$waiter->name}}">{{$waiter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    Table No : <input type="text" class="form-control" name="tableno" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    No of Guests : <input type="text" class="form-control" name="noofguest" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                                </div>
                                <div class="col-sm-6" id="total">
                                    Sub Total : <input type="text" class="form-control" name="total" value="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                  Discount(%) : <input type="text" class="form-control" name="discounttotalpercent" onkeyup="calculateDiscount()" id="percentDiscountId" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                              </div>
                              <div class="col-sm-6">
                                  Discount($) : <input type="text" class="form-control" name="discounttotalcash" onkeyup="calculateDiscount()" id="cashDiscountId" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" />
                              </div>

                            </div>
                            <div class="row">
                                @php
                                    $vatC = 0;
                                    $serviceC = 0;
                                    $paymentC = "Pay First";
                                @endphp
                                @foreach ($settings as $setEx)
                                    @if ($setEx->reason == "Vat")
                                        @php
                                            $vatC = $setEx->value;
                                        @endphp
                                    @elseif ($setEx->reason == "Charge")
                                        @php
                                            $serviceC = $setEx->value;
                                        @endphp
                                    @elseif ($setEx->reason == "Payment")
                                        @php
                                            $paymentC = $setEx->value;
                                        @endphp
                                    @endif
                                @endforeach
                                <div class="col-sm-6">
                                    <input type="hidden" name="paymentchecktype" value="{{$paymentC}}">
                                    VAT(%) : <input type="text" class="form-control" name="vat" value="{{$vatC}}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    Service Charge(%) : <input type="text" class="form-control" name="servicecharge" value="{{$serviceC}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" id="customernameonly">
                                    Customer : <input type="text" style="cursor: pointer" class="form-control" name="customers" value="{{$printcustomer}}" data-toggle="modal" data-target="#customersall" readonly>
                                </div>
                                <div class="col-sm-6" id="grandtotal">
                                    Grand Total : <input type="text" class="form-control" name="grandtotal" value="0" readonly>
                                </div>
                            </div>
                          </li>

                          <!-- Modal -->
                          <div class="modal fade" id="customersall" tabindex="-1" role="dialog" aria-labelledby="catTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width: 1000px">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="catTitle">All Customers</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid table-responsive">
                                        <table class="table" id="mydatatable3">
                                          <thead>
                                            <tr>
                                              <th>Sl No.</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>Barcode</th>
                                              <th>Actions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @php
                                              $counting = 1;
                                            @endphp
                                            @foreach ($allcustomer as $onecustomer)
                                              <tr>
                                                <td>{{$counting++}}</td>
                                                <td>{{$onecustomer->name}}</td>
                                                <td>{{$onecustomer->email}}</td>
                                                <td>{{$onecustomer->phone}}</td>
                                                <td>{{$onecustomer->barcode}}</td>
                                                <td>
                                                  <button type="button" value="serve" class="btn btn-info" data-dismiss="modal" onClick="selCustomer({{$onecustomer->id}})">Serve</button>
                                                </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                                </div>
                              </div>
                            </div>
                          </div>

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
                                  Transaction No : <input type="text" class="form-control" name="transactionno" value="" autocomplete="off" />
                              </div>
                              <div class="col-sm-6" id="changeAmount">
                                  Change : <input type="text" class="form-control" name="change" value="0" readonly>

                              </div>

                            </div>
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
        var settings = {!! json_encode($settings->toArray()) !!};
        var allcustomer = {!! json_encode($allcustomer->toArray()) !!};

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
            for (var s = 0; s < settings.length; s++) {
                if (settings[s].reason == "Vat") {
                    vat = settings[s].value;
                }
                else if (settings[s].reason == "Charge") {
                    servicecharge = settings[s].value;
                }
            }
            var final;
            final = finalTotal - disCash;
            final = final - (final*disPer)/100;
            final = final + (final*vat)/100 + (final*servicecharge)/100;
            final = Math.round(final*1000)/1000;
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
            changeAmount = Math.round(changeAmount*1000)/1000
            var changeBox;
            changeBox = 'Change : <input type="text" class="form-control" name="change" value="'+changeAmount+'" readonly>';
            document.getElementById("changeAmount").innerHTML = changeBox;
            var btn;
            if (menuCodeArray.length > 0 && receivedCash>=payable) {
                btn = '<input type="submit" class="btn btn-success" name="confirm" value="Confirm">';
            }else {
                btn = "";
            }
            document.getElementById("submitbtn").innerHTML = btn;
        }
    </script>

    <script type="text/javascript">
        function selCustomer(cusId){
            var cusDet = "";
            var nameOnly = "";
            for (var i = 0; i < allcustomer.length; i++) {
                if (allcustomer[i].id == cusId) {
                    nameOnly = 'Customer : <input type="text" style="cursor: pointer" class="form-control" name="customers" value="'+allcustomer[i].name+'" data-toggle="modal" data-target="#customersall" readonly>';
                    cusDet += '<input type="hidden" name="id" value="'+allcustomer[i].id+'">\
                    <input type="hidden" name="name" value="'+allcustomer[i].name+'">\
                    <input type="hidden" name="email" value="'+allcustomer[i].email+'">\
                    <input type="hidden" name="phone" value="'+allcustomer[i].phone+'">\
                    <input type="hidden" name="barcode" value="'+allcustomer[i].barcode+'">'
                }
            }
            document.getElementById("selectedcustomer").innerHTML = cusDet;

            document.getElementById("customernameonly").innerHTML = nameOnly;
        }
    </script>

@endsection
