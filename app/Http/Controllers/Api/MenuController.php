<?php

namespace App\Http\Controllers\Api;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::with('products')->get();
        return response()->json($menu, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique',
            'business_id'=>'required',
        ]);
       
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

       
        $data = $request->all();
        $menus = Menu::create($data);
        return response()->json($menus, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->fill($request->only([
            'name',
        ]));
        if ($menu->isClean()) {
            return response()->json(['error' => 'You need to specify any different value to update'], 422);
        }
        $menu->save();
        return response()->json($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json($menu);
    }
}
