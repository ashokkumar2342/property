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
class DashboardController extends Controller
{
   
    public function dashboard()
    {  
        return view('admin.dashboard'); 
    }  

    
    
    
   
}
