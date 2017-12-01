<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected  $table='products';

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    public function categories(){
        return $this->hasOne('App\Category');
    }
}
