<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'business_id','order_date','address','longitude','latitude','description','status'];
    public function restaurant()
    {
        return $this->belongsTo('App\Business');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
