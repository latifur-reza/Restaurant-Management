<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('pages.home.dashboard');
    }

    public function nopermit(){
      return view('auth.nopermit');
    }

}
