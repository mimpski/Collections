<?php

namespace App\Http\Controllers;
use App\Collection;
use App\Item;
use App\CollectionItem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_a_collection(){
      $user = Auth::user()->id;
      return view('pages.create-collection', compact('user'));
    }

    public function save_collection(Request $request){
        // Validate all the data that is passed through the form
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required'
        ]);
        // Turn that data into a request
        $input = $request->all();

        // Create the new collection with that data
        $Collection =  new Collection();
        $Collection->name = $input['name'];
        $Collection->user_id = $input['user_id'];
        $Collection->save();

        return redirect()->route('add_items');
    }

    public function add_items(){
      // Get the users Id
      $user = Auth::user()->id;

      // Get the details of the new collections
      $collectionDetails = Collection::all()->where('user_id', $user)->last();

      // Get the list of items
      $items = Item::limit(30)->get();
      return view('pages.full-listing', compact('user','items','collectionDetails'));
    }


}
