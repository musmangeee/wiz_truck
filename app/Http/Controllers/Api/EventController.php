<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){

        $event =Event::all();
        return response()->json([
            'status' => true,
            'message' => 'Get Event',
            'event' => $event,
            
        ]);
       }
}
