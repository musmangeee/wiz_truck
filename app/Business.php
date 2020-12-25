<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses';

    protected $fillable = ['id', 'name', 'url','postal_code',
        'phone',  'address', 'images', 'created_by', 'updated_by', 'deleted_by', 'user_id', 'slug','zipcode' ,'latitude' , 'longitude' ,'business_email' , 
        'city', 'state' , 'hours' ,'status' ,'description' , 'claimed' , 'message'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'business_categories', 'business_id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function town()
    {
        return $this->hasOne('App\Town', 'id', 'town_id');
    }

    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'business_images', 'business_id', 'image_id');
    }
    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
    public function order()
    {
        return $this->hasMany('App\Order');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }

  
}
