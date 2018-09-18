<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;
use App\FilmsComments;
use Session;
use Auth;
use Redirect;
use URL;

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

    public function addFilm(){
        return view('add_film');
    }

    public function saveFilm(Request $request){
        
        $data = array(
            'name' => $request->name, 
            'slug' => str_replace(" ", '_', $request->name), 
            'description' => $request->description, 
            'realease_date' => $request->realease_date, 
            'rating' => $request->rating, 
            'ticket_price' => $request->ticket_price, 
            'country' => $request->country, 
            'genre' => $request->genre, 
            'photo' => '', 
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
            
        );
        Films::insert($data);
        Session::flash('success', 'Film added successfully!');
        return redirect('/films');
    }

    public function saveComment(Request $request){
        
        $data = array(
            'film_id' => $request->film_id,  
            'user_id' => Auth::user()->id, 
            'name' => $request->name, 
            'comment' => $request->comment, 
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
            
        );
        FilmsComments::insert($data);
        Session::flash('success', 'Comment added successfully!');
        return Redirect::to(URL::previous());
    }

    

}
