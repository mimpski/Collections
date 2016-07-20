<?php

namespace App\Http\Controllers;

use App\Items;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class Pages extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function item_listing(){
      $items = Items::limit(30)->get();
      return view('pages.full-listing', compact('items'));
    }
}
