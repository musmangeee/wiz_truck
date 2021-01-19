<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne('App\User' ,'id','user_id');
    }
}
