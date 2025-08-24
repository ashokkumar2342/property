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


class SchoolDetailsController extends Controller
{

    public function index()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `school_details` limit 1"));
        return view('admin.schooldetail.index', compact('rs_records'));
    }

    public function store(Request $request)
    {  
        $rs_fatch = DB::select(DB::raw("SELECT * from `school_details` limit 1"));
        $imageName = $rs_fatch[0]->image;
        $logoName = $rs_fatch[0]->logo;
        $iconName = $rs_fatch[0]->url_icon;
        if ($request->hasFile('image')) {
            $imageFile = $request->image;
            $imageName = time().'.jpg';
            $imageFile->move(public_path('school'),$imageName);
            $imageName = 'school/'.time().'.jpg';
        }
        if ($request->hasFile('logo')) {
            $imageFile = $request->logo;
            $logoName = time().'.png';
            $imageFile->move(public_path('logo'),$logoName);
            $logoName = 'logo/'.time().'.png';
        }
        if ($request->hasFile('url_icon')) {
            $imageFile = $request->url_icon;
            $iconName = time().'.png';
            $imageFile->move(public_path('url_icon'),$iconName);
            $iconName = 'url_icon/'.time().'.png';
        }
        $name = MyFuncs::removeSpacialChr($request->name);
        $name_l = MyFuncs::removeSpacialChr($request->name_l);
        $mobile_no = MyFuncs::removeSpacialChr($request->mobile_no);
        $contact_no = MyFuncs::removeSpacialChr($request->contact_no);
        $email = MyFuncs::removeSpacialChr($request->email);
        $address = MyFuncs::removeSpacialChr($request->address);
        $address_l = MyFuncs::removeSpacialChr($request->address_l);
        $facebook_link = MyFuncs::removeSpacialChr($request->facebook_link);
        $twitter_link = MyFuncs::removeSpacialChr($request->twitter_link);
        $youtube_link = MyFuncs::removeSpacialChr($request->youtube_link);
        $opening_time = MyFuncs::removeSpacialChr($request->opening_time);
        $opening_time_l = MyFuncs::removeSpacialChr($request->opening_time_l);
        $footer_description = MyFuncs::removeSpacialChr($request->footer_description);
        $footer_description_l = MyFuncs::removeSpacialChr($request->footer_description_l);
        
        $rs_update = DB::select(DB::raw("UPDATE `school_details` set `name` = '$name', `name_l` = '$name_l', `mobile` = '$mobile_no', `contact` = '$contact_no', `email` = '$email', `address` = '$address', `address_l` = '$address_l', `image` = '$imageName', `logo` = '$logoName', `url_icon` = '$iconName', `facebook_link` = '$facebook_link', `twitter_link` = '$twitter_link', `youtube_link` = '$youtube_link', `opening_time` = '$opening_time', `opening_time_l` = '$opening_time_l', `footer_description` = '$footer_description', `footer_description_l` = '$footer_description_l';"));

        WebHelper::db_update_date_time(); 
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    
    
}

