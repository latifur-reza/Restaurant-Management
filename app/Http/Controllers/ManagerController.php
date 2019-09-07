<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = User::orderBy('permission','asc')->orderBy('name','asc')->where('permission','Admin')->orwhere('permission','Manager')->orwhere('permission','None')->get();
        return view('pages.manager.list')->with('manager',$manager);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.manager.create');
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
          'email' => 'required|max:150|unique:users',
          'password' => 'required|min:8',

        ]);
          $manager = new User;

          $manager->name = $request->name;
          $manager->email = $request->email;
          $manager->password = Hash::make($request['password']);
          $manager->permission = "None";

          $manager->save();
          session()->flash('success','Manager has added successfully!! Please Provide Permission');
          return back();
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

    /**
     * Remove the specified resource from list temporaryly.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request, $id)
     {
       $manager = User::find($id);

       $manager->permission = "Deleted";

       $manager->save();
       session()->flash('success','User has deleted successfully!!');
       return redirect()->route('managerlist');
     }

     /**
      * User will get Admin Permission.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function makeadmin(Request $request, $id)
      {
        $manager = User::find($id);

        $manager->permission = "Admin";

        $manager->save();
        session()->flash('success','User has made Admin successfully!!');
        return redirect()->route('managerlist');
      }

      /**
       * User will get Manager Permission.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
       public function makemanager(Request $request, $id)
       {
         $manager = User::find($id);

         $manager->permission = "Manager";

         $manager->save();
         session()->flash('success','User has made Manager successfully!!');
         return redirect()->route('managerlist');
       }

      /**
       * User will get No Permission.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
       public function makenone(Request $request, $id)
       {
         $manager = User::find($id);

         $manager->permission = "None";

         $manager->save();
         session()->flash('success','User permission has denied successfully!!');
         return redirect()->route('managerlist');
       }
}
