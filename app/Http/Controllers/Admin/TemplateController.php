<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\MyFuncs;
use DB;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;

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
            $result_rs = DB::select(DB::raw("SELECT * FROM `projects`"));
            $states = DB::table('states')->orderBy('name')->get();

            $properties = DB::table('properties')
                ->leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.id')
                ->leftJoin('property_statuses', 'properties.status_id', '=', 'property_statuses.id')
                ->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('districts', 'properties.district_id', '=', 'districts.id')
                ->leftJoin('cities', 'properties.city_id', '=', 'cities.id')
                ->leftJoin('property_images', 'properties.id', '=', 'property_images.property_id')
                ->select(
                    'properties.*',
                    'property_types.name as property_type',
                    'property_statuses.name as property_status',
                    'states.name as state_name',
                    'districts.name as district_name',
                    'cities.name as city_name',
                    DB::raw('MAX(property_images.id) as last_image_id')
                )
                ->groupBy(
                    'properties.id',
                    'property_types.name',
                    'property_statuses.name',
                    'states.name',
                    'districts.name',
                    'cities.name'
                )
                ->orderByDesc('properties.id')
                ->get();

            // Fetch the image URLs for those last_image_id values
            foreach ($properties as $property) {
                $image = DB::table('property_images')->where('id', $property->last_image_id)->value('image_url');
                $property->image = $image;
            }

            return view('temp_5.index', compact('l_lang_type', 'result_rs', 'states', 'properties'));

        } elseif ($l_temp_type == 2) {
            return view('temp_2.index', compact('l_lang_type'));

        } elseif ($l_temp_type == 3) {
            return view('temp_3.index', compact('l_lang_type'));

        } elseif ($l_temp_type == 4) {
            return view('temp_4.index', compact('l_lang_type'));

        } else {
            return 'something went wrong';
        }
    }

    public function imageshow($id)
    {
        $image = \DB::table('property_images')->where('id', $id)->first();

        if (!$image) {
            abort(404, 'Image record not found.');
        }

        // Trim extra spaces/newlines
        $relativePath = trim($image->image_url);
        $path = storage_path('app/public/' . $relativePath);

        if (!file_exists($path)) {
            abort(404, 'Image file not found at path: ' . $path);
        }

        return response()->file($path, [
            'Content-Type' => mime_content_type($path)
        ]);
    }

  public function propertyDetails($id)
  {
      try {
          $propertyId = Crypt::decrypt($id);
      } catch (\Exception $e) {
          abort(404, 'Invalid property ID');
      }

      $l_lang_type = 1;

      $property = DB::table('properties')
          ->leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.id')
          ->leftJoin('property_statuses', 'properties.status_id', '=', 'property_statuses.id')
          ->select(
              'properties.*',
              'property_types.name as type_name',
              'property_statuses.name as status_name'
          )
          ->where('properties.id', $propertyId)
          ->first();

      if (!$property) {
          abort(404, 'Property not found');
      }

      $images = DB::table('property_images')
          ->where('property_id', $property->id)
          ->get();

      $similar = DB::table('properties')
          ->where('property_type_id', $property->property_type_id)
          ->where('id', '!=', $property->id)
          ->limit(3)
          ->get();

      return view('temp_5.property_details', compact('property', 'images', 'similar', 'l_lang_type'));
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
    public function registration($temp_type, $lang_type,$project_id)
    { 
        $l_temp_type = $temp_type;
        $l_lang_type = $lang_type;

        // $result_rs = DB::select(DB::raw("SELECT * FROM `projects`"));

        if ($l_temp_type == 1) {
            return view('temp_5.registration.registration', compact('l_lang_type','project_id'));
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

   public function registrationsubmit(Request $request)
    {
        $request->validate([
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
            'terms_conditions' => 'accepted',
        ]);

        DB::beginTransaction();

        try {
            // 1️⃣ Check if user already exists
            $user = Admin::where('email', $request->email)
                        ->orWhere('mobile', $request->phone_number)
                        ->first();

            if (!$user) {
                // 2️⃣ Create new user
                $user = Admin::create([
                    'first_name' => $request->applicant_name,
                    'last_name' => $request->applicant_name,
                    'email' => $request->email,
                    'mobile' => $request->phone_number,
                    'password' => Hash::make(rand(100000, 999999)), // random password
                    'role_id' => 3,
                    'status' => 1,
                ]);
            }

            // 3️⃣ Generate OTP
            $otp = rand(100000, 999999);

            // Optional: store OTP in user table for verification
            $user->update(['otp' => $otp]);

            // 4️⃣ Insert registration data
            $id = DB::table('property_registration')->insertGetId([
                'user_id' => $user->id,
                'project_id' => $request->project_id,
                'applicant_name' => $request->applicant_name,
                'father_name_husband_name' => $request->father_name_husband_name,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'reference_code' => $request->reference_code,
                'aadhar_card_number' => $request->aadhar_card_number,
                'pan_card_number' => $request->pan_card_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'quota' => $request->quota,
                'terms_conditions' => $request->terms_conditions ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            // 5️⃣ Store OTP and registration id in session (optional)
            session(['otp' => $otp, 'registration_id' => $id]);

                
            // $whatsapp_no = $request->phone_number
            // $otp = $otp;
            // $template_name = 'mobile_verification_1';
            // $language = 'en';
            // $mobile_no = "918210228581";
                
            // $api_url = "https://graph.facebook.com/v22.0/556373910894421/messages";
            // $access_token = 'EAAQXcnfzD88BOZBKxyWDrzKS6IJhaQXOvFW3TQHhQ6kedjRQFLI4wh4KhrJl6nSMIfzYJcHujItGVdze68ZCrydzmA9vetvfOgA0bgXePeRBgkgJuGLLAdfckkg9rNNrlSDjym9F9heqPJv9q3nh318zi2lI2hf2jffEMTLGdoG9gMocJuT2Y2rSH7gR62CwZDZD'; 

            // $body_parameters = [
            //     ['type' => 'text', 'text' => $otp],
            // ];

            // $data = [
            //     'messaging_product' => 'whatsapp',
            //     'recipient_type' => 'individual',
            //     'to' => $mobile_no,
            //     'type' => 'template',
            //     'template' => [
            //         'name' => $template_name,
            //         'language' => ['code' => $language],
            //         'components' => [
            //             [
            //                 'type' => 'body',
            //                 'parameters' => $body_parameters,
            //             ]
            //         ],
            //     ],
            // ];
                

            // // Initialize cURL session (same as before)
            // $ch = curl_init($api_url);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //     "Authorization: Bearer " . $access_token,
            //     "Content-Type: application/json",
            // ]);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            // // Execute the request and capture the response (same as before)
            // $response = curl_exec($ch);
            // if (curl_errno($ch)) {
            //     echo 'Error: ' . curl_error($ch);
            // } else {
            //     echo "Response: " . $response;
            // }
            // curl_close($ch);

                

            // 6️⃣ Redirect to OTP verify view
            return view('temp_5.registration.otp_verify', ['mobile' => Crypt::encrypt($request->phone_number)])
                ->with('success', "OTP sent to your mobile.");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

   // ✅ OTP Verify Page
   public function otpVerify($id)
   {
       // Get registration id from URL
       // You can also pass OTP from session to view
       $otp = session('otp');

       return view('temp_5.registration.otp_verify', [
           'id' => $id,
           'otp' => $otp // optional, just for testing
       ]);
   }

   // ✅ OTP Submit / Check
   public function otpCheck(Request $request)
   {
       $request->validate([
           'otp' => 'required|numeric',
       ]);

       if ($request->otp == 123456) {
           // OTP matched ✅
           // Mark registration as verified in DB if needed
           return redirect()->route('template.registration.list');
       }

       // OTP failed ❌
       return back()->withErrors(['otp' => 'Invalid OTP, please try again.']);
   }

    // ✅ OTP Submit / Check
   public function registrationlist(Request $request)
   {
      
        return redirect()->route('template.registration.list');
    }



}
