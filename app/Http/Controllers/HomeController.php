<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function changeLang(Request $request, $lang){

        if(!in_array($lang , array('ar','en') ))
           return redirect()->back();

       session(['lang_web' => $lang]); // setlang session
       return redirect()->back();

   }

}
