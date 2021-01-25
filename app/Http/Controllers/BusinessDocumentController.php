<?php

namespace App\Http\Controllers;

use App\BusinessDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('business.documents');
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
            request()->validate([
                'license'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
                'liability_insurance'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
                'health_permit'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
                'void_check'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
                'w9_form'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
            ]);




            if ($files = $request->file('license')) {
                $destinationPath = 'public/images/documents'; // upload path
                $extension = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $extension);
                $insert['license'] = "$extension";
            }
            if ($files = $request->file('liability_insurance')) {
                $destinationPath = 'public/images/documents'; // upload path
                $extension = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $extension);
                $insert['liability_insurance'] = "$extension";
            }
            if ($files = $request->file('health_permit')) {
                $destinationPath = 'public/images/documents'; // upload path
                $extension = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $extension);
                $insert['health_permit'] = "$extension";
            }
            if ($files = $request->file('void_check')) {
                $destinationPath = 'public/images/documents'; // upload path
                $extension = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $extension);
                $insert['void_check'] = "$extension";
            }
            if ($files = $request->file('w9_form')) {
                $destinationPath = 'public/images/documents'; // upload path
                $extension = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $extension);
                $insert['w9_form'] = "$extension";
            }

            $insert['business_id'] = Auth::user()->business->id;
            $insert['license'] = 1;
            $insert['liability_insurance_status'] = 1;
            $insert['health_permit_status'] = 1;
            $insert['void_check_status'] = 1;
            $insert['w9_form_status'] = 1;

            BusinessDocument::insertGetId($insert);
            // $this->save_image($request, 'license', $businessDocument, 'documents');
            // $this->save_image($request, 'liability_insurance', $businessDocument, 'documents');
            // $this->save_image($request, 'health_permit', $businessDocument, 'documents');
            // $this->save_image($request, 'void_check', $businessDocument, 'documents');
            // $this->save_image($request, 'w9_form', $businessDocument, 'documents');

            return redirect()->route('home');
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

    public function save_image($request, $image, $obj, $image_path)
    {
        try {
            if ($request->hasFile($image)) {
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_image($request, $image, $obj, $image_path)
    {
        try {
            if ($check = $request->hasFile($image)) {
                $this->delete_image($obj, $image_path, $image);
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
