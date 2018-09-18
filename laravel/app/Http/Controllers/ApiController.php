<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use File;
use Mail;
use Schema;
use Auth;
use App\Films;

use Illuminate\Support\Facades\Input;



class ApiController extends Controller{

  public function getFilms(){

    $result = Films::orderBy('id','desc')->get();
    if($result->count() >= 1){
      $return = array('result' => $result,'status_code'=>200);
      exit(json_encode($return));
    }else{
      $return = array('result' => 'No Record found!','status_code'=>204);
      exit(json_encode($return));
    }

  }

}