<?php

namespace App\Http\Controllers;

use DB;
use App\Models\ServedCustomer;
use App\Models\ServedMenu;
use App\Models\ServedDetails;
use App\Models\ReservedCustomer;
use App\Models\ReservedMenu;
use App\Models\ReservedDetails;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Date("Y-m-d");
        $year = Date("Y");
        $month = Date("F");
        $currentmonth = Date("Y-m");
        $previousmonth = Date('Y-m', strtotime($month . " last month"));
        $prevyearcurrentmonth = $year-1 . "-" . date("m");
        $prevyearpervmonth = Date('Y-m', strtotime($prevyearcurrentmonth . " last month"));

        $soldtodayamount = DB::table('served_details')->select('paytype', DB::raw('sum(grandtotal) as total'))->where('created_at','like',$date.'%')->groupBy('paytype')->get();
        $soldthismonthamount = DB::table('served_details')->select('paytype', DB::raw('sum(grandtotal) as total'))->where('created_at','like',$currentmonth.'%')->groupBy('paytype')->get();

        //$soldtodayitems = DB::table('served_menus')->select('food', DB::raw('sum(quantity) as total'))->where('created_at','like',$date.'%')->groupBy('food')->orderBy('total', 'desc')->get();
        $soldthismonthitems = DB::table('served_menus')->select('food', DB::raw('sum(quantity) as total'))->where('created_at','like',$currentmonth.'%')->groupBy('food')->orderBy('total', 'desc')->get();

        $soldtodayitems = DB::table('served_menus')->select('menucode','categoryname','food', DB::raw('sum(quantity) as total'))->groupBy('menucode')->orderBy('total', 'desc')->get();
        return view('pages.home.dashboard')->with('soldtodayamount',$soldtodayamount)->with('soldthismonthamount',$soldthismonthamount)->with('soldtodayitems',$soldtodayitems)->with('soldthismonthitems',$soldthismonthitems);
    }

    public function refresh(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = DB::table('served_menus')->select('menucode','categoryname','food', DB::raw('sum(quantity) as total'))->groupBy('menucode')->orderBy('total', 'desc')->where('created_at','>',$start)->where('created_at','<',$end)->get();
        return response()->json([
            'jsdata' => $data,
        ]);
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
