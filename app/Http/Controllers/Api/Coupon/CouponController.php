<?php

namespace App\Http\Controllers\Api\Coupon;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Coupons = Coupon::all();
        $response = [
            "status" => "true",
            "message" => "successfuly",
            "coupon" => $Coupons,
        ];

        return response()->json($response);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Coupon = Coupon::latest('id')->first();
        
      
        $response = [
            "status" => "true",
            "message" => "successfuly",
            "coupon" => $Coupons,
        ];

        return response()->json($response);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $Coupons = Coupon::create($input);
        $response = [
            "status" => "true",
            "message" => "Coupon created successfully",
            "coupon" => $Coupons,
        ];

        return response()->json($response);
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
        $Coupon = Coupon::findOrFail($id);
        $response = [
            "status" => "true",
            "message" => "successfuly",
            "coupon" => $Coupons,
        ];

        return response()->json($response);
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

        // $validate = Validator::make($request->all(), [ 
            
        // ]);


        // if ($validate->fails()) { 
          
        //     return response()->json(['error'=>$validate->errors()->first(),'status' => false], 401);            
        // }

        
       
        $input = $request->all();
        $Coupon = Coupon::findOrFail($id);
        $Coupon->update($input);
        $response = [
            "status" => "true",
            "message" => "coupon update successfully",
            "coupon" => $Coupon,
        ];

        return response()->json($response);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Coupon = Coupon::findOrFail($id);
        $Coupon->delete();
        $response = [
            "message" => "Coupon delete",
            "coupon" => $Coupon,
        ];
        return response()->json($response);
    }
}
