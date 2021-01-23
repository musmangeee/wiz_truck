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
		return $this->belongsTo('App\Order','order_id');
	}

	public function user()
	{
		return $this->hasMany('App\User');
	}
}
