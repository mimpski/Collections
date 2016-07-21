<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model{

    protected $table = 'items';

    public function collection(){
        return $this->belongsToMany('App\Collection');
    }
}
