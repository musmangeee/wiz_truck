<?php

namespace App\Http\Controllers\AdminUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessCategory;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\File;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessCategory = Category::all();
        return view('admin.category.index', compact('businessCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $businessCategory = new Category();

        $validator = validator::make($request->all(), [
            'name' => 'required|unique:categories|max:40',
            'icon' => 'required',
            // 'images' => 'required',
        ]);

        $businessCategory->name = $request->name;
        $name='';
        if ($file = $request->file('images')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('public\business_category', $name);
            $businessCategory->image = $name;
        }




        if ($validator->passes()) {

            $businessCategory->save();

            Session::flash('success', 'Category has been created successfully.');
            //Session::flash('info', 'Tenant will be recieving an email for the account confirmation  ');
            return redirect()->route('business_category.index');
        } else {

            Session::flash('error', 'Fields with * must be filled.');
            return redirect()->back()->withInput($request->input());
        }
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
        $businessCategory = Category::find($id);
        return view('admin.category.edit', compact('businessCategory'));
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
            $file->move('public\business_category', $name);
            $input['image'] = $name;
            
        }
             $category = Category::find($id);
             $category->update($input);
           
        return redirect()->back()
            ->with('success', 'Category updated successfully');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Category::where('id', $id)->delete($id);

        Session::flash('success', 'Category has been deleted successfully');
        return redirect()->route('business_category.index');
    }
}
