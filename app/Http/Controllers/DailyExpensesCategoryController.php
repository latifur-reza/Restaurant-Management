<?php

namespace App\Http\Controllers;

use App\dailyExpensesCategory;
use Illuminate\Http\Request;

class DailyExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $dailyexpensescategory = DailyExpensesCategory::orderBy('categoryname','asc')->where('status','Active')->get();
         return view('pages.dailyexpensescategory.list')->with('dailyexpensescategory',$dailyexpensescategory);
     }

     public function indexarc()
     {
         $dailyexpensescategory = DailyExpensesCategory::orderBy('categoryname','asc')->where('status','Deleted')->get();
         return view('pages.dailyexpensescategory.listarc')->with('dailyexpensescategory',$dailyexpensescategory);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dailyexpensescategory.create');
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
        'categoryname' => 'unique:categories|required|max:150',

      ]);
        $dailyexpensescategory = new DailyExpensesCategory;

        $dailyexpensescategory->categoryname = $request->categoryname;
        $dailyexpensescategory->status = "Active";
        $dailyexpensescategory->createdby = "1";
        $dailyexpensescategory->updatedby = "1";

        $dailyexpensescategory->save();
        session()->flash('success','Category has created successfully!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dailyExpensesCategory  $dailyExpensesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(dailyExpensesCategory $dailyExpensesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dailyExpensesCategory  $dailyExpensesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dailyexpensescategory = DailyExpensesCategory::find($id);
      return view('pages.dailyexpensescategory.edit')->with('dailyexpensescategory',$dailyexpensescategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dailyExpensesCategory  $dailyExpensesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'categoryname' => 'unique:categories|required|max:150',

      ]);
      $dailyexpensescategory = DailyExpensesCategory::find($id);

      $dailyexpensescategory->categoryname = $request->categoryname;
      $dailyexpensescategory->updatedby = "1";

      $dailyexpensescategory->save();
      session()->flash('success','Category has updated successfully!!');
      if ($dailyexpensescategory->status == "Active") {
        return redirect()->route('dailyexpensescategorylist');
      } else {
        return redirect()->route('dailyexpensescategoryarc');
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
       $dailyexpensescategory = DailyExpensesCategory::find($id);

       $dailyexpensescategory->status = "Deleted";
       $dailyexpensescategory->updatedby = "1";

       $dailyexpensescategory->save();
       session()->flash('success','Category has deleted successfully!!');
       return redirect()->route('dailyexpensescategorylist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $dailyexpensescategory = DailyExpensesCategory::find($id);

        $dailyexpensescategory->status = "Active";
        $dailyexpensescategory->updatedby = "1";

        $dailyexpensescategory->save();
        session()->flash('success','Category has activated successfully!!');
        return redirect()->route('dailyexpensescategoryarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dailyExpensesCategory  $dailyExpensesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dailyexpensescategory = DailyExpensesCategory::find($id);
      if (!is_null($dailyexpensescategory)) {
        $dailyexpensescategory->delete();
      }
      session()->flash('success','Category has destroyed successfully!!');
      return redirect()->route('dailyexpensescategoryarc');
    }
}
