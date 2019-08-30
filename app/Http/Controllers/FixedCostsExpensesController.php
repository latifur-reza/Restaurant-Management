<?php

namespace App\Http\Controllers;

use App\FixedCostsExpenses;
use App\FixedCosts;
use Illuminate\Http\Request;

class FixedCostsExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $fixedcostsexpenses = FixedCostsExpenses::orderBy('created_at','desc')->where('status','Active')->get();
         return view('pages.fixedcostsexpenses.list')->with('fixedcostsexpenses',$fixedcostsexpenses);
     }

     public function indexarc()
     {
         $fixedcostsexpenses = FixedCostsExpenses::orderBy('created_at','desc')->where('status','Deleted')->get();
         return view('pages.fixedcostsexpenses.listarc')->with('fixedcostsexpenses',$fixedcostsexpenses);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $fixedcosts = FixedCosts::find($id);
        return view('pages.fixedcostsexpenses.create')->with('fixedcosts',$fixedcosts);
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
          'doneby' => 'nullable',
          'ext' => 'nullable',

        ]);

        $fixedcostsexpenses = new FixedCostsExpenses;

        $fixedcostsexpenses->reason = $request->reason;
        $fixedcostsexpenses->amount = $request->amount;
        $fixedcostsexpenses->doneby = $request->doneby;
        $fixedcostsexpenses->ext = $request->ext;

        $fixedcostsexpenses->status = "Active";
        $fixedcostsexpenses->createdby = "1";
        $fixedcostsexpenses->updatedby = "1";

        $fixedcostsexpenses->save();
        session()->flash('success','Expense has done successfully!!');
        return redirect()->route('fixedcostsexpenseslist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FixedCostsExpenses  $fixedCostsExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(FixedCostsExpenses $fixedCostsExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FixedCostsExpenses  $fixedCostsExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit(FixedCostsExpenses $fixedCostsExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FixedCostsExpenses  $fixedCostsExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FixedCostsExpenses $fixedCostsExpenses)
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
         $fixedcostsexpenses = FixedCostsExpenses::find($id);

         $fixedcostsexpenses->status = "Deleted";
         $fixedcostsexpenses->updatedby = "1";

         $fixedcostsexpenses->save();
         session()->flash('success','Costing has deleted for admin approval!!');
         return redirect()->route('fixedcostsexpenseslist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $fixedcostsexpenses = FixedCostsExpenses::find($id);

        $fixedcostsexpenses->status = "Active";
        $fixedcostsexpenses->updatedby = "1";

        $fixedcostsexpenses->save();
        session()->flash('success','Costing has activated successfully!!');
        return redirect()->route('fixedcostsexpensesarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FixedCostsExpenses  $fixedCostsExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fixedcostsexpenses = FixedCostsExpenses::find($id);
        if (!is_null($fixedcostsexpenses)) {
          $fixedcostsexpenses->delete();
        }
        session()->flash('success','Costing has destroyed successfully!!');
        return redirect()->route('fixedcostsexpensesarc');
    }
}
