<?php

namespace App\Http\Controllers;

use App\DailyExpenses;
use App\DailyExpensesCategory;
use Illuminate\Http\Request;
use Auth;

class DailyExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $dailyexpenses = DailyExpenses::orderBy('created_at','desc')->where('status','Active')->get();
         return view('pages.dailyexpenses.list')->with('dailyexpenses',$dailyexpenses);
     }

     public function indexarc()
     {
         $dailyexpenses = DailyExpenses::orderBy('created_at','desc')->where('status','Deleted')->get();
         return view('pages.dailyexpenses.listarc')->with('dailyexpenses',$dailyexpenses);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $dailyexpensescategory = DailyExpensesCategory::orderBy('categoryname','asc')->where('status','Active')->get();
      return view('pages.dailyexpenses.create')->with('dailyexpensescategory',$dailyexpensescategory);
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
        'categoryname' => 'required|max:150',
        'reason' => 'nullable',
        'quantity' => 'nullable|numeric',
        'amount' => 'required|numeric',
        'doneby' => 'nullable',

      ]);

      $dailyexpenses = new DailyExpenses;

      $dailyexpenses->categoryname = $request->categoryname;
      $dailyexpenses->reason = $request->reason;
      $dailyexpenses->quantity = $request->quantity;
      $dailyexpenses->amount = $request->amount;
      $dailyexpenses->doneby = $request->doneby;

      $dailyexpenses->status = "Active";
      $dailyexpenses->createdby = Auth::user()->id;
      $dailyexpenses->updatedby = Auth::user()->id;

      $dailyexpenses->save();
      session()->flash('success','Expenses has added successfully!!');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyExpenses  $dailyExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(DailyExpenses $dailyExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyExpenses  $dailyExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyExpenses $dailyExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyExpenses  $dailyExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyExpenses $dailyExpenses)
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
       $dailyexpenses = DailyExpenses::find($id);

       $dailyexpenses->status = "Deleted";
       $dailyexpenses->updatedby = Auth::user()->id;

       $dailyexpenses->save();
       session()->flash('success','Expense has deleted successfully!!');
       return redirect()->route('dailyexpenseslist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $dailyexpenses = DailyExpenses::find($id);

        $dailyexpenses->status = "Active";
        $dailyexpenses->updatedby = Auth::user()->id;

        $dailyexpenses->save();
        session()->flash('success','Expense has activated successfully!!');
        return redirect()->route('dailyexpensesarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyExpenses  $dailyExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dailyexpenses = DailyExpenses::find($id);
      if (!is_null($dailyexpenses)) {
        $dailyexpenses->delete();
      }
      session()->flash('success','Expense has destroyed successfully!!');
      return redirect()->route('dailyexpensesarc');
    }
}
