<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $staff = Staff::orderBy('name','asc')->where('status','Active')->get();
         return view('pages.staff.list')->with('staff',$staff);
     }

     public function indexarc()
     {
         $staff = Staff::orderBy('name','asc')->where('status','Deleted')->get();
         return view('pages.staff.listarc')->with('staff',$staff);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.staff.create');
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
        'email' => 'nullable',
        'phone' => 'nullable',
        'address' => 'nullable',
        'salary' => 'numeric|nullable',
        'joiningdate' => 'nullable',

      ]);

      $staff = new Staff;

      $staff->name = $request->name;
      $staff->email = $request->email;
      $staff->phone = $request->phone;
      $staff->address = $request->address;
      $staff->salary = $request->salary;
      $staff->joiningdate = $request->joiningdate;
      $staff->status = "Active";
      $staff->createdby = "1";
      $staff->updatedby = "1";

      $staff->save();
      session()->flash('success','Staff has created successfully!!');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $staff = Staff::find($id);
      return view('pages.staff.edit')->with('staff',$staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:150',
        'email' => 'nullable',
        'phone' => 'nullable',
        'address' => 'nullable',
        'salary' => 'numeric|nullable',
        'joiningdate' => 'nullable',

      ]);

      $staff = Staff::find($id);

      $staff->name = $request->name;
      $staff->email = $request->email;
      $staff->phone = $request->phone;
      $staff->address = $request->address;
      $staff->salary = $request->salary;
      $staff->joiningdate = $request->joiningdate;

      $staff->updatedby = "1";

      $staff->save();
      session()->flash('success','Staff has updated successfully!!');
      if ($staff->status == "Active") {
        return redirect()->route('stafflist');
      } else {
        return redirect()->route('staffarc');
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
       $staff = Staff::find($id);

       $staff->status = "Deleted";
       $staff->updatedby = "1";

       $staff->save();
       session()->flash('success','Staff has deleted successfully!!');
       return redirect()->route('stafflist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $staff = Staff::find($id);

        $staff->status = "Active";
        $staff->updatedby = "1";

        $staff->save();
        session()->flash('success','Staff has activated successfully!!');
        return redirect()->route('staffarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $staff = Staff::find($id);
      if (!is_null($staff)) {
        $staff->delete();
      }
      session()->flash('success','Staff has destroyed successfully!!');
      return redirect()->route('staffarc');
    }
}
