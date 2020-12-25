<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function restaurant()
    {
        return $this->belongsTo('App\Business');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
