<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];
    protected $casts = [
        'menu_id' =>'array'
    ];
    public function packages()
    {
        return $this->belongsTo('App\Package','package_id');
    }
}
