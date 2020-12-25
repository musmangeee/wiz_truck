<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $product = Product::all();
        
         return response()->json([
            'status' =>true,
            'message' => 'Successfully!',
            'product' => $product,
            
            
        ]);

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
        
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ];

        $this->validate($request, $rules);

       
        $data = $request->all();
        $name='';
        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('public\products', $name);
            $input['image'] = $name;
            
        }
        $products = Product::create($data);
        




       return response()->json([
            'status' =>true,
            'message' => 'Product Created Successfully!',
            'product' => $products,
            
            
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->only([
            'name',
            'description',
            'price',
            'discount',
        ]));
        if ($product->isClean()) {
            return response()->json(['error' => 'You need to specify any different value to update'], 422);
        }
        $product->save();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' =>true,
            'message' => 'Product Deleted Successfully!',
            'product' => $product,
            
            
        ]);
    }
}
