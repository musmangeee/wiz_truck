<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessDocumentController extends Controller
{
    public function store(Request $request, BusinessDocument $businessDocument)
    {
       
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

            $business_document = BusinessDocument::insertGetId($insert);
            // $this->save_image($request, 'license', $businessDocument, 'documents');
            // $this->save_image($request, 'liability_insurance', $businessDocument, 'documents');
            // $this->save_image($request, 'health_permit', $businessDocument, 'documents');
            // $this->save_image($request, 'void_check', $businessDocument, 'documents');
            // $this->save_image($request, 'w9_form', $businessDocument, 'documents');

            return response()->json([
                
                'status' =>true,
               'message' =>'Business Document created Successfully!!!!!!!',
               'event' =>$business_document,
            ]);
    
        
    }
}
