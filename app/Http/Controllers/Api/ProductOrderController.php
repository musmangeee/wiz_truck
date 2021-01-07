<?php

namespace App\Http\Controllers\Api;
use App\Order;
use Validator;
use App\Business;
use App\ProductOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $id)
    {
        $user_id = $request->user()->id;
        $business_id = Business::where('user_id', $user_id)->first();
        $order = Order::where('business_id', $id)->get();
        return response()->json([
            'status' =>true,
            'message' => 'Order get Successfully',
            'order' =>$order,
       
     ]);
    }
     
     
    public function create_order(Request $request)
    {   
        // $user_id = $request-> user()->id;
        // $business = Business::where('user_id',$user_id)->first();
        // $order = Order::where('business_id',$business->id)->get();
       
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        // dd($request['status']);
        // dd($request->status);
        // $input['id'] = $request->user()->id;
    //    dd($input['order_id']);
    // dd($input['user_id']);
        if(Order::where(['user_id' => $input['user_id'] ,'status' => 'pending'])->exists())
        {
           return response()->json([

                 'message' => 'order is already in exist'
          
           ]);
        }

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
            'payment_method'=> 'required',
            'payment_status' => 'required',
            'status'=> 'required',
     ]);
    //  dd($request->all());
     $user = $request-> user();
  
   
             $order = Order::create([
              'order_id'=>$request-> order_id,
              'user_id' =>$request-> user()->id,
              'business_id' =>$request->business_id,
              'description' => $request -> description , 
              'order_date'=>$request-> order_date,
              'address' => $request-> address,
              'latitude' => $request-> latitude,
              'longitude' => $request-> longitude,
              'product_id' => $request -> product_id,
              'product' => $request -> product,
              'status'=>$request -> status,
              'payment_method'=> $request -> payment_method,
              'payment_status' => $request -> payment_status,
              
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
            
          
            //  $user_id = $request-> user()->id;
            //  $business = Business::where('user_id',$user_id)->first();
            //  $order = Order::where('business_id',$business->id)->get();
             
            //  if($order == $request->order_id){
                //     $message = "Order already exits";
            //     dd('dd');
            //  }
        
             return response()->json([
               'status' =>true,
               'message' => 'Order Created Successfully',
               'order' =>$order,
          
        ]);


    }

    public function accept_order(Request $request)
    {
       $user = $request-> user();
        $message = "";
        $status = false;
       $business = Business::where('user_id',$user->id)->first();
       //dd($business->id);
       if($business == null){
           $message = "You have no business account associated with your email.";
           }
       else{
        $order = Order::where(['business_id'=>$business->id,'id'=>$request->order_id])->first();
           if($order != null){
            $order->status = "accept";
            $status= true;
            $order->save();
            $message = "The order have been accepted"; 
           }
           else{
            $message = "You have no order associated with your business email."; 
           }
        
      }
      
        return response()->json([
            'status' =>$status,
            'message' => $message,
            'order' =>$order,
        ]);       

       


    }   
     
    public function cancel_order(Request $request)
    {
        $user = $request-> user();
        $message = "";
        $status = false;
       $business = Business::where('user_id',$user->id)->first();
       //dd($business->id);
       if($business == null){
           $message = "You have no business account associated with your email.";
           }
       else{
        $order = Order::where(['business_id'=>$business->id,'id'=>$request->order_id])->first();
           if($order != null){
            $order->status = "cancel";
            $status= true;
            $order->save();
            $message = "The order have been canceled"; 
           }
           else{
            $message = "You have no order associated with your business email."; 
           }
        
      }
      
        return response()->json([
            'status' =>$status,
            'message' => $message,
            'order' =>$order,
        ]);       

       


    }
    public function deliver_order(Request $request)
    {
        $user = $request-> user();
        $message = "";
        $status = false;
       $business = Business::where('user_id',$user->id)->first();
       //dd($business->id);
       if($business == null){
           $message = "You have no business account associated with your email.";
           }
       else{
        $order = Order::where(['business_id'=>$business->id,'id'=>$request->order_id])->first();
           if($order != null){
            $order->status = "deliver";
            $status= true;
            $order->save();
            $message = "The order have been delivered"; 
           }
           else{
            $message = "You have no order associated with your business email."; 
           }
        
      }
      
        return response()->json([
            'status' =>$status,
            'message' => $message,
            'order' =>$order,
        ]);       
 
    }
    public function completed_order(Request $request)
    {
        $user = $request-> user();
        $message = "";
        $status = false;
       $business = Business::where('user_id',$user->id)->first();
       //dd($business->id);
       if($business == null){
           $message = "You have no business account associated with your email.";
           }
       else{
        $order = Order::where(['business_id'=>$business->id,'id'=>$request->order_id])->first();
           if($order != null){
            $order->status = "completed";
            $status= true;
            $order->save();
            $message = "The order have been completed"; 
           }
           else{
            $message = "You have no order associated with your business email."; 
           }
        
      }
      
        return response()->json([
            'status' =>$status,
            'message' => $message,
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
        
        $input = $request->all();
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
        'payment_method'=> 'required',
        'payment_status' => 'required',
 ]);
        
       
        
             $order = Order::find($id);
            
             $order->update($input);
             return response()->json([
                'status' =>true,
                'message' => 'Order updated Successfully',
                'order' =>$order,
           
         ]);
             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();
        return response()->json([
         'status' =>true,
         'message' =>'Order Deleted Successfully',
         'order' =>$order,
        ]);
    }
}
