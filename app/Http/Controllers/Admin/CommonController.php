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


class CommonController extends Controller
{

    public function ShowPdfFile($pdfFilePath)
    {
        try {
            $l_act_file_path = Crypt::decrypt($pdfFilePath);
            $storagePath = storage_path($l_act_file_path);
            if(file_exists($storagePath)){
                $mimeType = mime_content_type($storagePath);
                return response()->file($storagePath);
            }else{
                return view('error.fnf', compact('storagePath'));
            }          
        } catch (\Exception $e) {
            $e_method = "ShowPdfFile";
            return MyFuncs::Exception_error_handler($this->e_controller, $e_method, $e->getMessage());
        }            
    }
    
}

