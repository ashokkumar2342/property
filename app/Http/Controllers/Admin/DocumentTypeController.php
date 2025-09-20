<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Helper\MyFuncs;
use App\Helper\WebHelper;


class DocumentTypeController extends Controller
{

    public function index()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `document_types` order by `name`;"));
        return view('admin.documentType.index', compact('rs_records'));
    }

    public function edit($id)
    {
        $id = intval(Crypt::decrypt($id));
        $document = DB::select(DB::raw("SELECT * from `document_types` where `id` = $id limit 1;"));
        $document = reset($document);
        return view('admin.documentType.edit',compact('document', 'id'));
    }

    public function store(Request $request,$id)
    {
        $rules=[
            'documentType' => 'required|max:50',
            'code' => 'required|max:5',
        ];

        $customMessages = [
            'documentType.required'=> 'Document Type Name is Required',
            'documentType.max'=> 'Document Type Name Should be Maximum of 50 Character',

            'code.required'=> 'Document Type Code is Required',
            'code.max'=> 'Document Type Code Should be Maximum of 5 Character',
        ];

        $validator = Validator::make($request->all(),$rules, $customMessages);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

        $id = intval(Crypt::decrypt($id));
        $userid = MyFuncs::getUserId();
        $document_name = substr(MyFuncs::removeSpacialChr($request->documentType), 0, 50);
        $document_code = substr(MyFuncs::removeSpacialChr($request->code), 0, 5);

        $rs_update = DB::select(DB::raw("call `up_save_document_type`($id, '$document_name', '$document_code', $userid);"));

        $response=['status'=>$rs_update[0]->s_status,'msg'=>$rs_update[0]->result];
        return response()->json($response);
    }

    public function delete($id)
    {     
        $id = intval(Crypt::decrypt($id));
        $rs_update = DB::select(DB::raw("DELETE from `document_types` where `id` = $id limit 1;"));
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }
    
}

