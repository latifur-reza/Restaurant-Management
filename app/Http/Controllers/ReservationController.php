<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Staff;
use App\Models\ReservedCustomer;
use App\Models\ReservedMenu;
use App\Models\ReservedDetails;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = ReservedCustomer::orderBy('created_at','desc')->where('status','Reserved')->orwhere('status','Confirm')->get();
        return view('pages.reservation.list')->with('reservations',$reservations);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexarc()
    {
        $reservations = ReservedCustomer::orderBy('created_at','desc')->where('status','Cancel')->orwhere('status','Deleted')->get();
        return view('pages.reservation.listarc')->with('reservations',$reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 0;
        $customer = Customer::where('id',$id)->get();
        $allcustomer = Customer::where('status',"Active")->get();
        $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
        $waiters = Staff::orderBy('name','asc')->where('status','Active')->where('type','Waiter')->get();
        $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Active')->get(['id','categoryname','food','price','discountcash','discountpercent','status']);
        return view('pages.reservation.create')->with('category',$category)->with('menu',$menu)->with('customer',$customer)->with('allcustomer',$allcustomer)->with('waiters',$waiters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = ReservedCustomer::where('created_at','like','%'.date("Y-m-d").'%')->count();
        ++$today;
        $servedCustomer = new ReservedCustomer;
        $servedDetails = new ReservedDetails;

        $orderno = 'R-'.$today;
        $invoiceno = 'R-'.Auth::user()->id.date("YmdHis");

        $servedCustomer->orderno = $orderno;
        $servedCustomer->invoiceno = $invoiceno;
        $servedCustomer->customerid = $request->id;
        $servedCustomer->name = $request->name;
        $servedCustomer->phone = $request->phone;
        $servedCustomer->email = $request->email;
        $servedCustomer->barcode = $request->barcode;
        $servedCustomer->noofguest = $request->noofguest;
        if (is_null($servedCustomer->noofguest)) {
          $servedCustomer->noofguest = 0;
        }
        $servedCustomer->tableno = $request->tableno;
        if (is_null($servedCustomer->tableno)) {
          $servedCustomer->tableno = 0;
        }
        $servedCustomer->status = "Reserved";
        $servedCustomer->reserved_at = $request->reserved_at;
        $servedCustomer->createdby = Auth::user()->id;
        $servedCustomer->updatedby = Auth::user()->id;

        $servedCustomer->save();

        $servedDetails->orderno = $orderno;
        $servedDetails->invoiceno = $invoiceno;
        $servedDetails->waiter = $request->waiter;
        $servedDetails->total = $request->total;
        $servedDetails->discounttotalpercent = $request->discounttotalpercent;
        if (is_null($servedDetails->discounttotalpercent)) {
          $servedDetails->discounttotalpercent = 0;
        }
        $servedDetails->discounttotalcash = $request->discounttotalcash;
        if (is_null($servedDetails->discounttotalcash)) {
          $servedDetails->discounttotalcash = 0;
        }
        $servedDetails->vat = $request->vat;
        $servedDetails->servicecharge = $request->servicecharge;
        $servedDetails->grandtotal = $request->grandtotal;
        $servedDetails->receivedcash = $request->receivedcash;
        if (is_null($servedDetails->receivedcash)) {
          $servedDetails->receivedcash = 0;
        }
        $servedDetails->change = $request->change;
        $servedDetails->paytype = $request->paytype;
        $servedDetails->transactionno = $request->transactionno;
        if (is_null($servedDetails->transactionno)) {
          $servedDetails->transactionno = 0;
        }
        $servedDetails->status = "Reserved";

        $servedDetails->save();

        if (is_null($request->menucode)) {

        }else {
            foreach ($request->menucode as $key => $value) {
                $servedMenu = new ReservedMenu;

                $servedMenu->orderno = $orderno;
                $servedMenu->invoiceno = $invoiceno;
                $servedMenu->menucode = $request->menucode[$key];
                $servedMenu->categoryname = $request->categoryname[$key];
                $servedMenu->food = $request->food[$key];
                $servedMenu->originalprice = $request->originalprice[$key];
                $servedMenu->price = $request->price[$key];
                $servedMenu->quantity = $request->quantity[$key];
                $servedMenu->discountpercent = $request->discountpercent[$key];
                $servedMenu->discountcash = $request->discountcash[$key];
                $servedMenu->itemtotal = $request->itemtotal[$key];
                $servedMenu->status = "Reserved";

                $servedMenu->save();
            }
        }

        session()->flash('success','Reserved successfully!!');
        session()->flash('invoicenonow',$invoiceno);
        return redirect()->route('reservationlist');

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
     public function edit($invoiceno)
     {
         $id = 0;
         $customer = Customer::where('id',$id)->get();
         $allcustomer = Customer::where('status',"Active")->get();
         $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
         $waiters = Staff::orderBy('name','asc')->where('status','Active')->where('type','Waiter')->get();
         $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Active')->get(['id','categoryname','food','price','discountcash','discountpercent','status']);

         $customerone = ReservedCustomer::where('invoiceno',$invoiceno)->get();
         $detailone = ReservedDetails::where('invoiceno',$invoiceno)->get();
         $menus = ReservedMenu::orderBy('menucode','asc')->where('invoiceno',$invoiceno)->get();
         return view('pages.reservation.edit')->with('customerone',$customerone)->with('detailone',$detailone)->with('orderedmenus',$menus)->with('category',$category)->with('menu',$menu)->with('customer',$customer)->with('allcustomer',$allcustomer)->with('waiters',$waiters);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        ReservedCustomer::where('invoiceno','=',$request->invoiceno)->update(['status' => 'Served reserve']);
        ReservedDetails::where('invoiceno','=',$request->invoiceno)->update(['status' => 'Served reserve']);
        ReservedMenu::where('invoiceno','=',$request->invoiceno)->update(['status' => 'Served reserve']);

        $servedCustomer = new ReservedCustomer;
        $servedDetails = new ReservedDetails;

        $orderno = $request->orderno;
        $invoiceno = $request->invoiceno;

        $servedCustomer->orderno = $orderno;
        $servedCustomer->invoiceno = $invoiceno;
        $servedCustomer->customerid = $request->id;
        $servedCustomer->name = $request->name;
        $servedCustomer->phone = $request->phone;
        $servedCustomer->email = $request->email;
        $servedCustomer->barcode = $request->barcode;
        $servedCustomer->noofguest = $request->noofguest;
        if (is_null($servedCustomer->noofguest)) {
          $servedCustomer->noofguest = 0;
        }
        $servedCustomer->tableno = $request->tableno;
        if (is_null($servedCustomer->tableno)) {
          $servedCustomer->tableno = 0;
        }
        $servedCustomer->status = "Served";
        $servedCustomer->reserved_at = date("Y-m-d H:i:s", strtotime($request->reserved_at));
        $servedCustomer->createdby = Auth::user()->id;
        $servedCustomer->updatedby = Auth::user()->id;

        $servedCustomer->save();

        $servedDetails->orderno = $orderno;
        $servedDetails->invoiceno = $invoiceno;
        $servedDetails->waiter = $request->waiter;
        $servedDetails->total = $request->total;
        $servedDetails->discounttotalpercent = $request->discounttotalpercent;
        if (is_null($servedDetails->discounttotalpercent)) {
          $servedDetails->discounttotalpercent = 0;
        }
        $servedDetails->discounttotalcash = $request->discounttotalcash;
        if (is_null($servedDetails->discounttotalcash)) {
          $servedDetails->discounttotalcash = 0;
        }
        $servedDetails->vat = $request->vat;
        $servedDetails->servicecharge = $request->servicecharge;
        $servedDetails->grandtotal = $request->grandtotal;
        $servedDetails->receivedcash = $request->receivedcash;
        if (is_null($servedDetails->receivedcash)) {
          $servedDetails->receivedcash = 0;
        }
        $servedDetails->change = $request->change;
        $servedDetails->paytype = $request->paytype;
        $servedDetails->transactionno = $request->transactionno;
        if (is_null($servedDetails->transactionno)) {
          $servedDetails->transactionno = 0;
        }
        $servedDetails->status = "Served";

        $servedDetails->save();

        if (is_null($request->menucode)) {

        }else {
            foreach ($request->menucode as $key => $value) {
                $servedMenu = new ReservedMenu;

                $servedMenu->orderno = $orderno;
                $servedMenu->invoiceno = $invoiceno;
                $servedMenu->menucode = $request->menucode[$key];
                $servedMenu->categoryname = $request->categoryname[$key];
                $servedMenu->food = $request->food[$key];
                $servedMenu->originalprice = $request->originalprice[$key];
                $servedMenu->price = $request->price[$key];
                $servedMenu->quantity = $request->quantity[$key];
                $servedMenu->discountpercent = $request->discountpercent[$key];
                $servedMenu->discountcash = $request->discountcash[$key];
                $servedMenu->itemtotal = $request->itemtotal[$key];
                $servedMenu->status = "Served";

                $servedMenu->save();
            }
        }

        session()->flash('success','Reserved served successfully!!');
        session()->flash('invoicenonowserved',$invoiceno);
        return redirect()->route('reservationlist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$invoiceno)
    {
        ReservedCustomer::where('invoiceno','=',$invoiceno)->delete();
        ReservedDetails::where('invoiceno','=',$invoiceno)->delete();
        ReservedMenu::where('invoiceno','=',$invoiceno)->delete();

        session()->flash('success','Reservation has destroyed successfully!!');
        return back();
    }

    /**
     * confirm the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request,$invoiceno)
    {
        ReservedCustomer::where('invoiceno','=',$invoiceno)->update(['status' => 'Confirm']);
        ReservedDetails::where('invoiceno','=',$invoiceno)->update(['status' => 'Confirm']);
        ReservedMenu::where('invoiceno','=',$invoiceno)->update(['status' => 'Confirm']);

        session()->flash('success','Reservation Confirmed Successfully!!');
        return back();
    }

    /**
     * cancel the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request,$invoiceno)
    {
        ReservedCustomer::where('invoiceno','=',$invoiceno)->update(['status' => 'Cancel']);
        ReservedDetails::where('invoiceno','=',$invoiceno)->update(['status' => 'Cancel']);
        ReservedMenu::where('invoiceno','=',$invoiceno)->update(['status' => 'Cancel']);

        session()->flash('success','Reservation Canceled Successfully!!');
        return back();
    }

    /**
     * delete the specified reservation temporaryly.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$invoiceno)
    {
        ReservedCustomer::where('invoiceno','=',$invoiceno)->update(['status' => 'Deleted']);
        ReservedDetails::where('invoiceno','=',$invoiceno)->update(['status' => 'Deleted']);
        ReservedMenu::where('invoiceno','=',$invoiceno)->update(['status' => 'Deleted']);

        session()->flash('success','Reservation Deleted Successfully!!');
        return back();
    }

    /**
     * active the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request,$invoiceno)
    {
        ReservedCustomer::where('invoiceno','=',$invoiceno)->update(['status' => 'Reserved']);
        ReservedDetails::where('invoiceno','=',$invoiceno)->update(['status' => 'Reserved']);
        ReservedMenu::where('invoiceno','=',$invoiceno)->update(['status' => 'Reserved']);

        session()->flash('success','Reservation Active Successfully!!');
        return back();
    }
}
