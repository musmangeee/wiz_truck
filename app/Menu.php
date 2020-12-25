<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function business()
    {
        return $this->belongsTo('App\Business');
    }
    Protected $fillable = ['name','business_id'];
}
