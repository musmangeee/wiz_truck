<?php

namespace App\Http\Controllers\Api;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\ProductOrder;
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
            'order_id' => 'required',
     ]);
    
  
     
             $order = Order::create([
              'order_id'=>$request-> order_id,
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
          
          
           //return response()->json($request->products);
             foreach($request->products as $product)
             {
                $pc = new ProductOrder();
                $pc->order_id = $order->id;
                $pc->product_id = $product['product_id'];
                $pc->quantity = $product['quantity'];
                
                $pc->save();
             }
             $order['products'] = ProductOrder::where('order_id', $order->id)->get();
           
        
             return response()->json([
            'status' =>true,
            'message' => 'Order Created Successfully',
            'order' =>$order,
          
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
