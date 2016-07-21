<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class Collections extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
      $items = Item::limit(30)->get();
      return view('pages.full-listing', compact('items'));
    }
}
