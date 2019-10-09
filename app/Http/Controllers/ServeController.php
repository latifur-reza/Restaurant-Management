<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Staff;
use App\Models\ServedCustomer;
use App\Models\ServedMenu;
use App\Models\ServedDetails;
use Illuminate\Http\Request;

class ServeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = ServedCustomer::orderBy('created_at','desc')->where('status','In Kitchen')->get();
        $orderitems = ServedMenu::join('served_customers', 'served_menus.invoiceno', '=', 'served_customers.invoiceno')->where('served_customers.status','In Kitchen')->get();
        return view('pages.serve.inkitchen')->with('orders',$orders)->with('orderitems',$orderitems);
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
        return view('pages.serve.serve')->with('category',$category)->with('menu',$menu)->with('customer',$customer)->with('allcustomer',$allcustomer)->with('waiters',$waiters);
    }

    public function createcus($id)
    {
        $customer = Customer::where('id',$id)->get();
        $allcustomer = Customer::where('status',"Active")->get();
        $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
        $waiters = Staff::orderBy('name','asc')->where('status','Active')->where('type','Waiter')->get();
        $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Active')->get(['id','categoryname','food','price','discountcash','discountpercent','status']);
        return view('pages.serve.serve')->with('category',$category)->with('menu',$menu)->with('customer',$customer)->with('allcustomer',$allcustomer)->with('waiters',$waiters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $today = ServedCustomer::where('created_at','like','%'.date("Y-m-d").'%')->count();

        $servedCustomer = new ServedCustomer;
        $servedDetails = new ServedDetails;

        $orderno = $today+1;
        $invoiceno = Auth::user()->id.date("YmdHis");

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
        if ($request->paymentchecktype == "Pay Last") {
            $servedCustomer->status = "Served";
        }else {
            $servedCustomer->status = "In Kitchen";
        }
        $servedCustomer->paymentstatus = "Paid";
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
        $servedDetails->transactionno = $request->transactionno;
        if (is_null($servedDetails->transactionno)) {
          $servedDetails->transactionno = 0;
        }

        $servedDetails->save();

        foreach ($request->menucode as $key => $value) {
            $servedMenu = new ServedMenu;

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

            $servedMenu->save();
        }

        if ($request->paymentchecktype == "Pay Last") {
            session()->flash('success','Items are served to customer!!');
            session()->flash('invoicenonow',$invoiceno);
            return back();
        }else {
            session()->flash('success','Items are added to kitchen!!');
            session()->flash('invoicenonow',$invoiceno);
            return redirect()->route('inkitchen');
        }

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
     * Serve the customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function served(Request $request, $id)
     {
       $cus = ServedCustomer::find($id);
       $cus->status = "Served";
       $cus->updatedby = Auth::user()->id;

       $cus->save();
       session()->flash('success','Served successfully!!');
       return redirect()->route('inkitchen');
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
