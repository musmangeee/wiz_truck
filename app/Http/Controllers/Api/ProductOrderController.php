<?php

namespace App\Http\Controllers\Api;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
class ProductOrderController extends Controller
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
     
     
    public function order_accept(Request $request, $id)
    {   
     
        $order = array();

      $validator =  Validator::make($request->all(), [
            'description' => 'required',
            'address' => 'required',
            'longitude'=>'required',
            'latitude'=>'required',
            'order_date'=>'required',
            'product' => 'required',
            'quantity'=>'required',
            'product_id' => 'required',
     ]);
    
  
     
             $order = Order::create([
             
              'user_id' =>$request-> user_id ,
              'business_id' =>$request-> business_id,
              'description' => $request -> description , 
              'order_date'=>$request-> order_date,
              'address' => $request-> address,
              'latitude' => $request-> latitude,
              'longitude' => $request-> longitude,
              'product_id' => $request -> product_id,
              'product' => $request -> product,
              
             ]);
           
             
             foreach($request->product as $product)
             {
                $pc = new ProductOrder();
                $pc->product_id = $product->id;
                $pc->quantity = $quantity;
                $pc->save();
             }
        
        
             return response()->json([
            'status' =>true,
            'message' => 'Order Created Successfully',
          
        ]);
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
        //
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
