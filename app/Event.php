<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    Protected $fillable = ['business_id','start_date','end_date','start_time','end_time','user_id','status'];
    

}
