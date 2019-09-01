<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('pages.home.dashboard');
    }

    public function nopermit(){
      return view('auth.nopermit');
    }

    public function servicenew(){
      return view('pages.home.serve');
    }


}
