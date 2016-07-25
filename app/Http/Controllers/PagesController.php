<?php

namespace App\Http\Controllers;

use App\Item;
use App\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage(){
      // Get all collections
      $collections = Collection::orderBy('created_at', 'desc')->get();
      // I would like to get each item in the collections for this listing too.
      return view('pages.singles.welcome', compact('collections'));
    }


}
