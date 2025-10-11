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


class RegistrationController extends Controller
{

    public function index()
    {
        $user_id = MyFuncs::getUserId();
        $rs_records = DB::select(DB::raw("SELECT `pr`.`id`, `p`.`name`, `pr`.`applicant_name`, `pr`.`father_name_husband_name`, `pr`.`date_of_birth`, `pr`.`phone_number`, `pr`.`email`, `pr`.`reference_code`, `pr`.`aadhar_card_number`, `pr`.`pan_card_number`, `pr`.`address`, `pr`.`city`, `pr`.`state`, `pr`.`pincode` from `property_registration` `pr` inner join `projects` `p` on `p`.`id` = `pr`.`project_id` where `pr`.`user_id` = $user_id;"));
        return view('admin.registration.index', compact('rs_records'));
    }

    public function addform($id)
    {
        $rec_id = intval(Crypt::decrypt($id));
        $rs_projects = DB::select(DB::raw("SELECT `id`, `name` from `projects`;"));
        $rs_records = DB::select(DB::raw("SELECT * from `property_registration` where `id` = $rec_id limit 1;"));
        $rs_records = reset($rs_records);
        return view('admin.registration.add_form',compact('rs_records', 'rec_id', 'rs_projects'));
    }

    public function store(Request $request, $rec_id)
    {
        $rules=[
            'applicant_name' => 'required|string|max:255',
            'father_name_husband_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'reference_code' => 'nullable|string|max:50',
            'aadhar_card_number' => 'required|string|max:20',
            'pan_card_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'quota' => 'required|string|max:50',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        // $rec_id = Crypt::decrypt($rec_id);
        $user_id = MyFuncs::getUserId();
        $project_id = intval(MyFuncs::removeSpacialChr($request->project_id));
        $applicant_name = MyFuncs::removeSpacialChr($request->applicant_name);
        $father_name_husband_name = MyFuncs::removeSpacialChr($request->father_name_husband_name);
        $date_of_birth = MyFuncs::removeSpacialChr($request->date_of_birth);
        $phone_number = MyFuncs::removeSpacialChr($request->phone_number);
        $email = MyFuncs::removeSpacialChr($request->email);
        $reference_code = MyFuncs::removeSpacialChr($request->reference_code);
        $aadhar_card_number = MyFuncs::removeSpacialChr($request->aadhar_card_number);
        $pan_card_number = MyFuncs::removeSpacialChr($request->pan_card_number);
        $address = MyFuncs::removeSpacialChr($request->address);
        $city = MyFuncs::removeSpacialChr($request->city);
        $state = MyFuncs::removeSpacialChr($request->state);
        $pincode = MyFuncs::removeSpacialChr($request->pincode);
        $quota = MyFuncs::removeSpacialChr($request->quota);

        DB::insert("
            INSERT INTO property_registration 
            (user_id, project_id, applicant_name, father_name_husband_name, date_of_birth, phone_number, email, reference_code, aadhar_card_number, pan_card_number, address, city, state, pincode, quota) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ", [
            $user_id,
            $project_id,
            $applicant_name,
            $father_name_husband_name,
            $date_of_birth,
            $phone_number,
            $email,
            $reference_code,
            $aadhar_card_number,
            $pan_card_number,
            $address,
            $city,
            $state,
            $pincode,
            $quota,
        ]);

        $response = ['status' => 1, 'msg' => 'Submitted Successfully'];
        return response()->json($response);
         
    }
    
}

