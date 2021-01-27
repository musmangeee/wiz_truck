<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function packages()
    {
        return $this->belongsTo('App\Package','package_id');
    }
}
