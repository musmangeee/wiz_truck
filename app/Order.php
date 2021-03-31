<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'business_id', 'order_date', 'address', 'longitude', 'latitude', 'description', 'status', 'payment_method', 'payment_status', 'order_type',
        'total', 'rider_earning', 'foodtruck_earning', 'service_charges', 'tip', 'tax_charges', 'payment_id'];

    public function restaurant()
    {
        return $this->belongsTo('App\Business', 'business_id');
    }
    public function ridder()
    {
        return $this->belongsTo('App\Ridder');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function productOrders()
    {
        return $this->hasMany('App\ProductOrder');
    }

    // 'product_id', 'id'

}
