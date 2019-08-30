<?php

namespace App\Http\Controllers;

use App\FixedCosts;
use Illuminate\Http\Request;

class FixedCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $fixedcosts = FixedCosts::orderBy('created_at','desc')->where('status','Active')->get();
         return view('pages.fixedcosts.list')->with('fixedcosts',$fixedcosts);
     }

     public function indexarc()
     {
         $fixedcosts = FixedCosts::orderBy('created_at','desc')->where('status','Deleted')->get();
         return view('pages.fixedcosts.listarc')->with('fixedcosts',$fixedcosts);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return view('pages.fixedcosts.create');
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
          'reason' => 'required',
          'amount' => 'required|numeric',

        ]);

        $fixedcosts = new FixedCosts;

        $fixedcosts->reason = $request->reason;
        $fixedcosts->amount = $request->amount;

        $fixedcosts->status = "Active";
        $fixedcosts->createdby = "1";
        $fixedcosts->updatedby = "1";

        $fixedcosts->save();
        session()->flash('success','Costing has added successfully!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FixedCosts  $fixedCosts
     * @return \Illuminate\Http\Response
     */
    public function show(FixedCosts $fixedCosts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FixedCosts  $fixedCosts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fixedcosts = FixedCosts::find($id);
        return view('pages.fixedcosts.edit')->with('fixedcosts',$fixedcosts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FixedCosts  $fixedCosts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'reason' => 'required',
          'amount' => 'required|numeric',

        ]);
        $fixedcosts = FixedCosts::find($id);

        $fixedcosts->reason = $request->reason;
        $fixedcosts->amount = $request->amount;

        $fixedcosts->updatedby = "1";

        $fixedcosts->save();
        session()->flash('success','Costing has updated successfully!!');
        if ($fixedcosts->status == "Active") {
          return redirect()->route('fixedcostslist');
        } else {
          return redirect()->route('fixedcostsarc');
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
         $fixedcosts = FixedCosts::find($id);

         $fixedcosts->status = "Deleted";
         $fixedcosts->updatedby = "1";

         $fixedcosts->save();
         session()->flash('success','Costing has deleted successfully!!');
         return redirect()->route('fixedcostslist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $fixedcosts = FixedCosts::find($id);

        $fixedcosts->status = "Active";
        $fixedcosts->updatedby = "1";

        $fixedcosts->save();
        session()->flash('success','Costing has activated successfully!!');
        return redirect()->route('fixedcostsarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FixedCosts  $fixedCosts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fixedcosts = FixedCosts::find($id);
        if (!is_null($fixedcosts)) {
          $fixedcosts->delete();
        }
        session()->flash('success','Costing has destroyed successfully!!');
        return redirect()->route('fixedcostsarc');
    }
}
