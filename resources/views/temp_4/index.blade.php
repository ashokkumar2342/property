@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_home_banner = App\Helper\WebHelper::getHomeBannerImage();
  $rs_features = App\Helper\WebHelper::getFeatures(4);
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(4);
  $rs_teacher = App\Helper\WebHelper::getTeacher(4);
  $rs_gallery = App\Helper\WebHelper::getGellery(4);
  $rs_events = App\Helper\WebHelper::getEvents(3);
  $rs_about = App\Helper\WebHelper::getAbout();
  $rs_facts = App\Helper\WebHelper::getFacts();
  $rs_whos_who = App\Helper\WebHelper::getWhosWho();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(4);
  
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)
<!-- start revolution slideshow-->
<div class="rev_slider_wrapper">
    <div class="rev_slider" id="rev_slider_1" data-version="5.4.5">
        <ul>
            @foreach ($rs_home_banner as $val_home_banner)
            <li data-fstransition="fade" data-transition="fade" data-easein="Power4.easeInOut" data-hideslideonmobile="off" data-easeout="Power4.easeInOut" data-slotamount="default" data-masterspeed="default" data-fsslotamount="0" data-saveperformance="off">

                <!-- MAIN IMAGE -->
                <img src="{{ asset($val_home_banner->image) }}" alt="" data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">

            <!-- HERO TITLE -->
            <div class="tp-caption font-weight-800 text-sky alt-font text-center" data-x="center" data-y="center" data-voffset="[-65,-45,-55,-35]" data-fontsize="[72,60,48,36]" data-lineheight="[80,70,60,48]" data-width="[900, 750, 500, 450]" data-whitespace="normal" data-frames='[{
                "delay":0,
                "speed":2000,
                "frame":"0",
                "from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;",
                "mask":"x:[100%];y:0;s:inherit;e:inherit;",
                "to":"o:1;",
                "ease":"Power3.easeOut"
            },{
                "delay":"wait",
                "speed":300,
                "frame":"999",
                "to":"auto:auto;",
                "ease":"Power4.easeInOut"
            }]' data-splitout="none">{!!$l_lang_type == 1?$val_home_banner->description:$val_home_banner->description_l!!}
        </div>

    </li>
    @endforeach
    <!-- end slide 2 -->

    </ul>
</div>
</div>
<!-- end revolution slideshow-->

<!-- start features section -->
<section>
    <div class="container margin-15px-top">
        <div class="row">
            <div class="col-sm-6 col-lg-3 sm-margin-30px-bottom ms-margin-25px-bottom">
                <div class="features-block blue">
                    <div class="icon-img">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <h4><a href="services-details.html">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</a></h4>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 sm-margin-30px-bottom ms-margin-25px-bottom">
                <div class="features-block yellow">
                    <div class="icon-img">
                        <i class="fas fa-info text-white"></i>
                    </div>
                    <h4><a href="services-details.html">{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</a></h4>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 ms-margin-25px-bottom">
                <div class="features-block pink">
                    <div class="icon-img">
                        <i class="far fa-image text-white"></i>
                    </div>
                    <h4><a href="services-details.html">{{$l_lang_type==1?'Gallery':'गैलरी'}}</a></h4>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="features-block green">
                    <div class="icon-img">
                        <i class="fas fa-copy text-white"></i>
                    </div>
                    <h4><a href="services-details.html">{{$l_lang_type==1?'Events':'आयोजन'}}</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-img cover-background bg-sky theme-overlay" data-overlay-dark="7" data-background="{{ asset('temp_4/assets/img/bg/pattern-02.png') }}">
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
<!-- start about section -->
<section class="parallax no-padding-bottom background-position-center-center" data-background="{{ asset(@$rs_about[0]->image) }}">
    <div class="container padding-90px-top md-padding-70px-top sm-padding-50px-top xs-padding-15px-top">

        <div class="row">
            <div class="col-md-9 col-lg-8 col-xl-7">
                <div class="about-detail">
                    <div class="section-heading left">
                        <h2>{{$l_lang_type==1?'About':'हमारे'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Us':'बारे में'}}</span></h2>
                        <span class="title-separator"></span>
                    </div>
                    <p>{!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}</p>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- end about section -->
<section class="no-padding-bottom">
    <div class="container lg-container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Features':'विशेषताएं'}}</span></h3>
            <span class="title-separator"></span>
        </div>
        <div class="row">
            @php
                $counter = 0;
            @endphp
            @foreach ($rs_features as $rs_val)
                @php
                    $counter ++;
                    if ($counter == 1) {
                        $color = 'blue';  
                    }elseif($counter == 2){
                        $color = 'yellow';
                    }elseif($counter == 3){
                        $color = 'pink'; 
                    }elseif($counter == 4){
                        $color = 'green';
                    }
                @endphp
                <div class="col-sm-6 col-lg-3 sm-margin-30px-bottom ms-margin-25px-bottom">
                    <div class="features-block {{$color}}">
                        <div class="icon-img">
                            <i class="{{$rs_val->icon}}"></i>
                        </div>
                        <h4><a href="{{ route('template.singal.features',[4,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h4>
                        <p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end features section -->
<!-- start our courses section -->
<section>
    <div class="container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h3>
            <span class="title-separator"></span>
        </div>

        <div class="courses owl-carousel owl-theme">
            @php
                $counter = 0;
            @endphp
            @foreach ($rs_infrastructure as $rs_infr_val)
                @php
                    $counter ++;
                    if ($counter == 1) {
                        $color = 'blue';  
                    }elseif($counter == 2){
                        $color = 'yellow';
                    }elseif($counter == 3){
                        $color = 'pink'; 
                    }elseif($counter == 4){
                        $color = 'green';
                    }
                @endphp
                <div class="courses-block {{$color}}">
                    <div class="courses-pic">
                        <a href="{{ route('template.infrastructure',[4,$l_lang_type]) }}">
                            <img src="{{ asset($rs_infr_val->image) }}" alt="" />
                        </a>
                    </div>
                    <div class="course-desc">
                        <h4><a href="{{ route('template.infrastructure',[4,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a></h4>
                        <p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- end our courses section -->

<section class="bg-img cover-background bg-sky theme-overlay" data-overlay-dark="7" data-background="{{ asset('temp_4/assets/img/bg/pattern-02.png') }}">
    <div class="container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?"Who's ":'कौन '}} <span class="text-theme-colored3">{{$l_lang_type==1?" Who":' कौन है'}}</span></h3>
            <span class="title-separator"></span>
        </div>

        <div class="courses owl-carousel owl-theme">
            @php
                $counter = 0;
            @endphp
            @foreach ($rs_whos_who as $rs_whos_who_val)
                @php
                    $counter ++;
                    if ($counter == 1) {
                        $color = 'purple';  
                    }elseif($counter == 2){
                        $color = 'yellow';
                    }elseif($counter == 3){
                        $color = 'pink'; 
                    }elseif($counter == 4){
                        $color = 'green';
                    }
                @endphp
                <div class="teacher-block {{$color}}">
                    <div class="teacher-img">
                        <img src="{{ asset($rs_whos_who_val->image) }}" alt="" />
                    </div>
                    <div class="teacher-text text-white">
                        <h4><a href="{{ route('template.singal.message',[4, $l_lang_type, $rs_whos_who_val->id]) }}">{{$l_lang_type==1?$rs_whos_who_val->name:$rs_whos_who_val->name_l}}</a></h4>
                        <p>{{$l_lang_type==1?$rs_whos_who_val->designation:$rs_whos_who_val->designation_l}}</p>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</section>
<!-- start our teacher-2 section -->
<section>
    <div class="container lg-container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Our':'हमारे'}} <span class="text-theme-colored3">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</span></h3>
            <span class="title-separator"></span>
        </div>
        <div class="row justify-content-center">
            @foreach ($rs_teacher as $rs_teacher_val)
                <div class="col-10 col-sm-11 col-lg-6 margin-30px-bottom">

                    <div class="row no-gutters team-block">
                        <div class="col-sm-5"><img src="{{ asset($rs_teacher_val->image) }}" alt="" /></div>
                        <div class="col-sm-7">
                            <div class="padding-35px-all sm-padding-25px-all xs-padding-20px-all">
                                <h4><a href="teacher-details.html" class="{{$rs_teacher_val->text_color}}">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</a></h4>
                                <span class="display-block margin-15px-bottom"><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
                                <p class="margin-35px-bottom">{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end our teacher-2 section -->
<!-- start gallery section -->
<section>
    <div class="container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Gallery':'गैलरी'}}</h3>
            <span class="title-separator"></span>
        </div>

        <div class="gallery form-row">
            @foreach ($rs_gallery as $rs_gallery_val)
                <div class="col-md-3 col-6 margin-10px-top">
                    <div class="gallery-block">
                        <img src="{{ asset($rs_gallery_val->image) }}" alt="">
                        <div class="zoom-area">
                            <a class="popimg" href="{{ asset($rs_gallery_val->image) }}">+</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- end gallery section -->

<!-- start counter section -->
<section class="bg-img cover-background bg-sky theme-overlay" data-overlay-dark="7" data-background="{{ asset('temp_4/assets/img/bg/pattern-02.png') }}">
    <div class="container margin-5px-top sm-no-margin-top">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?@$rs_facts[0]->title:@$rs_facts[0]->title_l}}</h3>
            <p>{{$l_lang_type==1?@$rs_facts[0]->sub_title:@$rs_facts[0]->sub_title_l}}</p>
        </div>
        <div class="counter-icons sm-display-none">
            <span class="icon icon-one"></span>
            <span class="icon icon-two"></span>
            <span class="icon icon-three"></span>
            <span class="icon icon-four"></span>
            <span class="icon icon-five"></span>
        </div>

        <div class="row">
            <div class="col-6 col-lg-3 sm-margin-30px-bottom">
                <div class="counter-block text-center">
                    <h4 class="countup">{{@$rs_facts[0]->val_1}}</h4>
                    <p>{{$l_lang_type==1?@$rs_facts[0]->caption_1:@$rs_facts[0]->caption_1_l}}</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 sm-margin-30px-bottom">
                <div class="counter-block text-center">
                    <h4 class="countup">{{@$rs_facts[0]->val_2}}</h4>
                    <p>{{$l_lang_type==1?@$rs_facts[0]->caption_2:@$rs_facts[0]->caption_2_l}}</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="counter-block text-center">
                    <h4 class="countup">{{@$rs_facts[0]->val_3}}</h4>
                    <p>{{$l_lang_type==1?@$rs_facts[0]->caption_3:@$rs_facts[0]->caption_3_l}}</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="counter-block text-center">
                    <h4 class="countup">{{@$rs_facts[0]->val_4}}</h4>
                    <p>{{$l_lang_type==1?@$rs_facts[0]->caption_4:@$rs_facts[0]->caption_4_l}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end counter section -->

<!-- start news section -->
<section>
    <div class="container">

        <div class="section-heading">
            <h3>Events</h3>
            <span class="title-separator"></span>
        </div>

        <div class="row">
            @foreach ($rs_events as $rs_events_val)
                <div class="col-md-4 padding-20px-all sm-padding-25px-all xs-padding-20px-all">

                    <div class="news-block purple">
                        <div class="news-img">
                            <a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}"><img src="{{ asset($rs_events_val->image) }}" alt="" /></a>
                            <div class="date-details">
                                <span class="date">{{date('d', strtotime($rs_events_val->date))}}</span>
                                <p class="month">{{date('M', strtotime($rs_events_val->date))}}</p>
                            </div>
                        </div>
                        <div class="news-details">
                            <ul class="blog-deta">
                                <li>
                                    <a><i aria-hidden="true" class="fas fa-clock"></i>{{$l_lang_type==1?$rs_events_val->time:$rs_events_val->time}}</a>
                                </li>
                            </ul>
                            <h4><a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}">{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a></h4>
                            <p>{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
                            <a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}">read more ...</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- end news section -->

<!-- start footer section -->
@endsection