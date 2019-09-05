<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
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

    public function servicetest(){
        $category = Category::orderBy('categoryname','asc')->where('status','Active')->get();
        $menu = Menu::orderBy('categoryname','asc')->orderBy('food','asc')->where('status','Active')->get();
        return view('pages.home.test')->with('category',$category)->with('menu',$menu);
    }


}
