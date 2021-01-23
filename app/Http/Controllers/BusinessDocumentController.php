<?php

namespace App\Http\Controllers;

use App\BusinessDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BusinessDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, BusinessDocument $businessDocument)
    {
        try {

            $this->save_image($request, 'banner', $businessDocument, 'sliders', 300, 300);
            $this->save_image($request, 'image', $businessDocument, 'sliders', 300, 300);
            $this->save_image($request, 'image', $businessDocument, 'sliders', 300, 300);
            $this->save_image($request, 'image', $businessDocument, 'sliders', 300, 300);
            $this->save_image($request, 'image', $businessDocument, 'sliders', 300, 300);
            $businessDocument->save();
            return redirect()->route('sliders.index')->with('success', 'Document submitted');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessDocument  $businessDocument
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDocument $businessDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessDocument  $businessDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessDocument $businessDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessDocument  $businessDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessDocument $businessDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessDocument  $businessDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessDocument $businessDocument)
    {
        //
    }

    public function delete_image($obj, $image_path, $image_name)
    {
        try {
            $image = public_path('/images/' . $image_path . '/' . $obj->$image_name);
            if (File::exists($image)) {
                File::delete($image);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function save_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($request->hasFile($image)) {
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($check = $request->hasFile($image)) {
                $this->delete_image($obj, $image_path, $image);
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
