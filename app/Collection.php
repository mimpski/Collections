<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    protected $fillable = [
        'user_id',
        'name',
        'id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function collectionItem(){
        return $this->hasMany('App\Item');
    }
}
