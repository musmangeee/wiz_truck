<?php

namespace App\Http\Controllers\AdminUser;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        
        $coupons = Coupon::paginate(10);
        return view ('admin.coupons.index',compact('coupons'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $Coupon = Coupon::latest('id')->first();
        return view('admin.coupons.create');
      
       
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
        
       
        return redirect()->route('coupon.index');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit',compact('coupon'));
       
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
        return redirect()->route('coupon.index');
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
        return redirect()->route('coupon.index');
        
    }
}
