<?php

namespace App\Http\Controllers\Api;

use App\Business;
use App\Http\Controllers\Api\Notification\NotificationController;
use App\Http\Controllers\Controller;
use App\Location;
use App\Order;
use App\ProductOrder;
use App\Ridderlogs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::guard('api')->user();
        $order = Order::where('user_id', $user->id)->whereNotIn('status', ['deliver', 'cancel'])->with('restaurant', 'ridder')->first();
        return response()->json([
            'status' => true,
            'message' => 'Order get Successfully',
            'order' => $order,

        ]);
    }

    public function create_order(Request $request)
    {

        $input = $request->all();
        $input['user_id'] = $request->user()->id;

        if (Order::where('user_id', $input['user_id'])->whereIn('status', ['pending', 'pickup', 'accept'])->exists()) {
            return response()->json([

                'message' => 'order is already in exist',

            ]);
        }

        $order = array();

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'order_date' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'order_type' => 'required',
            'product_id' => 'required',
            'order_id' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required',
            'status' => 'required',
        ]);

        $user = $request->user();

        $order = Order::create([
            'order_id' => $request->order_id,
            'user_id' => $request->user()->id,
            'business_id' => $request->business_id,
            'description' => $request->description,
            'order_date' => $request->order_date,
            'order_type' => $request->order_type,
            'address' => $request->address,
            'quantity' => $request->quantity,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'product_id' => $request->product_id,
            'product' => $request->product,
            'status' => $request->status,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            // ! new fields
            'rider_earning' => $request->rider_earning,
            'foodtruck_earning' => $request->foodtruck_earning,
            'service_charges' => $request->service_charges,
            'tip' => $request->tip,
            'tax_charges' => $request->tax_charges,
            'payment_id' => $request->payment_id,
        ]);

        foreach ($request->products as $product) {
            $pc = new ProductOrder();
            $pc->order_id = $order->id;
            $pc->product_id = $product['product_id'];
            $pc->quantity = $product['quantity'];

            $pc->save();
        }
        $order['products'] = ProductOrder::where('order_id', $order->id)->get();

        if ($pc->save()) {
            $business = Business::where('id', $request->business_id)->first();
            $token = $business->user->device_token;

            $notification = new NotificationController();
            //   $notification->sendPushNotification($user->device_token,'your order have been place ','order placed successfully',$order->id);

            //   $notification->sendPushNotification($token,'your have received an order ','order placed successfully',$request->business_id);
            $notification->sendNotification('Order Created', $user->device_token);
            $notification->sendNotification('Order Created', $business->user->device_token);
        }
        return response()->json([
            'status' => true,
            'message' => 'Order Created Successfully',
            'order' => $order,

        ]);
    }

    public function accept_order(Request $request, $radius = 14000)
    {

        $user = $request->user();

        $message = "";
        $order = [];
        $status = false;
        $business = Business::where('user_id', $user->id)->first();

        if ($business == null) {
            $message = "You have no business account associated with your email.";
        } else {
            $order = Order::where(['business_id' => $business->id, 'id' => $request->order_id])->first();

            if ($order != null) {
                $order->status = "accept";
                $status = true;
                $order->save();

                if (Order::where(['business_id' => $business->id, 'id' => $request->order_id, 'status' => 'deliver'])->first()) {
                    // ! Sending push notification

                    $notification = new NotificationController();
                    $notification->sendNotification('Order Accepted', $order->user->device_token);
                    $notification->sendNotification('Order Accepted', $business->user->device_token);

                }
                $message = "The order have been accepted";

                $latitude = $business->latitude;
                $longitude = $business->longitude;

                // ! Get nearby Riders & there distance
                $loc = Location::selectRaw('user_id,longitude,latitude, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
                    ->having('distance', '<', $radius)
                    ->orderBy('distance')
                    ->get();
                // ! Commission
                $comission = ($order->total * 12.5 / 100);
                // ! Get nearby riders
                foreach ($loc as $location) {
                    $distance = number_format((float) $location->distance, 1, '.', '');
                    // dump($distance);
                    $device_token = User::where('id', $location->user_id)->value('device_token');
                    $notification = new NotificationController();
                    $notification->sendPushRiderNotification(
                        $device_token,
                        'Order Accepted',
                        'Order accepted successfully',
                        null,
                        $latitude,
                        $longitude,
                        $location->latitude,
                        $location->longitude,
                        $order->id,
                        $comission,
                        $distance
                    );
                }
            } else {
                $message = "You have no order associated with your business email.";
            }
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'order' => $order,
        ]);
    }

    public function cancel_order(Request $request)
    {
        $user = $request->user();
        $message = "";
        $status = false;
        $business = Business::where('user_id', $user->id)->first();
        //dd($business->id);
        if ($business == null) {
            $message = "You have no business account associated with your email.";
        } else {
            $order = Order::where(['business_id' => $business->id, 'id' => $request->order_id])->first();
            if ($order != null) {
                $order->status = "cancel";
                $status = true;
                $order->save();

                // ! Sending push notification
                $notification = new NotificationController();
                $notification->sendNotification('Order Cancelled', $order->user->device_token);

                $message = "The order have been canceled";
            } else {
                $message = "You have no order associated with your business email.";
            }
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'order' => $order,
        ]);
    }
    public function deliver_order(Request $request)
    {
        $user = $request->user();
        $order = 0;
        $message = "";
        $status = false;
        $business = Business::where('user_id', $user->id)->first();
        //dd($business->id);
        if ($business == null) {
            $message = "You have no business account associated with your email.";
        } else {
            $order = Order::where(['business_id' => $business->id, 'id' => $request->order_id])->first();

            if ($order != null) {
                $order->status = "deliver";
                $status = true;
                $order->save();
                // ! Sending push notification
                $notification = new NotificationController();

                $notification->sendNotification('Order Deliver', $order->user->device_token);
                $notification->sendNotification('Order Deliver', $business->user->device_token);

                $message = "The order have been delivered";
            } else {
                $message = "You have no order associated with your business email.";
            }
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'order' => $order,
        ]);
    }
    public function completed_order(Request $request)
    {
        $user = $request->user();
        $message = "";
        $status = false;
        $business = Business::where('user_id', $user->id)->first();
        //dd($business->id);
        if ($business == null) {
            $message = "You have no business account associated with your email.";
        } else {
            $order = Order::where(['business_id' => $business->id, 'id' => $request->order_id])->first();
            if ($order != null) {
                $order->status = "completed";
                $status = true;
                $order->save();
                $message = "The order have been completed";
            } else {
                $message = "You have no order associated with your business email.";
            }
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'order' => $order,
        ]);
    }
    public function pickup_order(Request $request)
    {
        $user = Auth::guard('api')->user();

        $rider = Ridderlogs::where(['user_id' => $user->id, 'order_id' => $request->order_id])->first();
        $order = Order::find($request->order_id);
        $order->status = 'pickup';
        $order->save();
        $rider->status = "pickup";
        $rider->save();

        return response()->json([
            'status' => true,
            'message' => "pickup order to rider",
            'rider' => $rider,
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
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'order_date' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'product_id' => 'required',
            'order_id' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required',
        ]);

        $order = Order::find($id);
        $order->update($input);
        return response()->json([
            'status' => true,
            'message' => 'Order updated Successfully',
            'order' => $order,

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
            'status' => true,
            'message' => 'Order Deleted Successfully',
            'order' => $order,
        ]);
    }

}
