<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Active')->get();
         return view('pages.menu.list')->with('menu',$menu);
     }

     public function indexarc()
     {
         $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Deleted')->get();
         return view('pages.menu.listarc')->with('menu',$menu);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
        return view('pages.menu.create')->with('category',$category);
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
        'food' => 'required:max:2',
        'price' => 'required|numeric',
        'discountpercent' => 'numeric|nullable',
        'discountcash' => 'numeric|nullable',

      ]);

      $menu = new Menu;

      $menu->categoryname = $request->categoryname;
      $menu->food = $request->food;
      $menu->price = $request->price;
      $menu->discountpercent = $request->discountpercent;
      if (is_null($menu->discountpercent)) {
        $menu->discountpercent = 0;
      }
      $menu->discountcash = $request->discountcash;
      if (is_null($menu->discountcash)) {
        $menu->discountcash = 0;
      }
      $menu->status = "Active";
      $menu->createdby = Auth::user()->id;
      $menu->updatedby = Auth::user()->id;

      $menu->save();
      session()->flash('success','Menu has created successfully!!');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $menu = Menu::find($id);
      $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
      return view('pages.menu.edit')->with('menu',$menu)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'categoryname' => 'required|max:150',
        'food' => 'required:max:2',
        'price' => 'required|numeric',
        'discountpercent' => 'numeric|nullable',
        'discountcash' => 'numeric|nullable',

      ]);

      $menu = Menu::find($id);

      $menu->categoryname = $request->categoryname;
      $menu->food = $request->food;
      $menu->price = $request->price;
      $menu->discountpercent = $request->discountpercent;
      if (is_null($menu->discountpercent)) {
        $menu->discountpercent = 0;
      }
      $menu->discountcash = $request->discountcash;
      if (is_null($menu->discountcash)) {
        $menu->discountcash = 0;
      }
      $menu->updatedby = Auth::user()->id;

      $menu->save();
      session()->flash('success','Menu has updated successfully!!');
      if ($menu->status == "Active") {
        return redirect()->route('menulist');
      } else {
        return redirect()->route('menuarc');
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
       $menu = Menu::find($id);

       $menu->status = "Deleted";
       $menu->updatedby = Auth::user()->id;

       $menu->save();
       session()->flash('success','Menu has deleted successfully!!');
       return redirect()->route('menulist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $menu = Menu::find($id);

        $menu->status = "Active";
        $menu->updatedby = Auth::user()->id;

        $menu->save();
        session()->flash('success','Menu has activated successfully!!');
        return redirect()->route('menuarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = Menu::find($id);
      if (!is_null($menu)) {
        $menu->delete();
      }
      session()->flash('success','Menu has destroyed successfully!!');
      return redirect()->route('menuarc');
    }
}
