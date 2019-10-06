@php
    $name = "Restaurant";
    $address = "Dhaka";
    $contact = "01XXX-YYYZZZ";
    $vatreg = "";
    $instructions = "";
    $logo = "default.jpg";
@endphp
@foreach ($settings as $item)
    @if ($item->reason == "Name")
        @php
            $name = $item->value;
        @endphp

        @elseif ($item->reason == "Address")
            @php
                $address = $item->value;
            @endphp
        @elseif ($item->reason == "Contact")
            @php
                $contact = $item->value;
            @endphp
        @elseif ($item->reason == "Vatreg")
            @php
                $vatreg = $item->value;
            @endphp
        @elseif ($item->reason == "Instructions")
            @php
                $instructions = $item->value;
            @endphp
        @elseif ($item->reason == "Logo")
            @php
                $logo = $item->value;
            @endphp
    @endif

@endforeach

@php
    $invoiceno = "";
    $customerid = "";
    $customername = "";
    $email = "";
    $phone = "";
    $barcode = "";
    $noofguest = 0;
    $tableno = 0;
    $paymentstatus = "";
    $created_at = "";
@endphp
@foreach ($customer as $c)
    @php
        $invoiceno = $c->invoiceno;
        $customerid = $c->customerid;
        $customername = $c->name;
        $email = $c->email;
        $phone = $c->phone;
        $barcode = $c->barcode;
        $noofguest = $c->noofguest;
        $tableno = $c->tableno;
        $paymentstatus = $c->paymentstatus;
        $created_at = $c->created_at;

    @endphp
@endforeach

@php
    $orderno = 0;
    $waiter = "";
    $total = 0;
    $discountpercent = 0;
    $discountcash = 0;
    $vat = 0;
    $servicecharge = 0;
    $grandtotal = 0;
    $receivedcash = 0;
    $change = 0;
    $paytype = "";
    $tansactionno = "";
@endphp
@foreach ($details as $d)
    @php
        $orderno = $d->orderno;
        $waiter = $d->waiter;
        $total = $d->total;
        $discountpercent = $d->discountpercent;
        if (is_null($discountpercent)) {
            $discountpercent = 0;
        }
        $discountcash = $d->discountcash;
        if (is_null($discountcash)) {
            $discountcash = 0;
        }
        $vat = $d->vat;
        if (is_null($vat)) {
            $vat = 0;
        }
        $servicecharge = $d->servicecharge;
        if (is_null($servicecharge)) {
            $servicecharge = 0;
        }
        $grandtotal = $d->grandtotal;
        $receivedcash = $d->receivedcash;
        $change = $d->change;
        $paytype = $d->paytype;
        $tansactionno = $d->tansactionno;
    @endphp
@endforeach

@php
    $discountpercentamount = ($total*$discountpercent)/100;
    $totalafterdiscount = $total - $discountcash;
    $totalafterdiscount = $totalafterdiscount - ($totalafterdiscount*$discountpercent)/100;
    $vatamount = ($totalafterdiscount*$vat)/100;
    $servicechargeamount = ($totalafterdiscount*$servicecharge)/100;
@endphp
<style media="screen">
@page {
    /*size: 80mm 100mm;*/
    margin: 1mm 2mm;
    text-align: center;
}
</style>

<center><img src="{!! public_path('images/logos/'.$logo) !!}" alt="Lg" style="width: 100px; height: 100px"></center>
<h2 style="margin: 0px;">{{$name}}</h2>
{{$address}} <br>
{{$contact}} <br>
@php
    if ($vatreg != "") {
        echo "VAT REG : ".$vatreg;
    }
@endphp
<h3 style="margin: 0px;border-bottom: 1px dotted black">Invoice</h3>
<b>Order No : {{$orderno}}</b><br>
<div style="text-align: left">
    Invoice No : {{$invoiceno}}<br>
    Customer : {{$customername}}<br>
    Guests : {{$noofguest}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Table No : {{$tableno}}<br>
    Waiter : {{$waiter}}<br>
    Order Time : {{$created_at}}<br>
</div>

<h4 style="margin: 0px;">Order Information</h4>
<table style="width: 100%;text-align: center">
    <thead style="border-top: 1px dotted black">
        <tr>
            <th style="width: 5px;">Sl</th>
            <th style="width: 150px;">Item</th>
            <th style="width: 2px;">Qty</th>
            <th style="width: 3px;">Rate</th>
            <th style="width: 6px;font-size: 11">Amount</th>
        </tr>
    </thead>
    <tbody style="border-bottom: 1px dotted black">
        @php
            $count = 1;
        @endphp
        @foreach ($menu as $m)
            <tr>
                <td style="width: 5px;">{{$count++}}</td>
                <td style="width: 150px;text-align: left">
                    {{$m->food}}
                    @php
                        if ($m->discountcash>0) {
                            echo "(".$m->discountcash."/- Discount)";
                        }else if($m->discountpercent>0){
                            echo "(".$m->discountpercent."% Discount)";
                        }
                    @endphp
                </td>
                <td style="width: 2px;">{{$m->quantity}}</td>
                <td style="width: 3px;">{{$m->price}}</td>
                <td style="width: 6px;">{{$m->itemtotal}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="text-align: right">Total : </td>
            <td>
                {{$total}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Discount(cash) : </td>
            <td>
                {{$discountcash}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Discount({{$discountpercent}}%) : </td>
            <td>
                {{$discountpercentamount}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Gross Total : </td>
            <td style="border-top: 1px dotted black">
                {{$totalafterdiscount}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Service Charge({{$servicecharge}}%) : </td>
            <td>
                {{$servicechargeamount}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">VAT({{$vat}}%) : </td>
            <td>
                {{$vatamount}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Grand Total : </td>
            <td style="border-top: 1px dotted black">
                {{$grandtotal}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right">Received Cash : </td>
            <td>
                {{$receivedcash}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right"><span style="float: left">Pay type: {{$paytype}}</span>Change : </td>
            <td>
                {{$change}}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Transaction No : {{$tansactionno}} </td>
        </tr>
    </tfoot>
</table>
<br>
<small>{{$instructions}}</small>
<br>
<small>Thank you for being with us</small>
@php
    $now = date("d-m-Y H:i:s");
@endphp
<br>
<small>Printed at {{$now}}</small>
