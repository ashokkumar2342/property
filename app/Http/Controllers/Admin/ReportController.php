<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\createToken;
use Storage;
use DB;
class ReportController extends Controller
{
   
    public function index()
    {  
        return view('admin.report.index'); 
    }

    public function show(Request $request)
    {  
        try {
            $rules=[ 
                'from_date' => 'required|date',
                'to_date' => 'required|date',
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            }
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $rs_result =DB::select(DB::raw("select * from `message_form` where `date_time` >= '$from_date' and `date_time` <= '$to_date';"));
            $response['data'] = view('admin.report.show',compact('rs_result'))->render();
            $response['status'] = 1;
            return response()->json($response);
        }catch (Exception $e){}
    }

    public function Resolved($id)
    {
        $id = Crypt::decrypt($id);
        $rs_save = DB::select(DB::raw("update `support` set `status` = 1 where `id` = $id limit 1;"));
    }   
}
