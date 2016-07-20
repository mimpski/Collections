<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function collectionItem(){
        return $this->hasMany('App\Item');
    }
}