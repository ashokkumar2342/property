<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Helper\MyFuncs;
use App\Helper\WebHelper;

class WebGalleryController extends Controller
{
    public function bannerIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `web_gallery` order by `display_order`;"));
        $rs_school_detail = WebHelper::getSchoolDetail();
        return view('admin.webgallery.banner.index',compact('rs_records', 'rs_school_detail'));
    }

    public function bannerForm($rec_id)
    {
        $rec_id = Crypt::decrypt($rec_id);
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `web_gallery` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.banner.form',compact('rs_records'));
    }

    public function bannerStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('banner')) { 
                $imageFile = $request->banner;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('banner'),$imageName);
                $imageName = "banner/".time().'.jpg';
                $description = MyFuncs::removeSpacialChr($request->description);
                $description_l = MyFuncs::removeSpacialChr($request->description_l);
                $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
                $status = intval($request->status);
                $rs_save = DB::select(DB::raw("insert into `web_gallery` (`image`, `description`, `description_l`, `display_order`, `status`) values ('$imageName', '$description', '$description_l', '$display_order', '$status')")); 
            }  
        }else{
            if ($request->hasFile('banner')) { 
                $imageFile = $request->banner;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('banner'),$imageName);
                $imageName = "banner/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `web_gallery` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $status = intval($request->status);
            $rs_save = DB::select(DB::raw("UPDATE `web_gallery` set `image` = '$imageName', `description` = '$description', `description_l` = '$description_l', `display_order` = '$display_order', `status` = '$status' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function delete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `web_gallery` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `web_gallery` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//features

    public function featuresIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `features` order by `id`;"));
        return view('admin.webgallery.features.index',compact('rs_records'));
    }

    public function featuresForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        $rs_icon_type = DB::select(DB::raw("SELECT * from `icon_type`;"));
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `features` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.features.form',compact('rs_records', 'rs_icon_type'));
    }

    public function featuresStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $icon = intval($request->icon);
            $rs_save = DB::select(DB::raw("insert into `features` (`title`, `title_l`, `sub_title`, `sub_title_l`, `display_order`, `icon_id`) values ('$title', '$title_l', '$sub_title', '$sub_title_l', '$display_order', '$icon')"));
        }else{
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $icon = intval($request->icon);
            $rs_save = DB::select(DB::raw("UPDATE `features` set `title` = '$title', `title_l` = '$title_l', `sub_title` = '$sub_title', `sub_title_l` = '$sub_title_l', `display_order` = '$display_order', `icon_id` = '$icon' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function featuresDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_delete = DB::select(DB::raw("delete from `features` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//features-detail

    public function featuresDetailIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT `fd`.`id`, `f`.`title`, `fd`.`image`, `fd`.`description`, `fd`.`description_l` from `features_detail` `fd` inner join `features` `f` on `f`.`id` = `fd`.`features_id` order by `id`;"));
        return view('admin.webgallery.features.detail_index',compact('rs_records'));
    }

    public function featuresDetailForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        $rs_features = DB::select(DB::raw("SELECT * from `features`;"));
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `features_detail` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.features.detail_form',compact('rs_records', 'rs_features'));
    }

    public function featuresDetailStore(Request $request, $rec_id)
    {  
        $rules=[ 
          'features_id' => 'required',
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }

        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('featuresDetail'),$imageName);
                $imageName = "featuresDetail/".time().'.jpg';
                $features_id = intval($request->features_id);
                $description = MyFuncs::removeSpacialChr($request->description);
                $description_l = MyFuncs::removeSpacialChr($request->description_l);
                $rs_save = DB::select(DB::raw("insert into `features_detail` (`features_id`, `image`, `description`, `description_l`) values ($features_id, '$imageName', '$description', '$description_l')")); 
            }  
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('featuresDetail'),$imageName);
                $imageName = "featuresDetail/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `features_detail` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $features_id = intval($request->features_id);
            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);

            $rs_save = DB::select(DB::raw("UPDATE `features_detail` set `features_id` = $features_id, `image` = '$imageName', `description` = '$description', `description_l` = '$description_l' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function featuresDetailDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_delete = DB::select(DB::raw("delete from `features_detail` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//infrastructure

    public function infrastructureIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `infrastructure` order by `id`;"));
        return view('admin.webgallery.infrastructure.index',compact('rs_records'));
    }

    public function infrastructureForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        $rs_icon_type = DB::select(DB::raw("SELECT * from `icon_type`;"));
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `infrastructure` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.infrastructure.form',compact('rs_records', 'rs_icon_type'));
    }

    public function infrastructureStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('infrastructure'),$imageName);
                $imageName = "infrastructure/".time().'.jpg';
                $title = MyFuncs::removeSpacialChr($request->title);
                $title_l = MyFuncs::removeSpacialChr($request->title_l);
                $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
                $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
                $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
                $text_color_l = intval($request->text_color);
                $rs_save = DB::select(DB::raw("insert into `infrastructure` (`image`, `title`, `title_l`, `sub_title`, `sub_title_l`, `display_order`, `text_color`) values ('$imageName', '$title', '$title_l', '$sub_title', '$sub_title_l', '$display_order', '$text_color_l')"));
            }
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('infrastructure'),$imageName);
                $imageName = "infrastructure/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `infrastructure` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $text_color_l = intval($request->text_color);
            $rs_save = DB::select(DB::raw("UPDATE `infrastructure` set `image` = '$imageName', `title` = '$title', `title_l` = '$title_l', `sub_title` = '$sub_title', `sub_title_l` = '$sub_title_l', `display_order` = '$display_order', `text_color` = '$text_color_l' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function infrastructureDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `infrastructure` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `infrastructure` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }
    
//teacher

    public function teacherIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `teacher` order by `id`;"));
        return view('admin.webgallery.teacher.index',compact('rs_records'));
    }

    public function teacherForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        $rs_icon_type = DB::select(DB::raw("SELECT * from `icon_type`;"));
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `teacher` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.teacher.form',compact('rs_records', 'rs_icon_type'));
    }

    public function teacherStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('teacher'),$imageName);
                $imageName = "teacher/".time().'.jpg';
                $name = MyFuncs::removeSpacialChr($request->name);
                $name_l = MyFuncs::removeSpacialChr($request->name_l);
                $subject = MyFuncs::removeSpacialChr($request->subject);
                $subject_l = MyFuncs::removeSpacialChr($request->subject_l);
                $description = MyFuncs::removeSpacialChr($request->description);
                $description_l = MyFuncs::removeSpacialChr($request->description_l);
                $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
                $text_color = intval($request->text_color);
                $rs_save = DB::select(DB::raw("insert into `teacher` (`image`, `name`, `name_l`, `subject`, `subject_l`, `description`, `description_l`, `display_order`, `text_color`) values ('$imageName', '$name', '$name_l', '$subject', '$subject_l', '$description', '$description_l', '$display_order', '$text_color')"));
            }
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('teacher'),$imageName);
                $imageName = "teacher/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `teacher` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $name = MyFuncs::removeSpacialChr($request->name);
            $name_l = MyFuncs::removeSpacialChr($request->name_l);
            $subject = MyFuncs::removeSpacialChr($request->subject);
            $subject_l = MyFuncs::removeSpacialChr($request->subject_l);
            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $text_color = intval($request->text_color);
            $rs_save = DB::select(DB::raw("UPDATE `teacher` set `image` = '$imageName', `name` = '$name', `name_l` = '$name_l', `subject` = '$subject', `subject_l` = '$subject_l', `description` = '$description', `description_l` = '$description_l', `display_order` = '$display_order', `text_color` = '$text_color' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function teacherDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `teacher` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `teacher` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//gallery

    public function galleryIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `gallery` order by `id`;"));
        return view('admin.webgallery.gallery.index',compact('rs_records'));
    }

    public function galleryStore(Request $request)
    {  
        if ($request->hasFile('image')) { 
            $imageFile = $request->image;
            $imageName = time().'.jpg';
            $imageFile->move(public_path('gallery'),$imageName);
            $imageName = "gallery/".time().'.jpg';
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $display_order = intval($request->display_order);
            $rs_save = DB::select(DB::raw("insert into `gallery` (`image`, `title`, `title_l`, `display_order`) values ('$imageName', '$title', '$title_l', '$display_order')"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
    }

    public function galleryUpdate(Request $request, $rec_id)
    {
        $l_rec_id = Crypt::decrypt($rec_id);
        $title = MyFuncs::removeSpacialChr($request->title);
        $title_l = MyFuncs::removeSpacialChr($request->title_l);
        $display_order_id = MyFuncs::removeSpacialChr($request->display_order);
        
        $rs_save = DB::select(DB::raw("update `gallery` set `title` = '$title', `title_l` = '$title_l', `display_order` = '$display_order_id' where `id` = $l_rec_id limit 1;")); 
        
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Update Successfully'];
        return response()->json($response);

    }

    public function galleryDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `gallery` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `gallery` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//event

    public function eventIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `event` order by `id`;"));
        return view('admin.webgallery.event.index',compact('rs_records'));
    }

    public function eventForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        $rs_icon_type = DB::select(DB::raw("SELECT * from `icon_type`;"));
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `event` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.event.form',compact('rs_records', 'rs_icon_type'));
    }

    public function eventStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('event'),$imageName);
                $imageName = "event/".time().'.jpg';
                $title = MyFuncs::removeSpacialChr($request->title);
                $title_l = MyFuncs::removeSpacialChr($request->title_l);
                $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
                $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
                $description = MyFuncs::removeSpacialChr($request->description);
                $description_l = MyFuncs::removeSpacialChr($request->description_l);
                $date = $request->date;
                $time = MyFuncs::removeSpacialChr($request->time);
                $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
                $text_color_l = intval($request->text_color);
                $rs_save = DB::select(DB::raw("insert into `event` (`image`, `title`, `title_l`, `sub_title`, `sub_title_l`, `description`, `description_l`, `date`, `time`, `display_order`, `text_color`) values ('$imageName', '$title', '$title_l', '$sub_title', '$sub_title_l', '$description', '$description_l', '$date', '$time', '$display_order', '$text_color_l')"));
            }
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('event'),$imageName);
                $imageName = "event/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `event` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);
            $date = $request->date;
            $time = MyFuncs::removeSpacialChr($request->time);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $text_color_l = intval($request->text_color);
            $rs_save = DB::select(DB::raw("UPDATE `event` set `image` = '$imageName', `title` = '$title', `title_l` = '$title_l', `sub_title` = '$sub_title', `sub_title_l` = '$sub_title_l', `description` = '$description', `description_l` = '$description_l', `date` = '$date', `time` = '$time', `display_order` = '$display_order', `text_color` = '$text_color_l' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function eventDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `event` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `event` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//about-us

    public function aboutIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `about` order by `id`;"));
        return view('admin.webgallery.about.index',compact('rs_records'));
    }

    public function aboutStore(Request $request)
    {  
        $rs_fatch = DB::select(DB::raw("SELECT * from `about`;"));
        if (count($rs_fatch)>0) {
            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);
            $imageName = $rs_fatch[0]->image;
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('about'),$imageName);
                $imageName = "about/".time().'.jpg';
            }
            $rs_save = DB::select(DB::raw("UPDATE `about` set `image` = '$imageName', `description` = '$description', `description_l` = '$description_l';"));
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('about'),$imageName);
                $imageName = "about/".time().'.jpg';
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `about` limit 1;"));
                $imageName = $rs_fatch[0]->image;
            }

            $description = MyFuncs::removeSpacialChr($request->description);
            $description_l = MyFuncs::removeSpacialChr($request->description_l);

            $rs_save = DB::select(DB::raw("insert into `about` (`image`, `description`, `description_l`) values ('$imageName', '$description', '$description_l')"));
        }
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']); 
    }

//facts

    public function factsIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `facts` order by `id`;"));
        return view('admin.webgallery.facts.index',compact('rs_records'));
    }

    public function factsStore(Request $request)
    {  
        // return $request;
        $title = MyFuncs::removeSpacialChr($request->title);
        $title_l = MyFuncs::removeSpacialChr($request->title_l);
        $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
        $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
        
        $caption_1 = MyFuncs::removeSpacialChr($request->caption_1);
        $caption_1_l = MyFuncs::removeSpacialChr($request->caption_1_l);
        $values_1 = MyFuncs::removeSpacialChr($request->value_1);
                    
        $caption_2 = MyFuncs::removeSpacialChr($request->caption_2);
        $caption_2_l = MyFuncs::removeSpacialChr($request->caption_2_l);
        $values_2 = MyFuncs::removeSpacialChr($request->value_2);

        $caption_3 = MyFuncs::removeSpacialChr($request->caption_3);
        $caption_3_l = MyFuncs::removeSpacialChr($request->caption_3_l);
        $values_3 = MyFuncs::removeSpacialChr($request->value_3);

        $caption_4 = MyFuncs::removeSpacialChr($request->caption_4);
        $caption_4_l = MyFuncs::removeSpacialChr($request->caption_4_l);
        $values_4 = MyFuncs::removeSpacialChr($request->value_4);

        $rs_fatch = DB::select(DB::raw("SELECT * from `facts`;"));

        if (count($rs_fatch)>0) {            
            $rs_save = DB::select(DB::raw("UPDATE `facts` set `title` = '$title', `title_l` = '$title_l', `sub_title` = '$sub_title', `sub_title_l` = '$sub_title_l', `caption_1` = '$caption_1', `caption_1_l` = '$caption_1_l', `val_1` = '$values_1', `caption_2` = '$caption_2', `caption_2_l` = '$caption_2_l', `val_2` = '$values_2', `caption_3` = '$caption_3', `caption_3_l` = '$caption_3_l', `val_3` = '$values_3', `caption_4` = '$caption_4', `caption_4_l` = '$caption_4_l', `val_4` = '$values_4';"));
        }else{            
            $rs_save = DB::select(DB::raw("insert into `facts` (`title`, `title_l`, `sub_title`, `sub_title_l`, `caption_1`, `caption_1_l`, `val_1`, `caption_2`, `caption_2_l`, `val_2`, `caption_3`, `caption_3_l`, `val_3`, `caption_4`, `caption_4_l`, `val_4`) values ('$title', '$title_l', '$sub_title', '$sub_title_l', '$caption_1', '$caption_1_l', '$values_1', '$caption_2', '$caption_2_l', '$values_2', '$caption_3', '$caption_3_l', '$values_3', '$caption_4', '$caption_4_l', '$values_4')"));
            
        }
        WebHelper::db_update_date_time();       
        return  redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']); 
    }

//add-more-page

    public function addMorePage()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `more_page` order by `id`;"));
        return view('admin.webgallery.morePage.index',compact('rs_records'));
    }

    public function morePageForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `more_page` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.morePage.form',compact('rs_records'));
    }

    public function morePageStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('more_page'),$imageName);
                $imageName = "more_page/".time().'.pdf'; 
            }else{
                $imageName = '';
            }
            $link_name = MyFuncs::removeSpacialChr($request->link_name);
            $link_name_l = MyFuncs::removeSpacialChr($request->link_name_l);
            $link_type = intval($request->link_type);
            $page_heading = MyFuncs::removeSpacialChr($request->page_heading);
            $page_heading_l = MyFuncs::removeSpacialChr($request->page_heading_l);
            $page_content = MyFuncs::removeSpacialChr($request->page_content);
            $page_content_l = MyFuncs::removeSpacialChr($request->page_content_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));

            $rs_save = DB::select(DB::raw("insert into `more_page` (`link_name`, `link_name_l`, `link_type`, `page_heading`, `page_heading_l`, `page_content`, `page_content_l`, `display_order`, `file_path`) values ('$link_name', '$link_name_l', '$link_type', '$page_heading', '$page_heading_l', '$page_content', '$page_content_l', '$display_order', '$imageName')"));
            
        }else{
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('more_page'),$imageName);
                $imageName = "more_page/".time().'.pdf'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `more_page` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->file_path;   
            }
            $link_name = MyFuncs::removeSpacialChr($request->link_name);
            $link_name_l = MyFuncs::removeSpacialChr($request->link_name_l);
            $link_type = intval($request->link_type);
            $page_heading = MyFuncs::removeSpacialChr($request->page_heading);
            $page_heading_l = MyFuncs::removeSpacialChr($request->page_heading_l);
            $page_content = MyFuncs::removeSpacialChr($request->page_content);
            $page_content_l = MyFuncs::removeSpacialChr($request->page_content_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $rs_save = DB::select(DB::raw("UPDATE `more_page` set `link_name` = '$link_name', `link_name_l` = '$link_name_l', `link_type` = '$link_type', `page_heading` = '$page_heading', `page_heading_l` = '$page_heading_l', `page_content` = '$page_content', `page_content_l` = '$page_content_l', `display_order` = '$display_order', `file_path` = '$imageName' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function morePageStatus($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_delete = DB::select(DB::raw("delete from `more_page` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);
    }

//MandatoryDisclosure

    public function MandatoryDisclosure()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `mandatory_disclosure` order by `display_order`;"));
        return view('admin.webgallery.MandatoryDisclosure.index',compact('rs_records'));
    }

    public function MandatoryDisclosureForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `mandatory_disclosure` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.MandatoryDisclosure.form',compact('rs_records'));
    }

    public function MandatoryDisclosureStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rules=[ 
            "link_name" => 'required',  
            "pdf_file" => 'nullable|mimes:pdf|max:2000',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        if ($rec_id == 0) {
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('mandatory_disclosure'),$imageName);
                $imageName = "mandatory_disclosure/".time().'.pdf'; 
            }else{
                $imageName = '';
            }
            $link_name = MyFuncs::removeSpacialChr($request->link_name);
            $link_name_l = MyFuncs::removeSpacialChr($request->link_name_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));

            $rs_save = DB::select(DB::raw("insert into `mandatory_disclosure` (`link_name`, `link_name_l`, `display_order`, `file_path`) values ('$link_name', '$link_name_l', '$display_order', '$imageName')"));
            
        }else{
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('mandatory_disclosure'),$imageName);
                $imageName = "mandatory_disclosure/".time().'.pdf'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `mandatory_disclosure` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->file_path;   
            }
            $link_name = MyFuncs::removeSpacialChr($request->link_name);
            $link_name_l = MyFuncs::removeSpacialChr($request->link_name_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $rs_save = DB::select(DB::raw("UPDATE `mandatory_disclosure` set `link_name` = '$link_name', `link_name_l` = '$link_name_l', `display_order` = '$display_order', `file_path` = '$imageName' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function MandatoryDisclosureStatus($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_delete = DB::select(DB::raw("delete from `mandatory_disclosure` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);
    }

//whos who

    public function whosWhoIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `whos_who` order by `id`;"));
        return view('admin.webgallery.whos.index',compact('rs_records'));
    }

    public function whosWhoForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `whos_who` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.whos.form',compact('rs_records'));
    }

    public function whosWhoStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('whos_who'),$imageName);
                $imageName = "whos_who/".time().'.jpg';
                $name = MyFuncs::removeSpacialChr($request->name);
                $name_l = MyFuncs::removeSpacialChr($request->name_l);
                $designation = MyFuncs::removeSpacialChr($request->designation);
                $designation_l = MyFuncs::removeSpacialChr($request->designation_l);
                $message = MyFuncs::removeSpacialChr($request->message);
                $message_l = MyFuncs::removeSpacialChr($request->message_l);
                $display_order = MyFuncs::removeSpacialChr($request->display_order);

                $rs_save = DB::select(DB::raw("insert into `whos_who` (`image`, `name`, `name_l`, `designation`, `designation_l`, `message`, `message_l`, `display_order`) values ('$imageName', '$name', '$name_l', '$designation', '$designation_l', '$message', '$message_l', '$display_order')"));
            }
        }else{
            if ($request->hasFile('image')) { 
                $imageFile = $request->image;
                $imageName = time().'.jpg';
                $imageFile->move(public_path('whos_who'),$imageName);
                $imageName = "whos_who/".time().'.jpg'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `whos_who` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->image;   
            }
            $name = MyFuncs::removeSpacialChr($request->name);
            $name_l = MyFuncs::removeSpacialChr($request->name_l);
            $designation = MyFuncs::removeSpacialChr($request->designation);
            $designation_l = MyFuncs::removeSpacialChr($request->designation_l);
            $message = MyFuncs::removeSpacialChr($request->message);
            $message_l = MyFuncs::removeSpacialChr($request->message_l);
            $display_order = MyFuncs::removeSpacialChr($request->display_order);

            $rs_save = DB::select(DB::raw("UPDATE `whos_who` set `image` = '$imageName', `name` = '$name', `name_l` = '$name_l', `designation` = '$designation', `designation_l` = '$designation_l', `message` = '$message', `message_l` = '$message_l', `display_order` = '$display_order' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function whosWhoDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_fetch = DB::select(DB::raw("select * from `whos_who` where `id` = $rec_id limit 1;"));
        $imageName = '';
        if (count($rs_fetch) > 0) {

           $imageName = $rs_fetch[0]->image;
        }

        $imagePath = public_path($imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $rs_delete = DB::select(DB::raw("delete from `whos_who` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }

//popupFlase

    public function popupFlase()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `popup_flash` order by `id`;"));
        return view('admin.webgallery.popupFlash.index',compact('rs_records'));
    }

    public function popupFlaseStore(Request $request)
    {  
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $content = MyFuncs::removeSpacialChr($request->content);
        $status = intval($request->status);

        $rs_fatch = DB::select(DB::raw("SELECT * from `popup_flash`;"));
        
        if (count($rs_fatch) > 0) {
            $rs_save = DB::select(DB::raw("UPDATE `popup_flash` set `from_date` = '$from_date', `to_date` = '$to_date', `content` = '$content', `status` = '$status';")); 
        }else{
            $rs_save = DB::select(DB::raw("insert into `popup_flash` (`from_date`, `to_date`, `content`, `status`) values ('$from_date', '$to_date', '$content', '$status')"));  
        }
        
        WebHelper::db_update_date_time(); 
        return  redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']); 
    }

//notice_board

    public function noticeBoardIndex()
    {
        $rs_records = DB::select(DB::raw("SELECT * from `notice_board` order by `display_order`;"));
        return view('admin.webgallery.noticeboard.index',compact('rs_records'));
    }

    public function noticeBoardForm($rec_id)
    {   
        $rec_id = Crypt::decrypt($rec_id);
        if ($rec_id!= 0) {
            $rs_records = DB::select(DB::raw("SELECT * from `notice_board` where `id` = $rec_id limit 1;"));
            $rs_records = reset($rs_records);
        }else { 
            $rs_records = ''; 
        }
        return view('admin.webgallery.noticeboard.form',compact('rs_records'));
    }

    public function noticeBoardStore(Request $request, $rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        if ($rec_id == 0) {
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('notice_board'),$imageName);
                $imageName = "notice_board/".time().'.pdf'; 
            }else{
                $imageName ='';   
            }
            $date = $request->date;
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $display_order = MyFuncs::removeSpacialChr($request->display_order);
            $icon = intval($request->icon);
            $rs_save = DB::select(DB::raw("insert into `notice_board` (`date`, `title`, `title_l`, `sub_title`, `sub_title_l`, `file_path`, `display_order`) values ('$date', '$title', '$title_l', '$sub_title', '$sub_title_l', '$imageName', '$display_order')"));
        }else{
            if ($request->hasFile('pdf_file')) { 
                $imageFile = $request->pdf_file;
                $imageName = time().'.pdf';
                $imageFile->move(public_path('notice_board'),$imageName);
                $imageName = "notice_board/".time().'.pdf'; 
            }else{
                $rs_fatch = DB::select(DB::raw("SELECT * from `notice_board` where `id` = $rec_id limit 1;"));
                $imageName = $rs_fatch[0]->file_path;   
            }
            $date = $request->date;
            $title = MyFuncs::removeSpacialChr($request->title);
            $title_l = MyFuncs::removeSpacialChr($request->title_l);
            $sub_title = MyFuncs::removeSpacialChr($request->sub_title);
            $sub_title_l = MyFuncs::removeSpacialChr($request->sub_title_l);
            $display_order = intval(MyFuncs::removeSpacialChr($request->display_order));
            $icon = intval($request->icon);
            $rs_save = DB::select(DB::raw("UPDATE `notice_board` set `title` = '$title', `title_l` = '$title_l', `sub_title` = '$sub_title', `sub_title_l` = '$sub_title_l', `display_order` = '$display_order', `date` = '$date', `file_path` = '$imageName' where `id` = $rec_id limit 1;"));
        }
        WebHelper::db_update_date_time();
        $response=['status'=>1,'msg'=>'Save Successfully'];
        return response()->json($response);
         
    }

    public function noticeBoardDelete($rec_id)
    {  
        $rec_id =Crypt::decrypt($rec_id);
        $rs_delete = DB::select(DB::raw("delete from `notice_board` where `id` = $rec_id;"));
        WebHelper::db_update_date_time();
        return  redirect()->back()->with(['message'=>'Deleted Successfully','class'=>'success']);
    }
    
}