<?php

namespace App\Http\Controllers\AdminUser;

use App\User;
use App\Order;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        $pending_count = Order::where('status' , 'pending')->count();
        $accepted_count = Order::where('status' , 'accepted')->count();
        $cancle_count = Order::where('status' , 'cancle')->count();
        $deliver_count = Order::where('status' , 'deliver')->count();
        
        return view ('admin.order.index',compact('orders','pending_count','accepted_count','cancle_count','deliver_count'));
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
        $order = Order::findOrFail($id);
        $user = User::all();
        $business = Business::all();
        return view('admin.order.edit', compact('order','user','business'));
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
        $input      = $request->all();
        $Ingredient = Order::findOrFail($id);
        $Ingredient->update($input);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
