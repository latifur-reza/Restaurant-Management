<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $users = User::where('id',$id)->get();
        return view('pages.profile.myprofile')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
        $users = User::where('id',$id)->get();
        return view('pages.profile.editprofile')->with('users',$users);
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
        $request->validate([
          'name' => 'required|max:150',

        ]);

        $id = Auth::user()->id;
        $manager = User::find($id);

        $manager->name = $request->name;

        $manager->save();
        session()->flash('success','Profile updated successfully!!!');
        return redirect()->route('myprofile');
    }

    /**
     * Password Change View
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepasswordview(Request $request)
    {
        return view('pages.profile.changepassword');
    }

    /**
     * Password Change Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepassword(Request $request)
    {
        $request->validate([
          'password' => 'required|same:confirmation|min:8',

        ]);

        $id = Auth::user()->id;
        $manager = User::find($id);

        $manager->password = Hash::make($request['password']);

        $manager->save();
        session()->flash('success','Password Changed successfully!!!');
        return redirect()->route('myprofile');
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
