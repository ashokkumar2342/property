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


class ProjectsController extends Controller
{

    public function index()
    {
        $rs_records = DB::select(DB::raw("SELECT `p`.`id`, `p`.`name`, `p`.`license_no`, `p`.`email_id`, `p`.`mobile_no`, `p`.`latitude`, `p`.`longitude`, date_format(`p`.`start_date`, '%d-%m-%Y') as `s_date`, date_format(`p`.`end_date`, '%d-%m-%Y') as `e_date`, `dt`.`name` as `d_name`, `p`.`file_path` from `projects` `p` inner join `document_types` `dt` on `dt`.`id` = `p`.`document_id` order by `name`;"));
        return view('admin.projects.index', compact('rs_records'));
    }

    public function addform($id)
    {
        $rec_id = intval(Crypt::decrypt($id));
        $rs_documents = DB::select(DB::raw("SELECT `id`, `name` from `document_types`;"));
        $rs_records = DB::select(DB::raw("SELECT * from `projects` where `id` = $rec_id limit 1;"));
        $rs_records = reset($rs_records);
        return view('admin.projects.add_form',compact('rs_records', 'rec_id', 'rs_documents'));
    }

    public function store(Request $request, $rec_id)
    {
        $rules=[
            'name' => 'required',
            'license_no' => 'required',
        ];

        $customMessages = [
            'name.required'=> 'Projects Name is Required',
            'license_no.required'=> 'License No. is Required',
        ];

        $validator = Validator::make($request->all(),$rules, $customMessages);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $rec_id =Crypt::decrypt($rec_id);
        $name = MyFuncs::removeSpacialChr($request->name);
        $license_no = MyFuncs::removeSpacialChr($request->license_no);
        $email_id = MyFuncs::removeSpacialChr($request->email_id);
        $mobile_no = MyFuncs::removeSpacialChr($request->mobile_no);
        $latitude = MyFuncs::removeSpacialChr($request->latitude);
        $longitude = MyFuncs::removeSpacialChr($request->longitude);
        $start_date = MyFuncs::removeSpacialChr($request->start_date);
        $end_date = MyFuncs::removeSpacialChr($request->end_date);
        $document_id = intval(MyFuncs::removeSpacialChr($request->document_id));
        $user_id = MyFuncs::getUserId();

        if ($rec_id == 0) {
            $final_path_attachment = '';
            $rs_update = DB::select(DB::raw("INSERT into `projects`(`user_id`,`name`, `license_no`, `email_id`, `mobile_no`, `latitude`, `longitude`, `start_date`, `end_date`, `document_id`, `file_path`) values('$user_id','$name', '$license_no', '$email_id', '$mobile_no', '$latitude', '$longitude', '$start_date', '$end_date', '$document_id', '$final_path_attachment');"));
            if ($request->hasFile('attachment')){
                $rs_fatch = DB::select(DB::raw("SELECT max(`id`) as max_id from `projects`;"));
                $rec_id = $rs_fatch[0]->max_id;
                $attachment = $request->attachment;
                $folder_path = "/projects/";
                $filename = $rec_id.'.pdf';
                $attachment->storeAs($folder_path,$filename);
                $final_path_attachment = $folder_path.'/'.$filename;
                $rs_update = DB::select(DB::raw("UPDATE `projects` set `file_path` = '$final_path_attachment' where `id` = $rec_id limit 1;"));
            }  
            
            $response=['status'=>1,'msg'=>'Submited Successfully'];
            return response()->json($response);
        }else{
            if ($request->hasFile('attachment')){
                $attachment = $request->attachment;
                $folder_path = "/projects/";
                $filename = $rec_id.'.pdf';
                $attachment->storeAs($folder_path,$filename);
                $final_path_attachment = $folder_path.'/'.$filename;
            }
            
            $rs_save = DB::select(DB::raw("UPDATE `projects` set `name` = '$name', `license_no` = '$license_no', `email_id` = '$email_id', `mobile_no` = '$mobile_no', `latitude` = '$latitude', `longitude` = '$longitude', `start_date` = '$start_date' , `end_date` = '$end_date' , `document_id` = '$document_id' where `id` = $rec_id limit 1;"));

            $response=['status'=>1,'msg'=>'Updated Successfully'];
            return response()->json($response);
        }
         
    }

    

    public function delete($id)
    {     
        $id = intval(Crypt::decrypt($id));
        $rs_update = DB::select(DB::raw("DELETE from `projects` where `id` = $id limit 1;"));
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }
    
}

