<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];
    protected $casts = [
        'menu_id' =>'array'
    ];
    public function package()
    {
        return $this->belongsTo('App\Package');
    }
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
