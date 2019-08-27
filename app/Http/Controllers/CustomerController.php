<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $customer = Customer::orderBy('name','asc')->where('status','Active')->get();
         return view('pages.customer.list')->with('customer',$customer);
     }

     public function indexarc()
     {
         $customer = Customer::orderBy('name','asc')->where('status','Deleted')->get();
         return view('pages.customer.listarc')->with('customer',$customer);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:150',
        'phone' => 'nullable',
        'email' => 'nullable',
        'barcode' => 'nullable',

      ]);
      $customer = new Customer;

      $customer->barcode = $request->barcode;
      $customer->name = $request->name;
      $customer->phone = $request->phone;
      $customer->email = $request->email;
      $customer->status = "Active";
      $customer->createdby = "1";
      $customer->updatedby = "1";

      $customer->save();
      session()->flash('success','Customer has created successfully!!');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $customer = Customer::find($id);
      return view('pages.customer.edit')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:150',
        'phone' => 'nullable',
        'email' => 'nullable',
        'barcode' => 'nullable',

      ]);
      $customer = Customer::find($id);

      $customer->barcode = $request->barcode;
      $customer->name = $request->name;
      $customer->phone = $request->phone;
      $customer->email = $request->email;

      $customer->updatedby = "1";

      $customer->save();
      session()->flash('success','Customer has updated successfully!!');
      if ($customer->status == "Active") {
        return redirect()->route('customerlist');
      } else {
        return redirect()->route('customerarc');
      }
    }

    /**
     * Remove the specified resource from list temporaryly.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request, $id)
     {
       $customer = Customer::find($id);

       $customer->status = "Deleted";
       $customer->updatedby = "1";

       $customer->save();
       session()->flash('success','Customer has deleted successfully!!');
       return redirect()->route('customerlist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $customer = Customer::find($id);

        $customer->status = "Active";
        $customer->updatedby = "1";

        $customer->save();
        session()->flash('success','Customer has activated successfully!!');
        return redirect()->route('customerarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::find($id);
      if (!is_null($customer)) {
        $customer->delete();
      }
      session()->flash('success','Customer has destroyed successfully!!');
      return redirect()->route('customerarc');
    }
}
