<?php

namespace App\Http\Controllers;

use File;
use App\Menu;
use App\Product;
use Auth;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
        if(Auth::user()->business->menu==null){

            return redirect()->back()->with('success','First Menu Add then You can Create Product');

        }
      //  dd(Auth::user()->business->menu);
        $menus = Auth::user()->business->menu;

        $products = [];
        foreach($menus as $menu)    {
            foreach(Product::where('menu_id', $menu->id)->get() as $p)    {
           $products[] =$p;
         }
        }
       
 
        //$products = Auth::user()->business->menu->products;
         return view('business.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business_id = Auth::user()->business->id;
      
        $menus = Menu::where('business_id',$business_id)->get();

        
        return view('business.product.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->all();
          //dd($input);

        $this->validate($request, [
            'name' => 'required',
        ]);

       
        
        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('public\business_product', $name);
            $input['image'] = $name;
        }

        Product::create($input);



        
        // $products = new Product;
        // $products->image = $imagename;
        // $products->name = $request->name;
        // $products->description = $request->description;
        // $products->price = $request->price;
        // $products->discount = $request->discount;
        // $products->menu_id = $request->menu_id;
        // $products->save();
     
// $feature = $request -> image ; 
//         $feature_new_name = time(). $feature -> getClientOriginalName();
//         $feature -> move('uploads/products' , $feature_new_name);

//         $products = Product::create($input , 
//         ['image' => 'uploads/products/' . $feature_new_name]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
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
        $product = Product::findOrFail($id);
        return view('business.product.edit', compact('product'));
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

        $this->validate($request, [
            'name' => 'required',
        ]);
        
        if ($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('public\business_product', $name);
            $input['image'] = $name;
            
        }
             $product = Product::find($id);
             $product->update($input);
        
        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }
   


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
