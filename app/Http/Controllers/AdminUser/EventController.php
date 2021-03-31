<?php

namespace App\Http\Controllers\AdminUser;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = Event::paginate(10);
       return view ('admin.Events.index' , compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

       
       
       
        $business = Event::create([
            'user_id' => $user_id,
            'business_id' =>$request ->business_id,
            'payer' => $request->payer,  
            'address' => $request ->address,
            'zip_code' => $request ->zip_code, 
            'start_date' => $request ->start_date, 
            'end_date' => $request ->end_date , 
            'start_time' => $request ->start_time,
            'end_time' =>  $request ->end_time, 
            'occasion' => $request ->occasion,
            'eaters' => $request ->eaters,  
            'menu_id' =>$request->menu_id, 
            'phone_number' => $request ->phone_number , 
            'final_detail'  => $request ->final_detail,  
            ]);
         
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
