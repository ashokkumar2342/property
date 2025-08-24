@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_home_banner = App\Helper\WebHelper::getHomeBannerImage();
  $rs_features = App\Helper\WebHelper::getFeatures(6);
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(4);
  $rs_teacher = App\Helper\WebHelper::getTeacher(4);
  $rs_gallery = App\Helper\WebHelper::getGellery(6);
  $rs_events = App\Helper\WebHelper::getEvents(6);
  $rs_about = App\Helper\WebHelper::getAbout();
  $rs_facts = App\Helper\WebHelper::getFacts();
  $rs_whos_who = App\Helper\WebHelper::getWhosWho();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(4);
  
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)

<div class="main-content-area">

<section id="home">
<div class="container-fluid p-0">
<div class="row">
<div class="col">

<p class="rs-p-wp-fix"></p>
<rs-module-wrap id="rev_slider_1_1_wrapper" data-alias="firoox-revolution-slider" data-source="gallery" style="background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
<rs-module id="rev_slider_1_1" style data-version="6.3.3">
<rs-slides>
@foreach ($rs_home_banner as $val_home_banner)
<rs-slide data-key="rs-{{$val_home_banner->id}}" data-title="Slide 1" data-thumb="{{ asset($val_home_banner->image) }}" data-anim="ei:d;eo:d;s:d;r:default;t:slotslide-horizontal;sl:d;">
<img src="{{ asset($val_home_banner->image) }}" title="firoox-s1" width="1920" height="1280" data-bg="p:center top;" data-parallax="off" class="rev-slidebg" data-no-retina>
<rs-layer id="slider-2-slide-2-layer-10" data-type="text" data-rsp_ch="on" data-xy="x:l,l,c,c;xo:50px,0,-155px,0;yo:330px,243px,235px,229px;" data-text="" data-dim="w:345px,400px,330px,356px;h:auto,auto,auto,auto;" data-frame_0="y:-50,-37,-28,-17;" data-frame_1="st:500;sp:1000;sR:500;" data-frame_999="o:0;st:w;sR:7500;" style="z-index:12;" class="text-theme-colored3 border-radius-5">{!!$l_lang_type == 1?$val_home_banner->description:$val_home_banner->description_l!!}
</rs-layer>
</rs-slide>
@endforeach
</rs-slides>
<rs-static-layers>

</rs-static-layers>
<rs-progress class="rs-bottom" style="height: 5px; background: rgba(199,199,199,0.5);"></rs-progress>
</rs-module>
<script data-cfasync="false" src="{{ asset('temp_3/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script><script>
                if(typeof revslider_showDoubleJqueryError === "undefined") {
                  function revslider_showDoubleJqueryError(sliderID) {
                    var err = "<div class='rs_error_message_box'>";
                    err += "<div class='rs_error_message_oops'>Oops...</div>";
                    err += "<div class='rs_error_message_content'>";
                    err += "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
                    err += "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
                    err += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
                    err += "</div>";
                    err += "</div>";
                    jQuery(sliderID).show().html(err);
                  }
                }
              </script>
</rs-module-wrap>

</div>
</div>
</div>
</section>


<section class="divider" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/b1.png') }}" data-tm-margin-top="-34px">
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
            <div class="icon-box-wrapper">
              <div class="icon-wrapper mb-20">
                <a class="icon icon-xl icon-dark icon-circled bg-theme-colored1">
                  <i class="fas fa-user text-white"></i>
                </a>
              </div>
              <div class="icon-text">
                <h4 class="icon-box-title">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</h4>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
            <div class="icon-box-wrapper">
              <div class="icon-wrapper mb-20">
                <a class="icon icon-xl icon-dark icon-circled bg-theme-colored2">
                  <i class="fas fa-info text-white"></i>
                </a>
              </div>
              <div class="icon-text">
                <h4 class="icon-box-title">{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h4>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
            <div class="icon-box-wrapper">
              <div class="icon-wrapper mb-20">
                <a class="icon icon-xl icon-dark icon-circled bg-theme-colored3">
                  <i class="far fa-image text-white"></i>
                </a>
              </div>
              <div class="icon-text">
                <h4 class="icon-box-title">{{$l_lang_type==1?'Gallery':'गैलरी'}}</h4>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
          <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-sm-30">
            <div class="icon-box-wrapper">
              <div class="icon-wrapper mb-20">
                <a class="icon icon-xl icon-dark icon-circled bg-theme-colored4">
                  <i class="fas fa-copy text-white"></i>
                </a>
              </div>
              <div class="icon-text">
                <h4 class="icon-box-title">{{$l_lang_type==1?'Events':'आयोजन'}}</h4>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>
<section class="bg-img-cover bg-img-center" data-tm-bg-img="" style="background-color: #ea77ad!important;">
  <div class="container">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title text-theme-colored4">{{$l_lang_type==1?'Notice':'सूचना'}} <span class="text-white"> {{$l_lang_type==1?'Board':'पट्ट'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-product border-primary card-hover" style="height: 300px;border: 1px solid black;overflow-x: hidden;overflow-y: scroll;">
      <div class="row" style="margin:10px;">
      <marquee direction="up" scrolldelay="100" onmouseover="stop()" onmouseout="start()">
        <div class="col-md-12">
          @foreach ($rs_notice_board as $rs_notice_board_val)
            <div class="event_date">
              <div class="event-date-wrap">
                <p>{{date('d', strtotime($rs_notice_board_val->date)) }}</p>
                <span>{{date('M.Y', strtotime($rs_notice_board_val->date)) }}</span>
                <span></span>
              </div>
            </div>
            <div class="date-description">
              @if ($rs_notice_board_val->file_path != '')
                <a target="_blank" href="{{ asset($rs_notice_board_val->file_path) }}">
              @endif
              <h3>{{$l_lang_type==1?$rs_notice_board_val->title:$rs_notice_board_val->title_l}}</h3>
              <p>{{$l_lang_type==1?$rs_notice_board_val->sub_title:$rs_notice_board_val->sub_title_l}}</p>
              </a>
              <hr class="event_line">
            </div>
          @endforeach
        </div>
    </marquee>
        <div class=" col-md-12 tab-contact text-center">
          <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.notice',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>

<section>
  <div class="container" data-tm-padding-bottom="220px">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title">{{$l_lang_type==1?'About':'हमारे'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Us':'बारे में'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-lg-7 col-xl-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="about-text-content mb-md-30 ">

            <p>{!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}</p>
          </div>
        </div>
        <div class="col-lg-5 col-xl-5 offset-xl-1 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="video-popup">
            <a>
              <img alt src="{{ asset(@$rs_about[0]->image) }}" class="img-fullwidth">
            </a>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>

<section class="bg-img-cover bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/p2.jpg') }}">
  <div class="container">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title">{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Features':'विशेषताएं'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        @foreach ($rs_features as $rs_val)
          <div class="col-lg-4 col-xl-4">
            <div class="tm-sc-icon-box icon-box icon-right text-center text-lg-end iconbox-centered-in-responsive  animate-icon-on-hover animate-icon-rotate-y mb-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
              <div class="icon-box-wrapper">
                <div class="icon-wrapper"><a class="icon icon-lg icon-dark icon-circled {{$rs_val->icon_color}}"> <i class="{{$rs_val->icon}}"></i></a></div>
                <div class="icon-text">
                  <h5 class="icon-box-title mb-0 text-theme-colored4"><a href="{{ route('template.singal.features',[3,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h5>
                  <div class="content">
                    <p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class=" col-md-12 tab-contact text-center">
      <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.features',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>

<section class="divider bg-img-cover bg-img-center layer-overlay overlay-theme-colored4-7" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/p2.jpg') }}">
  <div class="container pt-90 pb-90">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title text-theme-colored3">{{$l_lang_type==1?@$rs_facts[0]->title:@$rs_facts[0]->title_l}}</h2>
              <p class="text-white font-size-15">{{$l_lang_type==1?@$rs_facts[0]->sub_title:@$rs_facts[0]->sub_title_l}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
        <div class="funfact-item text-center mb-md-30">
          <div class="icon"><span class="fas fa-user-friends"></span></div>
          <div>
            <h2 class="counter">
              <span data-animation-duration="2000" data-value="{{@$rs_facts[0]->val_1}}" class="animate-number">0</span>
            </h2>
            <h5 class="title">{{$l_lang_type==1?@$rs_facts[0]->caption_1:@$rs_facts[0]->caption_1_l}}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
        <div class="funfact-item text-center mb-md-30">
          <div class="icon"><span class="fas fa-graduation-cap"></span></div>
          <div>
            <h2 class="counter">
              <span data-animation-duration="2000" data-value="{{@$rs_facts[0]->val_2}}" class="animate-number">0</span>
            </h2>
            <h5 class="title">{{$l_lang_type==1?@$rs_facts[0]->caption_2:@$rs_facts[0]->caption_2_l}}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="funfact-item text-center mb-sm-30">
          <div class="icon"><span class="far fa-smile"></span></div>
          <div>
            <h2 class="counter">
              <span data-animation-duration="2000" data-value="{{@$rs_facts[0]->val_3}}" class="animate-number">0</span>
            </h2>
            <h5 class="title">{{$l_lang_type==1?@$rs_facts[0]->caption_3:@$rs_facts[0]->caption_3_l}}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="funfact-item text-center">
          <div class="icon"><span class="fas fa-medal"></span></div>
          <div>
            <h2 class="counter">
              <span data-animation-duration="2000" data-value="{{@$rs_facts[0]->val_4}}" class="animate-number">0</span>
            </h2>
            <h5 class="title">{{$l_lang_type==1?@$rs_facts[0]->caption_4:@$rs_facts[0]->caption_4_l}}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-img-cover bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/p2.jpg') }}">
  <div class="container pb-90">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title text-theme-colored3">{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="course-carousel owl-nav-outer">
            <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-nav="true" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="10" data-stagepadding="0">
              @foreach ($rs_infrastructure as $rs_infr_val)
                <div class="tm-carousel-item">
                  <div class="course">
                    <div class="thumb">
                      <img class="img-fullwidth" src="{{ asset($rs_infr_val->image) }}" alt>
                      <div class="course-overlay"></div>
                    </div>
                    <div class="course-details clearfix p-20 pt-15">
                      <h4 class="mt-0 mb-0"><a class="text-theme-colored1" href="{{ route('template.infrastructure',[3,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a></h4>
                      <p class="mb-10">{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
                    </div>
                    <div class="bg-theme-colored1 text-center p-10">
                      
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=" col-md-12 tab-contact text-center">
      <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.infrastructure',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
  <br>
  <br>
  <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>

<section data-tm-bg-color="#f9f9f9">
  <div class="container pb-90">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title">{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Gallery':'गैलरी'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-conent">
      <div class="row">
        @foreach ($rs_gallery as $rs_gallery_val)
          <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="gallery-block">
              <div class="gallery-thumb">
                <img alt="gallery" src="{{ asset($rs_gallery_val->image) }}" class="img-fullwidth">
              </div>
              <div class="overlay-shade"></div>
              <div class="icons-holder">
                <div class="icons-holder-inner">
                  <div class="gallery-icon">
                    <a href="{{ asset($rs_gallery_val->image) }}" data-lightbox-gallery="gallery"><i class="pe-7s-science"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class=" col-md-12 tab-contact text-center">
      <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.gallery',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
  <br>
  <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>


<section class>
  <div class="container">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title">{{$l_lang_type==1?"Who's ":'कौन '}} <span class="text-theme-colored3">{{$l_lang_type==1?" Who":' कौन है'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12">
          <div class="owl-carousel owl-theme tm-owl-carousel-4col" data-nav="true" data-dots="false" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0">
            @foreach ($rs_whos_who as $rs_whos_who_val)
              <div class="tm-carousel-item">
                <div class="tm-sc-team-box">
                  <div class="tm-thumb">
                    <img class="img-fullwidth" src="{{ asset($rs_whos_who_val->image) }}" alt="1.jpg">
                  </div>
                  <div class="tm-content text-center">
                    <h5 class="title text-theme-colored3"><a href="{{ route('template.singal.message',[3, $l_lang_type, $rs_whos_who_val->id]) }}">{{$l_lang_type==1?$rs_whos_who_val->name:$rs_whos_who_val->name_l}}</a></h5>
                    <h6 class="position">{{$l_lang_type==1?$rs_whos_who_val->designation:$rs_whos_who_val->designation_l}}</h6>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="bg-img-cover bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/p2.jpg') }}">
  <div class="container pb-90">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title">{{$l_lang_type==1?'Our':'हमारे'}} <span class="text-theme-colored3">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        @foreach ($rs_teacher as $rs_teacher_val)
          <div class="col-sm-6 col-xl-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="team-member">
              <div class="team-thumb">
                <img class="img-fullwidth" src="{{ asset($rs_teacher_val->image) }}" alt="">
              </div>
              <div class="team-details text-center bg-theme-colored2">
                <div class="member-biography">
                  <h3 class="mt-0 {{$rs_teacher_val->text_color}} mb-0 ">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</h3>
                  <p><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></p>
                </div>
                <p class="mb-0 text-white">{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class=" col-md-12 tab-contact text-center">
      <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.teacher',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
  <br>
  <div class="tm-floating-objects">
  <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
  </div>
</section>




<section class="our-blog">
  <div class="container">
    <div class="section-title">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="tm-sc-section-title section-title text-center">
            <div class="title-wrapper">
              <h2 class="title text-theme-colored3">{{$l_lang_type==1?'Events':'आयोजन'}}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content" data-tm-padding-bottom="450">
      <div class="row">
        @foreach ($rs_events as $rs_events_val)
          <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="blog-style1-current-theme">
              <article class="post">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img class="img-responsive img-fullwidth" src="{{ asset($rs_events_val->image) }}" alt>
                  </div>
                </div>
                <div class="entry-content">
                  <div class="header-wrapper d-flex">
                    <div class="entry-date bg-theme-colored1 text-center mr-15">
                      <span class="day bg-theme-colored1">{{date('d', strtotime($rs_events_val->date))}}</span>
                      <span class="month bg-theme-colored1">{{date('M', strtotime($rs_events_val->date))}}</span>
                    </div>
                    <h4 class="entry-title"><a class="text-theme-colored4" href="{{ route('template.events.detail',[3,$l_lang_type,$rs_events_val->id]) }}">{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a></h4>
                  </div>
                  <p class="mt-10">{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
                  </div>
                  <div class="bg-theme-colored1 text-center p-10">
                    <a href="{{ route('template.events.detail',[3,$l_lang_type,$rs_events_val->id]) }}" class="btn btn-xs btn-flat btn-theme-colored2 btn-outline-light mt-15 mr-15">{{$l_lang_type==1?'read more':'और पढ़ें'}}</a>
                  </div>
                </article>
              </div>
            </div>
          @endforeach
          <div class=" col-md-12 tab-contact text-center">
            <a class="btn btn-sm btn-dark btn-theme-colored1" href="{{ route('template.events',[3,$l_lang_type]) }}">{{$l_lang_type==1?'View More':'और देखें'}}</a>
          </div>
        </div>
      </div>
    </div>
    <div class="tm-floating-objects">
    <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
    </div>
</section>
<section class="divider">
    <div class="container pt-100 pb-100">
        <div class="row pt-30">
            <div class="col-md-5 col-lg-4">
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
                    <div class="icon-box-wrapper">
                        <div class="icon-wrapper">
                            <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-044-call-1"></i> </a>
                        </div>
                        <div class="icon-text">
                            <h5 class="icon-box-title mt-0">{{$l_lang_type==1?'Phone No.':'फोन नंबर।'}}</h5>
                            <div class="content">{{@$rs_school_detail[0]->mobile}} , {{@$rs_school_detail[0]->contact}}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
                    <div class="icon-box-wrapper">
                        <div class="icon-wrapper">
                            <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-043-email-1"></i> </a>
                        </div>
                        <div class="icon-text">
                            <h5 class="icon-box-title mt-0">{{$l_lang_type==1?'Email':'ईमेल'}}</h5>
                            <div class="content">{{@$rs_school_detail[0]->email}}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate bg-white-f1 p-30 mb-30">
                    <div class="icon-box-wrapper">
                        <div class="icon-wrapper">
                            <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-025-world"></i> </a>
                        </div>
                        <div class="icon-text">
                            <h5 class="icon-box-title mt-0">{{$l_lang_type==1?'Address':'पता'}}</h5>
                            <div class="content">{{$l_lang_type==1?@$rs_school_detail[0]->address:@$rs_school_detail[0]->address_l}}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <form action="{{ route('admin.messageform') }}" method="post" class="add_form">
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>{{$l_lang_type==1?'Name':'नाम'}} <small>*</small></label>
                                <input type="text" name="name" class="form-control border-primary" placeholder="{{$l_lang_type==1?'Name':'नाम'}}" required="" maxlength="50">
                            </div>
                            <p class="text-danger" style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>{{$l_lang_type==1?'Email':'ईमेल'}} <small>*</small></label>
                                <input type="email" name="email_id" class="form-control border-success" placeholder="{{$l_lang_type==1?'Email':'ईमेल'}}" required="" maxlength="50">
                            </div>
                            <p class="text-danger" style="color:red">{{ $errors->first('email_id') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}} <small>*</small></label>
                                <input type="text" name="mobile_no" class="form-control border-purple" placeholder="{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}}" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                            </div>
                            <p class="text-danger" style="color:red">{{ $errors->first('mobile_no') }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>{{$l_lang_type==1?'Subject':'विषय'}} <small>*</small></label>
                                <input type="text" name="subject" class="form-control border-pink" placeholder="{{$l_lang_type==1?'Subject':'विषय'}}" required="" maxlength="50">
                            </div>
                            <p class="text-danger" style="color:red">{{ $errors->first('subject') }}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}</label>
                        <textarea class="form-control border-info" name="message" placeholder="{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}" rows="6" maxlength="200"></textarea>
                    </div>
                    <div class="mb-3">
                        <input name="form_botcheck" class="form-control" type="hidden" value />
                        <button type="submit" class="btn btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">{{$l_lang_type==1?'Send Message':'मेसेज भेजें'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


</div>
<!-- ====================================
——— FOOTER
===================================== -->
@endsection


