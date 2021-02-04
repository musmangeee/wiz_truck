<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded = [];
    

    // ! Business 
    public function restaurant()
    {
        return $this->belongsTo('App\Business', 'business_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function packages()
    {
        return $this->hasMany('App\Package');
    }

}
