<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    //
    protected $fillable = ['id' ,'category_id'];
    public function business()
    {
        return $this->hasMany('App\Category');
    }
}
