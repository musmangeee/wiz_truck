<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
       $pack = Package::where('id',$request->package_id)->first();
       $event_id = $pack->event_id;
       $validator = Validator::make($request->all(), [
        'package_id' => 'required', 
        'business_id' =>'required',
        'event_id' => 'required',
        'payer' => 'required',
        'address' => 'required',
        'zip_code' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'occasion' => 'required',
        'eaters' => 'required',
        'menu_id'=> 'required',
        'phone_number' => 'required',
        'final_detail' => 'required',
        
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 401);
    }
     


        $booking = Booking::create([
            'user_id' => $user_id,
            'package_id' => $request->package_id,
            'business_id' =>$request ->business_id,
            'event_id'=>$event_id,
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
