<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','parent_id', 'icon', 'image'];


    public function businesses()
    {
        return $this->belongsToMany('App\Business', 'business_categories', 'category_id', 'business_id');
    }

}
