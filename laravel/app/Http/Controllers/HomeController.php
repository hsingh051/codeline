<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getFilm($slug)
    {        
        if(@$slug){
            $filmData = Films::with('comments')->where('slug', '=' ,$slug)->first();
            return view('film_details',[
                'result' => $filmData,
            ]);
            
        }else{
            return redirect('/');
        }

    }
}
