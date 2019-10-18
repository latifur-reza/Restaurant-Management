<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\ServedCustomer;
use App\Models\ServedMenu;
use App\Models\ServedDetails;
use App\Models\ReservedCustomer;
use App\Models\ReservedMenu;
use App\Models\ReservedDetails;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($invoiceno)
    {
        $servedCustomer = ServedCustomer::where('invoiceno',$invoiceno)->get();
        $servedDetails = ServedDetails::where('invoiceno',$invoiceno)->get();
        $servedMenu = ServedMenu::where('invoiceno',$invoiceno)->get();
        $data = ['customer' => $servedCustomer, 'details' => $servedDetails, 'menu' => $servedMenu];
        $adjust = $servedMenu->count() * 20;
        $height = 560 + $adjust;
        $customPaper = array(0,0,227,$height);
        $pdf = PDF::loadView('pdf.invoice',$data)->setPaper($customPaper);
        return $pdf->stream('invoice.pdf');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation($invoiceno)
    {
        $servedCustomer = ReservedCustomer::where('invoiceno',$invoiceno)->where('status','Reserved')->orWhere('status','Confirmed')->get();
        $servedDetails = ReservedDetails::where('invoiceno',$invoiceno)->where('status','Reserved')->orWhere('status','Confirmed')->get();
        $servedMenu = ReservedMenu::where('invoiceno',$invoiceno)->where('status','Reserved')->orWhere('status','Confirmed')->get();
        $data = ['customer' => $servedCustomer, 'details' => $servedDetails, 'menu' => $servedMenu];
        $adjust = $servedMenu->count() * 20;
        $height = 560 + $adjust;
        $customPaper = array(0,0,227,$height);
        $pdf = PDF::loadView('pdf.reservedinvoice',$data)->setPaper($customPaper);
        return $pdf->stream('reservedinvoice.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservationserved($invoiceno)
    {
        $servedCustomer = ReservedCustomer::where('invoiceno',$invoiceno)->where('status','Served')->get();
        $advance = ReservedDetails::where('invoiceno',$invoiceno)->where('status','Served reserve')->get();
        $servedDetails = ReservedDetails::where('invoiceno',$invoiceno)->where('status','Served')->get();
        $servedMenu = ReservedMenu::where('invoiceno',$invoiceno)->where('status','Served')->get();
        $data = ['customer' => $servedCustomer, 'advance' => $advance, 'details' => $servedDetails, 'menu' => $servedMenu];
        $adjust = $servedMenu->count() * 20;
        $height = 580 + $adjust;
        $customPaper = array(0,0,227,$height);
        $pdf = PDF::loadView('pdf.reserveservedinvoice',$data)->setPaper($customPaper);
        return $pdf->stream('reserveservedinvoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
