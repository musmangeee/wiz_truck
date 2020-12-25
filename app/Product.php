<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','discount','image','in_stock','menu_id'];
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    
    
}
