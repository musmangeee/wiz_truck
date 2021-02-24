<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
                'menu_id'=>'required',

            ];

        $this->validate($request, $rules);
        $data = $request->all();
        //dd(base64_decode($request->image));
        $path = 'business_product\image_' . time() . '.png';
        $file_name = 'image_' . time() . '.png';
        //$file->move('public\business_product', $name);
        //base64_decode($request->image)->move('public\business_product', $name);
        Storage::disk('public')->put($path, base64_decode($request->image));
        $base64_image =$request->image; //your base64 encoded data
       $data['image'] = $file_name;
       
        // $decoder = base64_decode($base64_image);
            
        //   if (dd(preg_match('/^data:image\/(\w+);base64,/', $base64_image))) {
        //     $d_data = substr($base64_image, strpos($base64_image, ',') + 1);
            
        //     $d_data = base64_decode($d_data);
           
        //  0   Storage::disk('local')->put($base64_image, $d_data);
            
        // }
        
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
    public function update(Request $request, $id)
    { 


        $product = Product::findOrFail($id);
        
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'menu_id'=>'required',
        ];
        $data = $request->all();
        if ($file = $request->image) {

        $this->validate($request, $rules);
       
     
        $path = 'business_product\image_' . time() . '.png';
        $file_name = 'image_' . time() . '.png';

        Storage::disk('public')->put($path, base64_decode($request->image));
        $base64_image =$request->image; //your base64 encoded data
        $data['image'] = $file_name;

        }
        
        $product->update($data);
         
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
