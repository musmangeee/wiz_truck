<?php

namespace App\Http\Controllers\Api;


use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $category = Category::all();
    
        return response()->json($category, 200);
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
            'image'=>'required',
        ]);
       
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
    
        $input = $request->all();
       

        if ($file = $request->file('image')) {
            
            $name = time() . $file->getClientOriginalName();

            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('business_category/' .$name));
            // $file->move('public\business_product', $name);
            $input['image'] = $name;
        }

        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $key => $value) {
        //         $cover = $value;
        //         $extension = $cover->getClientOriginalExtension();
        //         $imagename = 'category_' . strtolower($request->name) . '.' . $extension;
        //         \Illuminate\Support\Facades\Storage::disk('public', 'categories')->put($imagename, File::get($cover));
        //         $categories->image = $imagename;
        //     }
        // }
        $categories = Category::create($input);
        // $categories->save($input);

        return response()->json([
            'status' =>true,
            'message' => 'Categories updated Successfully',
            'profile' =>$categories,
       
     ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
       
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/' . $filename);
            // dd($location);
            Image::make($image)->resize(130, 130)->save($location);
            $oldfilename = $businessCategory->image;
            $businessCategory->image = $filename;
            Storage::delete($oldfilename);
        }

        $category->save();
        

        return response()->json($category, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' =>true,
            'message' => 'Successfully Deleted!',
            'category' => $category,
            
        ]);
    }
}
