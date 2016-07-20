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

        // Create a new collection and set the user id
        $Collection =  new Collection();
        $Collection->user_id=Auth::user()->id;
        $Collection->save();

        // Get the id of the newly created collection
        $newCollectionId = $Collection->id;

        // Get the list of items
        $items = Item::limit(30)->get();
        $collectionDetails = Collection::where('id', $newCollectionId)->first();

        dd($collectionDetails);

        return redirect()->route('item_listing', compact('newCollectionId', 'items'));
    }


}
