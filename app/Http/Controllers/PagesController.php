<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('pages.home.basic');
    }

    public function nopermit(){
        if (Auth::check()){
            return redirect()->route('index');
        }else{
            return view('auth.nopermit');
        }
    }

}
