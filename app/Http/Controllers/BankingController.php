<?php

namespace App\Http\Controllers;

use App\Banking;
use Illuminate\Http\Request;

class BankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $banking = Banking::orderBy('created_at','desc')->where('status','Active')->get();
         return view('pages.banking.list')->with('banking',$banking);
     }

     public function indexarc()
     {
         $banking = Banking::orderBy('created_at','desc')->where('status','Deleted')->get();
         return view('pages.banking.listarc')->with('banking',$banking);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.banking.create');
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
        'transactiontype' => 'required|max:150',
        'amount' => 'required|numeric',
        'doneby' => 'nullable',
        'ext' => 'nullable',

      ]);
        $banking = new Banking;

        $banking->transactiontype = $request->transactiontype;
        $banking->amount = $request->amount;
        $banking->doneby = $request->doneby;
        $banking->ext = $request->ext;
        $banking->status = "Active";
        $banking->createdby = "1";
        $banking->updatedby = "1";

        $banking->save();
        session()->flash('success','Transaction has done successfully!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banking  $banking
     * @return \Illuminate\Http\Response
     */
    public function show(Banking $banking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banking  $banking
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {

     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banking  $banking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banking $banking)
    {
        //
    }

    /**
     * Remove the specified resource from list temporaryly.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request, $id)
     {
       $banking = Banking::find($id);

       $banking->status = "Deleted";
       $banking->updatedby = "1";

       $banking->save();
       session()->flash('success','Transaction has removed for admin approval!!');
       return redirect()->route('bankinglist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $banking = Banking::find($id);

        $banking->status = "Active";
        $banking->updatedby = "1";

        $banking->save();
        session()->flash('success','Transaction has activated successfully!!');
        return redirect()->route('bankingarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banking  $banking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $banking = Banking::find($id);
      if (!is_null($banking)) {
        $banking->delete();
      }
      session()->flash('success','Transaction has destroyed successfully!!');
      return redirect()->route('bankingarc');
    }
}
