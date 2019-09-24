<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Image;
use Auth;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = AppSettings::orderBy('created_at','asc')->get();
        if ($settings->isEmpty()) {
            return view('pages.appsettings.create');
        }
        else{
            return view('pages.appsettings.edit')->with('settings',$settings);
        }

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
        $request->validate([
          'name' => 'required|max:50',
          'address' => 'required',
          'logo' => 'image|mimes: jpg,jpeg,png,gif|max: 2048',
          'contact' => 'nullable|numeric',
          'paymentpattern' => 'required',
          'servicecharge' => 'nullable',
          'vat' => 'nullable',
          'vatreg' => 'nullable',
          'instructions' => 'nullable',

        ]);

        if ($request->hasFile('logo')) {
            // logo adding
            $image = $request->file('logo');
            $img = date("YmdHis").'.'.$image->getClientOriginalExtension();
            $location = public_path('images/logos/'.$img);
            Image::make($image)->save($location);

            $setings = new AppSettings;
            $setings->reason = "Logo";
            $setings->value = $img;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        $setings = new AppSettings;
        $setings->reason = "Name";
        $setings->value = $request->name;
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Address";
        $setings->value = $request->address;
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Contact";
        $setings->value = $request->contact;
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Payment";
        $setings->value = $request->paymentpattern;
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Charge";
        $setings->value = $request->servicecharge;
        if (is_null($setings->value)) {
          $setings->value = 0;
        }
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Vat";
        $setings->value = $request->vat;
        if (is_null($setings->value)) {
          $setings->value = 0;
        }
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Vatreg";
        $setings->value = $request->vatreg;
        if (is_null($setings->value)) {
          $setings->value = "";
        }
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        $setings = new AppSettings;
        $setings->reason = "Instructions";
        $setings->value = $request->instructions;
        if (is_null($setings->value)) {
          $setings->value = "";
        }
        $setings->createdby = Auth::user()->id;
        $setings->updatedby = Auth::user()->id;
        $setings->save();

        session()->flash('success','Settings has done successfully!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSettings $appSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
          'name' => 'required|max:50',
          'address' => 'required',
          'logo' => 'image|mimes: jpg,jpeg,png,gif|max: 2048',
          'contact' => 'nullable|numeric',
          'paymentpattern' => 'required',
          'servicecharge' => 'nullable',
          'vat' => 'nullable',
          'vatreg' => 'nullable',
          'instructions' => 'nullable',

        ]);

        if ($request->hasFile('logo')) {
            // logo adding
            $image = $request->file('logo');
            $img = date("YmdHis").'.'.$image->getClientOriginalExtension();
            $location = public_path('images/logos/'.$img);
            Image::make($image)->save($location);

            $setings = new AppSettings;
            $setings->reason = "Logo";
            $setings->value = $img;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->name != $request->oldname) {
            $setings = new AppSettings;
            $setings->reason = "Name";
            $setings->value = $request->name;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->address != $request->oldaddress) {
            $setings = new AppSettings;
            $setings->reason = "Address";
            $setings->value = $request->address;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->contact != $request->oldcontact) {
            $setings = new AppSettings;
            $setings->reason = "Contact";
            $setings->value = $request->contact;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->paymentpattern != $request->oldpaymentpattern) {
            $setings = new AppSettings;
            $setings->reason = "Payment";
            $setings->value = $request->paymentpattern;
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->servicecharge != $request->oldservicecharge) {
            $setings = new AppSettings;
            $setings->reason = "Charge";
            $setings->value = $request->servicecharge;
            if (is_null($setings->value)) {
              $setings->value = 0;
            }
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->vat != $request->oldvat) {
            $setings = new AppSettings;
            $setings->reason = "Vat";
            $setings->value = $request->vat;
            if (is_null($setings->value)) {
              $setings->value = 0;
            }
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->vatreg != $request->oldvatreg) {
            $setings = new AppSettings;
            $setings->reason = "Vatreg";
            $setings->value = $request->vatreg;
            if (is_null($setings->value)) {
              $setings->value = "";
            }
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        if ($request->instructions != $request->oldinstructions) {
            $setings = new AppSettings;
            $setings->reason = "Instructions";
            $setings->value = $request->instructions;
            if (is_null($setings->value)) {
              $setings->value = "";
            }
            $setings->createdby = Auth::user()->id;
            $setings->updatedby = Auth::user()->id;
            $setings->save();
        }

        session()->flash('success','Settings has updated successfully!!');
        return redirect()->route('appsettings');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}
