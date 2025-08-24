<?php

namespace App\Helper;
use App\Admin;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Route;
use Illuminate\Support\Facades\DB;

class WebHelper {

  public static function db_update_date_time()
  {
      $save = DB::select(DB::raw("UPDATE `school_details` set `update_date_time` = now();"));
  }

  public static function getSchoolDetail() {
    $result_rs = DB::select(DB::raw("SELECT * from `school_details`;"));  
    return $result_rs;
  }

  public static function getHomeBannerImage() {
    $result_rs = DB::select(DB::raw("SELECT * from `web_gallery` where `status` = 1 order by `display_order`, `id`;"));  
    return $result_rs;
  }

  public static function getFeatures($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    
    $result_rs = DB::select(DB::raw("SELECT `f`.`id`, `f`.`title`, `f`.`title_l`, `f`.`sub_title`, `f`.`sub_title_l`, `it`.`icon`, `it`.`icon_color`, `it`.`text_color` from `features` `f` inner join `icon_type` `it` on `it`.`id` = `f`.`icon_id` order by `f`.`display_order`, `f`.`id` $condition;"));  
    return $result_rs;
  }

  public static function getInfrastructure($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    $result_rs = DB::select(DB::raw("SELECT `f`.`image`, `f`.`title`, `f`.`title_l`, `f`.`sub_title`, `f`.`sub_title_l`, `it`.`text_color` from `infrastructure` `f` left join `icon_type` `it` on `it`.`id` = `f`.`text_color` order by `f`.`display_order`, `f`.`id` $condition;"));  
    return $result_rs;
  }

  public static function getTeacher($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    $result_rs = DB::select(DB::raw("SELECT `f`.`id`, `f`.`image`, `f`.`name`, `f`.`name_l`, `f`.`subject`, `f`.`subject_l`, `f`.`description`, `f`.`description_l`, `it`.`text_color` from `teacher` `f` left join `icon_type` `it` on `it`.`id` = `f`.`text_color` order by `f`.`display_order`, `f`.`id` $condition;"));  
    return $result_rs;
  }

  public static function getGellery($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    $result_rs = DB::select(DB::raw("SELECT * from `gallery` order by `display_order` $condition;"));  
    return $result_rs;
  }

  public static function getEvents($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    $result_rs = DB::select(DB::raw("SELECT `f`.`id`, `f`.`image`, `f`.`title`, `f`.`title_l`, `f`.`sub_title`, `f`.`sub_title_l`, `f`.`date`, `f`.`time`, `it`.`icon_color` as`text_color` from `event` `f` left join `icon_type` `it` on `it`.`id` = `f`.`text_color` order by `f`.`display_order`, `f`.`id` $condition;"));  
    return $result_rs;
  }

  public static function getAbout() {
    $result_rs = DB::select(DB::raw("SELECT * from `about`;"));  
    return $result_rs;
  }

  public static function getFacts() {
    $result_rs = DB::select(DB::raw("SELECT * from `facts`;"));  
    return $result_rs;
  }

  public static function getMorePage() {
    $result_rs = DB::select(DB::raw("SELECT `id`, `link_name`, `link_name_l` from `more_page`;"));  
    return $result_rs;
  }

  public static function getWhosWho() {
    $result_rs = DB::select(DB::raw("SELECT * from `whos_who`;"));  
    return $result_rs;
  }

  public static function getPopupFlash() {
    $result_rs = DB::select(DB::raw("SELECT * from `popup_flash`;"));  
    return $result_rs;
  }

  public static function getNoticeboard($limit_val) {
    if ($limit_val!=0) {
      $condition = "limit $limit_val"; 
    }else{
      $condition = "";
    }
    $result_rs = DB::select(DB::raw("SELECT * from `notice_board` order by `display_order` $condition;"));  
    return $result_rs;
  }

  
}