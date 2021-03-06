<?php

namespace App\Http\Controllers\Api;

use App\Menu;
use Illuminate\Support\Str;
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
            'name' => 'required',
            'business_id'=>'required',
        ]);
       if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        if(Menu::where(['business_id' => $request->business_id ,'name'=>$request->name])->first())
        {
            return response()->json(['error' => 'menu already exists']);
        }
        $data = $request->all();
        $data['name'] = Str::upper($data['name']);
       
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
    public function update(Request $request, $id)
    {
        
        $menu = Menu::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            
        ]);
       if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
       
        
        $menu['name'] = Str::upper($request['name']);
        $menu->save();
        return response()->json([
            'status' => 200,
            'message' => 'menu updated successfully',
            'data' => $menu,
  
        ]);
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
