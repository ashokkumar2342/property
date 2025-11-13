<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\BlocksMc;
use App\Model\District;
use App\Model\Village;
use App\Student;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helper\MyFuncs;
class LoginController extends Controller
{
/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/

use AuthenticatesUsers;

/**
* Where to redirect users after login.
*
* @var string
*/

protected $redirectTo = '/admin/dashboard';

/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
  $this->middleware('admin.guest')->except('logout');
}

public function login()
{
  return view('admin.login');
}

public function loginwithotp()
{
  return view('temp_5.registration.login');
}

public function loginPost(Request $request)
{ 
    // return $request;
  $this->validate($request, [
    'email' => 'required', 
    'password' => 'required',
    'captcha' => 'required|captcha',
  ]);
  $admins = Admin::where('email',$request->email)->first();
  $credentials = [
    'email' => $request['email'],
    'password' => $request['password'],
    'status' => 1,
  ]; 
  if(auth()->guard('admin')->attempt($credentials)) {
    if (Auth::guard('admin')->user()->user_type==1) {
      return redirect()->route('admin.dashboard');
    }else{
      return redirect()->route('admin.dashboard');
    }

  } 
  return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']); 
}

public function userloginPost(Request $request)
{
    $request->validate([
        'mobile' => 'required|digits:10',
        'captcha' => 'required|captcha',
    ]);

    // Generate 6-digit OTP
    $otp = rand(100000, 999999);

    // Check if admin already exists
    $admin = Admin::where('mobile', $request->mobile)->first();

    if (!$admin) {
        // Create new admin if not exist
        $admin = Admin::create([
            'first_name' => 'User',
            'last_name' => substr($request->mobile, -4),
            'mobile' => $request->mobile,
            'otp' => $otp,
            'status' => 0,
            'role_id' => 3,
            'password' => Hash::make($otp), // not used, but required
            'password_plain' => $otp,
        ]);
    } else {
        // Update existing user's OTP
        $admin->update(['otp' => $otp]);
    }

    // Send OTP via SMS (You can integrate MSG91/Fast2SMS API here)
    // Example placeholder:
    // SmsHelper::send($request->mobile, "Your OTP is {$otp}");

    // For testing, show it in session
    MyFuncs::whatsappotp($request->mobile,$otp);
    return redirect()->route('admin.otp.form',Crypt::encrypt($request->mobile));
    
       
}

public function otpForm(Request $request,$mobile)
{
  return view('temp_5.registration.otp_verify', ['mobile' => $mobile])
        ->with('success', "OTP sent to your mobile.");
}

public function verifyOtp(Request $request,$mobile)
{
    $request->validate([
        'otp' => 'required|digits:6',
        'captcha' => 'required|captcha',
    ]);
    $mobile=Crypt::decrypt($mobile);
    $admin = Admin::where('mobile',$mobile)
                  ->where('otp', $request->otp)
                  ->first();

    if (!$admin) {
        return back()->with('success', 'Invalid OTP or mobile number.');
    }

    // Login the user
    Auth::guard('admin')->login($admin);


    // Clear OTP after use
    $admin->update(['otp' => null, 'login_status' => 1, 'login_time' => now()]);

    return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
}





// Logout method with guard logout for admin only
public function logout()
{
  $this->guard()->logout();
  $rs_fatch = DB::select(DB::raw("SELECT * from `template_type` limit 1"));
  return redirect()->route('template.index',[$rs_fatch[0]->temp_type,$rs_fatch[0]->lang_type]);
}

// defining auth  guard
protected function guard()
{
  return Auth::guard('admin');
}
public function forgetPassword()
{
  return view('admin.auth.forget_password');
}
public function forgetPasswordSendLink(Request $request)
{
  $AppUsers=new Admin();
  $u_detail=$AppUsers->getdetailbyemail($request->email);
  $up_u=array();
  $up_u['token'] = str_random(64);        
  $AppUsers->updateuserdetail($up_u,$u_detail->user_id);      
  $up_u['name']=$u_detail->name;
  $up_u['email']=$u_detail->email;
  $user=$u_detail->email;
// $up_u['otp']=$up_u['otp'];
  $up_u['logo']=url("img/logo.png");
  $up_u['link']=url("passwordreset/reset/".$up_u['token']);


  Mail::send('emails.forgotPassword', $up_u, function($message){
    $message->to('ashok@gmail.com')->subject('Password Reset');
  });

// $mailHelper = new MailHelper();
// $mailHelper->forgetmail($request->email); 
  $response=array();
  $response['status']=1;
  $response['msg']='Reset Link Sent successfully';
  return $response;

}

public function refreshCaptcha()
  {  
    return  captcha_img('math');
  }

}
