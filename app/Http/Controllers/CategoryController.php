<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
        return view('pages.category.list')->with('category',$category);
    }

    public function indexarc()
    {
        $category = Category::orderBy('categoryname','asc')->where('status','Deleted')->get();
        return view('pages.category.listarc')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
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
        $category = new Category;

        $category->categoryname = $request->categoryname;
        $category->status = "Active";
        $category->createdby = Auth::user()->id;
        $category->updatedby = Auth::user()->id;

        $category->save();
        session()->flash('success','Category has created successfully!!');
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
        $category = Category::find($id);
        return view('pages.category.edit')->with('category',$category);
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
      $request->validate([
        'categoryname' => 'unique:categories|required|max:150',

      ]);
      $category = Category::find($id);

      $category->categoryname = $request->categoryname;
      $category->updatedby = Auth::user()->id;

      $category->save();
      session()->flash('success','Category has updated successfully!!');
      if ($category->status == "Active") {
        return redirect()->route('categorylist');
      } else {
        return redirect()->route('categoryarc');
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
       $category = Category::find($id);

       $category->status = "Deleted";
       $category->updatedby = Auth::user()->id;

       $category->save();
       session()->flash('success','Category has deleted successfully!!');
       return redirect()->route('categorylist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $category = Category::find($id);

        $category->status = "Active";
        $category->updatedby = Auth::user()->id;

        $category->save();
        session()->flash('success','Category has activated successfully!!');
        return redirect()->route('categoryarc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
          $category->delete();
        }
        session()->flash('success','Category has destroyed successfully!!');
        return redirect()->route('categoryarc');
    }
}
