<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model{

    protected $table = 'collections_items';

    public function collection(){
        return $this->belongsTo('App\Collection');
    }
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
