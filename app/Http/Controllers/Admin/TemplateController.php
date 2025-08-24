<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\MyFuncs;
use DB;

class TemplateController extends Controller
{
    public function refreshCaptcha()
    {  
      return  captcha_img('flat');
    }

    public function admission(Request $request)
    { 
        // return $request;
      $this->validate($request, [
        // 'email' => 'required', 
        // 'password' => 'required',
        // 'captcha' => 'required|captcha' 
      ]);
      
      return Redirect()->back()->with(['message'=>'Submit Successfully','class'=>'success']); 
    }

    public function messageform(Request $request)
    { 
      $this->validate($request, [
        'name' => 'required', 
        'email_id' => 'required',
        'mobile_no' => 'required',
        'subject' => 'required',
      ]);
      $name = MyFuncs::removeSpacialChr($request->name);
      $email_id = MyFuncs::removeSpacialChr($request->email_id);
      $mobile_no = MyFuncs::removeSpacialChr($request->mobile_no);
      $subject = MyFuncs::removeSpacialChr($request->subject);
      $message = MyFuncs::removeSpacialChr($request->message);
      $rs_save = DB::select(DB::raw("insert into `message_form` (`name`, `email_id`, `mobile_no`, `subject`, `message`, `date_time`) values ('$name', '$email_id', '$mobile_no', '$subject', '$message', now());"));
      return Redirect()->back()->with(['message'=>'Submit Successfully','class'=>'success']); 
    }

//-----------------------------------//
    public function index($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.index', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.index', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.index', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.index', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

//about
    public function about($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.about.about', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.about.about', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.about.about', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.about.about', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

    //about
    public function project($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.project.project', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.about.about', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.about.about', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.about.about', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

//gallery
    public function gallery($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.gallery.gallery', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.gallery.gallery', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.gallery.gallery', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.gallery.gallery', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

//teacher
    public function teacher($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_1.teacher.teacher', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.teacher.teacher', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.teacher.teacher', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.teacher.teacher', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }
//events
    public function events($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_1.events.events', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.events.events', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.events.events', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.events.events', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

//events
    public function eventsDetail($temp_type, $lang_type, $rec_id)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $rec_id = intval($rec_id);
        $result_rs = DB::select(DB::raw("SELECT `f`.`id`, `f`.`image`, `f`.`title`, `f`.`title_l`, `f`.`sub_title`, `f`.`sub_title_l`, `f`.`description`, `f`.`description_l`, `f`.`date`, `f`.`time`, `it`.`icon_color` as`text_color` from `event` `f` left join `icon_type` `it` on `it`.`id` = `f`.`text_color` where `f`.`id` = $rec_id order by `f`.`display_order`, `f`.`id` limit 1;"));
        $rs_events_val = reset($result_rs);
        if ($l_temp_type == 1) {
            return view('temp_1.events.event_detail', compact('l_lang_type', 'rs_events_val'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.events.event_detail', compact('l_lang_type', 'rs_events_val'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.events.event_detail', compact('l_lang_type', 'rs_events_val'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.events.event_detail', compact('l_lang_type', 'rs_events_val'));
        }else{
            return 'something went wrong';
        }
    }
//contact
    public function contact($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.contact.contact_us', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.contact.contact_us', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.contact.contact_us', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.contact.contact_us', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }
    //registration
    public function registration($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        if ($l_temp_type == 1) {
            return view('temp_5.registration.registration', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.contact.contact_us', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.contact.contact_us', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.contact.contact_us', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }
    
//calendar
    public function calendar($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        if ($l_temp_type == 1) {
            return view('temp_1.calendar.calendar', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.calendar.calendar', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.calendar.calendar', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.calendar.calendar', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

//CBSEMandatoryDisclosure
    public function CBSEMandatoryDisclosure($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $rs_records = DB::select(DB::raw("SELECT * from `mandatory_disclosure` order by `display_order`;"));
        if ($l_temp_type == 1) {
            return view('temp_1.CBSEMandatoryDisclosure.disclosure', compact('l_lang_type', 'rs_records'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.CBSEMandatoryDisclosure.disclosure', compact('l_lang_type', 'rs_records'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.CBSEMandatoryDisclosure.disclosure', compact('l_lang_type', 'rs_records'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.CBSEMandatoryDisclosure.disclosure', compact('l_lang_type', 'rs_records'));
        }else{
            return 'something went wrong';
        }
    }

    public function morePage($temp_type, $lang_type, $rec_id)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $rec_id = intval($rec_id);
        $result_rs = DB::select(DB::raw("SELECT * from `more_page` where `id` = $rec_id limit 1;"));  
        if ($l_temp_type == 1) {
            return view('temp_1.morePage.more_page', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.morePage.more_page', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.morePage.more_page', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.morePage.more_page', compact('l_lang_type', 'result_rs'));
        }else{
            return 'something went wrong';
        }
    }

    public function whosMessage($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $result_rs = DB::select(DB::raw("SELECT * from `whos_who`;"));
        if ($l_temp_type == 1) {
            return view('temp_1.whos_who.message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.whos_who.message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.whos_who.message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.whos_who.message', compact('l_lang_type', 'result_rs'));
        }else{
            return 'something went wrong';
        }
    }

    public function singalMessage($temp_type, $lang_type, $rec_id)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $rec_id = intval($rec_id);
        $result_rs = DB::select(DB::raw("SELECT * from `whos_who` where `id` = $rec_id limit 1;"));  
        if ($l_temp_type == 1) {
            return view('temp_1.whos_who.singal_message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.whos_who.singal_message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.whos_who.singal_message', compact('l_lang_type', 'result_rs'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.whos_who.singal_message', compact('l_lang_type', 'result_rs'));
        }else{
            return 'something went wrong';
        }
    }

    public function features($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        if ($l_temp_type == 1) {
            return view('temp_1.features.features', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.features.features', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.features.features', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.features.features', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

    public function singalFeatures($temp_type, $lang_type, $rec_id)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        $rs_features_tile = DB::select(DB::raw("SELECT * from `features` where  `id` =$rec_id limit 1;"));
        $result_rs = DB::select(DB::raw("SELECT * from `features_detail` where  `features_id` =$rec_id;"));
        if ($l_temp_type == 1) {
            return view('temp_1.features.singal_features', compact('l_lang_type', 'rs_features_tile', 'result_rs'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.features.singal_features', compact('l_lang_type', 'rs_features_tile', 'result_rs'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.features.singal_features', compact('l_lang_type', 'rs_features_tile', 'result_rs'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.features.singal_features', compact('l_lang_type', 'rs_features_tile', 'result_rs'));
        }else{
            return 'something went wrong';
        }
    }

    public function infrastructure($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        if ($l_temp_type == 1) {
            return view('temp_1.infrastructure.infrastructure', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.infrastructure.infrastructure', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.infrastructure.infrastructure', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.infrastructure.infrastructure', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

    public function notice($temp_type, $lang_type)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;
        if ($l_temp_type == 1) {
            return view('temp_1.notice.notice', compact('l_lang_type'));
        }elseif ($l_temp_type == 2) {
            return view('temp_2.notice.notice', compact('l_lang_type'));
        }elseif ($l_temp_type == 3) {
            return view('temp_3.notice.notice', compact('l_lang_type'));
        }elseif ($l_temp_type == 4) {
            return view('temp_4.notice.notice', compact('l_lang_type'));
        }else{
            return 'something went wrong';
        }
    }

}
