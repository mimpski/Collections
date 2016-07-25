<?php

namespace App\Http\Controllers;
use App\Collection;
use App\Item;
use App\Input;
use App\CollectionItem;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;
use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function create_a_collection(){
      $user = Auth::user()->id;
      return view('pages.collections.create-collection', compact('user'));
    }

    public function save_collection(Request $request){
        $input = Request::all();

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
      return view('pages.collections.full-listing', compact('user','items','collectionDetails'));
    }

    public function view_collection(Request $request){
        // Validate all the data that is passed through the form
        $input = Request::all();

        $item1 = new CollectionItem();
        $item1->collection_id = $input['collection_id'];
        $item1->item = $input['item0'];
        $item1->save();

        $item2 = new CollectionItem();
        $item2->collection_id = $input['collection_id'];
        $item2->item = $input['item1'];
        $item2->save();

        $item3 = new CollectionItem();
        $item3->collection_id = $input['collection_id'];
        $item3->item = $input['item2'];
        $item3->save();

        $id = $input['collection_id'];

        return redirect()->route('individual_collection', compact('id'));
    }

    public function individual_collection($id){
      // Get the collection details based on the id
      $collection = Collection::where('id',$id)->first();

      // Run this raw SQL (must be refactored) to get the item data for the collection
      $items = DB::select( DB::raw("SELECT i.* FROM items i, collections_items ci, collections c WHERE i.id = ci.item AND ci.collection_id = c.id AND c.id = $id;") );

      return view('pages.collections.view-collection', compact('collection','items'));
    }


}
