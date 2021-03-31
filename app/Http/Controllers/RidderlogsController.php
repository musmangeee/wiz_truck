<?php

namespace App\Http\Controllers;

use App\Order;
use App\Ridderlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RidderlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $user_id = Auth::user()->id;
        
    //     $rider_logs = Ridderlogs::where('user_id',$user_id)->get();
         
    //    dd($rider_logs);




    //     $ridderlog_id = $rider_logs[0]['id'];
        
    //   $order = Order::where('ridderlog_id',$ridderlog_id)->get();
    //   dd($order);  
        // $commision = Order::find($order_id)->total;
        // $commision = ($commision * 12.5 / 100);
        // $rider_logs->commision = $commision;

       // return view('admin.ridderlogs.index', compact('rider_logs'));
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
     * @param  \App\Ridderlogs  $ridderlogs
     * @return \Illuminate\Http\Response
     */
    public function show(Ridderlogs $ridderlogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ridderlogs  $ridderlogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Ridderlogs $ridderlogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ridderlogs  $ridderlogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ridderlogs $ridderlogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ridderlogs  $ridderlogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ridderlogs $ridderlogs)
    {
        //
    }
}
