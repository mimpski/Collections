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

class CollectionController extends Controller{

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
        $id = $Collection->id;

        $collectionDetails = Collection::all()->where('id', $id)->first();

        // Get the list of items
        $items = Item::limit(30)->get();
        return view('pages.collections.full-listing', compact('id', 'collectionDetails', 'items'));
    }

    public function add_items($id){
      // Get the users Id
      $user = Auth::user()->id;

      // Get the details of the new collections
      $collectionDetails = Collection::all()->where('id', $id)->first();

      // Get the list of items
      $items = Item::limit(30)->get();
      return view('pages.collections.full-listing', compact('user','items','collectionDetails'));
    }

    public function view_collection(Request $request){
        // Validate all the data that is passed through the form
        $input = Request::all();

        $id = $input['collection_id'];

        $items_checked = $input['item'];

        $collection = CollectionItem::where('collection_id', $id)->delete();

        if(is_array($items_checked)){
          foreach($items_checked as $item){
            $value = new CollectionItem();
            $value->collection_id = $id;
            $value->item = $item;
            $value->save();
          }
        }

        return redirect()->route('individual_collection', compact('id'));
    }

    public function individual_collection($id){
      // Get the collection details based on the id
      $collection = Collection::where('id',$id)->first();

      // Run this raw SQL (must be refactored) to get the item data for the collection
      $items = DB::select( DB::raw("SELECT i.* FROM items i, collections_items ci, collections c WHERE i.id = ci.item AND ci.collection_id = c.id AND c.id = $id;") );

      return view('pages.collections.view-collection', compact('collection','items'));
    }

    public function edit_collection($id){
      $user = Auth::user()->id;
      // Get the collection details based on the id
      $collection = Collection::where('id',$id)->first();

      // Run this raw SQL (must be refactored) to get the item data for the collection
      $items = DB::select( DB::raw("SELECT i.* FROM items i, collections_items ci, collections c WHERE i.id = ci.item AND ci.collection_id = c.id AND c.id = $id;") );

      return view('pages.collections.edit-collection', compact('collection','items'));
    }

    public function update_collection(Request $request){
        $input = Request::all();
        $id = Request::get('id');
        // Create the new collection with that data
        $Collection = Collection::where('id',$id)->first();
        $Collection->name = $input['name'];
        $Collection->save();
        $user = Auth::user()->id;
        return redirect()->route('my_collections', compact('user'));
    }

    public function update_items($id){
      $user = Auth::user()->id;
      // Get the details of the new collections
      $collectionDetails = Collection::where('id', $id)->first();
      // Get the list of items
      $items = Item::limit(30)->get();
      return view('pages.collections.full-listing', compact('user','items','collectionDetails'));
    }

    public function my_collections(){
      $user = Auth::user()->id;
      $collections = Collection::where('user_id',$user)->get();
      return view('pages.collections.my-collections', compact('user', 'collections'));
    }


}
