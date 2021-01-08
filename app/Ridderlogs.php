<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ridderlogs extends Model
{
    public function pendingorders()
	{
		return $this->hasOne('App\Order','id','order_id');
    }
    public function orders()
	{
		return $this->hasMany('App\Order');
	}
}
