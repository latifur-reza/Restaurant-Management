<?php

namespace App\Http\Controllers;

use App\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $barcode = Barcode::orderBy('code','asc')->where('status','Active')->get();
         return view('pages.barcode.list')->with('barcode',$barcode);
     }

     public function indexarc()
     {
         $barcode = Barcode::orderBy('code','asc')->where('status','Deleted')->get();
         return view('pages.barcode.listarc')->with('barcode',$barcode);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.barcode.create');
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
        'code' => 'unique:barcodes|required|max:150',

      ]);

      $barcode = new Barcode;

      $barcode->code = $request->code;
      $barcode->status = "Active";
      $barcode->createdby = "1";
      $barcode->updatedby = "1";

      $barcode->save();
      session()->flash('success','Barcode has created successfully!!');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function show(Barcode $barcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $barcode = Barcode::find($id);
      return view('pages.barcode.edit')->with('barcode',$barcode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'code' => 'unique:barcodes|required|max:150',

      ]);

      $barcode = Barcode::find($id);

      $barcode->code = $request->code;
      $barcode->updatedby = "1";

      $barcode->save();
      session()->flash('success','Barcode has updated successfully!!');
      if ($barcode->status == "Active") {
        return redirect()->route('barcodelist');
      } else {
        return redirect()->route('barcodearc');
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
       $barcode = Barcode::find($id);

       $barcode->status = "Deleted";
       $barcode->updatedby = "1";

       $barcode->save();
       session()->flash('success','Barcode has deleted successfully!!');
       return redirect()->route('barcodelist');
     }

     /**
      * Active the specified resource from list.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function active(Request $request, $id)
      {
        $barcode = Barcode::find($id);

        $barcode->status = "Active";
        $barcode->updatedby = "1";

        $barcode->save();
        session()->flash('success','Barcode has activated successfully!!');
        return redirect()->route('barcodearc');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $barcode = Barcode::find($id);
      if (!is_null($barcode)) {
        $barcode->delete();
      }
      session()->flash('success','Barcode has destroyed successfully!!');
      return redirect()->route('barcodearc');
    }
}
