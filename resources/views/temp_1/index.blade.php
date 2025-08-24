@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_home_banner = App\Helper\WebHelper::getHomeBannerImage();
  $rs_features = App\Helper\WebHelper::getFeatures(6);
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(4);
  $rs_teacher = App\Helper\WebHelper::getTeacher(6);
  $rs_gallery = App\Helper\WebHelper::getGellery(4);
  $rs_events = App\Helper\WebHelper::getEvents(2);
  $rs_about = App\Helper\WebHelper::getAbout();
  $rs_facts = App\Helper\WebHelper::getFacts();
  $rs_whos_who = App\Helper\WebHelper::getWhosWho();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(3);
  
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)

<div class="main-wrapper home-fashion">
<!--====================================
——— BEGIN MAIN SLIDE LIST
===================================== -->
<section class="rev_slider_wrapper fullwidthbanner-container over" dir="ltr">

  <!-- the ID here will be used in the JavaScript below to initialize the slider -->
  <div id="rev_slider_1" class="rev_slider rev-slider-kidz-school" data-version="5.4.5" style="display:none">

		<ul>
			<!-- SLIDE 1  -->
      @foreach ($rs_home_banner as $val_home_banner)
			<li data-transition="fade">
				<img src="{{ asset($val_home_banner->image) }}" alt="Sky" class="rev-slidebg">
        <!-- LAYERS -->
        
        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-resizeme font-dosis font-weight-bold"
          data-frames='[{
            "delay":1600,"speed":1000,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
            {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

          data-visibility="on"
          data-x="left"
          data-y="middle"
          style="z-index: 1;">
            <span>{!!$l_lang_type == 1?$val_home_banner->description:$val_home_banner->description_l!!}</span>
        </div>
        
        
			</li>
      @endforeach
			
		</ul>
  </div>
</section>

<!-- ====================================
———	BOX SECTION
===================================== -->
<section class="d-none d-sm-block section-top">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-3">
				<a href="#about">
					<div class="card bg-primary card-hover">
						<div class="card-body text-center p-0">
							<div class="card-icon-border-large border-primary">
								<i class="far fa-file-alt" aria-hidden="true"></i>
							</div>
							<h2 class="text-white font-size-32 pt-1 pt-lg-5 pb-2 pb-lg-6 mb-0 font-dosis">{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h2>
							<a href="#about" class="btn-scroll-down d-block pb-4 pb-lg-5">
								<i class="fas fa-chevron-down" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</a>
      </div>

      <div class="col-sm-3">
				<a href="#teachers">
					<div class="card bg-success card-hover">
						<div class="card-body text-center p-0">
							<div class="card-icon-border-large border-success">
								<i class="far fa-calendar" aria-hidden="true"></i>
							</div>
							<h2 class="text-white font-size-32 pt-1 pt-lg-5 pb-2 pb-lg-6 mb-0 font-dosis">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</h2>
							<a href="#teachers" class="btn-scroll-down d-block pb-4 pb-lg-5">
								<i class="fas fa-chevron-down" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</a>
      </div>

      <div class="col-sm-3">
				<a href="#gallery_home">
					<div class="card bg-danger card-hover">
						<div class="card-body text-center p-0">
							<div class="card-icon-border-large border-danger">
								<i class="far fa-image" aria-hidden="true"></i>
							</div>
							<h2 class="text-white font-size-32 pt-1 pt-lg-5 pb-2 pb-lg-6 mb-0 font-dosis">{{$l_lang_type==1?'Gallery':'गैलरी'}}</h2>
              <a href="#gallery_home" class="btn-scroll-down d-block pb-4 pb-lg-5">
                <i class="fas fa-chevron-down" aria-hidden="true"></i>
              </a>
						</div>
					</div>
				</a>
      </div>

      <div class="col-sm-3">
				<a href="#events">
					<div class="card bg-info card-hover">
						<div class="card-body text-center p-0">
							<div class="card-icon-border-large border-info">
								<i class="far fa-copy" aria-hidden="true"></i>
							</div>
							<h2 class="text-white font-size-32 pt-1 pt-lg-5 pb-2 pb-lg-6 mb-0 font-dosis">{{$l_lang_type==1?'Events':'आयोजन'}}</h2>
							<a href="#events" class="btn-scroll-down d-block pb-4 pb-lg-5">
								<i class="fas fa-chevron-down" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</a>
      </div>
    </div>
  </div>
</section>

<!-- ====================================
———	HOME FEATURE
===================================== -->
<section class="bg-pink py-5 py-md-9" style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-white">{{$l_lang_type==1?'Notice Board':'सूचना पट्ट'}} </h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="card card-product border-primary card-hover" style="height: 300px;">
      <marquee direction="up" scrolldelay="100" onmouseover="stop()" onmouseout="start()">
        <div class="row" style="margin:10px;">
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
        </div>
      </marquee>
    </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="{{ route('template.notice',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>
<section class="pt-9 pb-6 py-md-7">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}} </h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row wow fadeInUp">
      <!-- Media -->
      @foreach ($rs_features as $rs_val)
        <div class="col-sm-6 col-xl-4 col-xs-12">
          <div class="media mb-6">
            <div class="{{$rs_val->icon_color}} media-icon-large me-xl-4">
              <i class="{{$rs_val->icon}}" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="{{$rs_val->text_color}}"><a href="{{ route('template.singal.features',[1,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h3>
              <p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="{{ route('template.features',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>

<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-purple" id="about"  style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-white">{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xs-12 order-md-1">
        <div class="image mb-4 mb-md-0">
          <img class="img-fluid rounded" src="{{ asset(@$rs_about[0]->image) }}" alt="features-img1.jpg">
        </div>
      </div>

      <div class="col-sm-6 col-xs-12" style="text-align: justify;">
        {!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}
      </div>
    </div>
  </div>
</section>

<!-- ====================================
———	COURSES SECTION
===================================== -->
<section class="py-9" id="courses">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row wow fadeInUp">
      <!-- Card -->
      @foreach ($rs_infrastructure as $rs_infr_val)
      <div class="col-sm-6 col-lg-3 col-xs-12">
        <div class="card">
          <a href="{{ route('template.infrastructure',[1,$l_lang_type]) }}" class="position-relative">
            <img class="card-img-top lazyestload" data-src="{{ asset($rs_infr_val->image) }}" src="{{ asset($rs_infr_val->image) }}" alt="Card image">
          </a>
          <div class="card-body border-top-5 px-3 border-primary">
            <h3 class="card-title">
              <a class="{{$rs_infr_val->text_color}} text-capitalize d-block text-truncate" href="{{ route('template.infrastructure',[1,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a>
            </h3>
            <p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="{{ route('template.infrastructure',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>

<!-- ====================================
———	TEACHERS SECTION
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-pink"  style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8">
      <span class="shape shape-left bg-danger"></span>
      <h2 class="text-white">{{$l_lang_type==1?"Who's Who":'कौन कौन है'}}</h2>
      <span class="shape shape-right bg-danger"></span>
    </div>

    <div class="team-slider owl-carousel owl-theme" dir="ltr">
      @foreach ($rs_whos_who as $rs_whos_who_val)
        <div class="card card-hover card-transparent shadow-none">
          <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
            <img class="card-img-top rounded-circle" src="{{ asset($rs_whos_who_val->image) }}" alt="carousel-img"/>
          </div>
          <div class="card-body text-center">
            <a class="font-size-20 font-weight-medium d-block mb-1" target="_blank" href="{{ route('template.singal.message',[1, $l_lang_type, $rs_whos_who_val->id]) }}">{{$l_lang_type==1?$rs_whos_who_val->name:$rs_whos_who_val->name_l}}</a>
            <span class="text-white font-size-15">{{$l_lang_type==1?$rs_whos_who_val->designation:$rs_whos_who_val->designation_l}}</span>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>
</section>
<section class="py-10" id="teachers">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Our Teachers':'हमारे अध्यापक'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row">
      @foreach ($rs_teacher as $rs_teacher_val)
      <div class="col-sm-4 col-xs-12 mb-7 mb-md-8 mb-lg-9">
        <div class="media media-avator-view flex-column flex-sm-row">
          <a class="media-img mb-5 mb-sm-0 me-md-5 me-lg-6 rounded-sm shadow-sm">
            <img class="rounded-sm" src="{{ asset($rs_teacher_val->image) }}" alt="avator-img1.jpg">
          </a>
          <div class="media-body">
            <a class="{{$rs_teacher_val->text_color}} font-size-20 font-weight-medium d-inline-block mb-1">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</a>

            <span class="text-muted font-size-15 mb-1 d-block"><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
            <p>{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="{{ route('template.teacher',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>
<!-- ====================================
——— CALL TO ACTION
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-purple" style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
 {{--  <div class="container">
    <div class="wow fadeInUp">
      <div class="section-title justify-content-center">
        <h2 class="text-white text-center">Need More Information?</h2>
      </div>
      <div class="text-center">
        <p class="text-white font-size-18 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod</p>
        <a href="#" class="btn btn-danger shadow-sm text-uppercase mt-4">
          <i class="fas fa-phone-alt me-2" aria-hidden="true"></i>Contact
        </a>
      </div>
    </div>
  </div> --}}
</section>
<!-- ====================================
———	GALLERY
===================================== -->
<section class="pt-9 pb-7 py-md-10" id="gallery_home">
	<div class="container">
		<div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Our Gallery':'हमारी गैलरी'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div id="gallery-grid">
			<div class="row grid wow fadeInUp">
        @php
            $counter = 0;
        @endphp
        @foreach ($rs_gallery as $rs_gallery_val)
        @php
            $counter ++;
            
            if ($counter == 1) {
              $color = 'danger';
            }
            if ($counter == 2) {
              $color = 'warning';
            }
            if ($counter == 3) {
              $color = 'success';
            }
            if ($counter == 4) {
              $color = 'pink';
            }
        @endphp
          <div class="col-md-4 col-lg-3 col-xs-12 element-item nature">
            <div class="media media-hoverable justify-content-center">
              <div class="position-relative w-100">
                <img class="media-img w-100 lazyestload" data-src="{{ asset($rs_gallery_val->image) }}" src="{{ asset($rs_gallery_val->image) }}" alt="gallery-img">
                <a class="media-img-overlay" data-fancybox="gallery" href="{{ asset($rs_gallery_val->image) }}">
                  <div class="btn btn-squre">
                    <i class="fas fa-search-plus"></i>
                  </div>
                </a>
                <div class="card-body bg-{{$color}} pt-3 px-3 pb-1">
                  <h5 class="">
                    <a class="text-white">{{$l_lang_type==1?$rs_gallery_val->title:$rs_gallery_val->title_l}}</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          @php
              if ($counter == 4) {
                  $counter = 0;
              }                        
          @endphp
        @endforeach
			</div>
    </div>

		<div class="btn-aria text-center mt-4 wow fadeInUp">
			<a href="{{ route('template.gallery',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">{{$l_lang_type==1?'View More':'और देखें'}}</a>
		</div>
	</div>
</section>

<!-- ====================================
———	COUNTER-UP SECTION
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-purple"  style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
  <div class="container">
    <div class="sectionTitleSmall text-center mb-7 wow fadeInUp">
      <h2 class="font-weight-bold text-white">{{$l_lang_type==1?@$rs_facts[0]->title:@$rs_facts[0]->title_l}}</h2>
      <p class="text-white font-size-15">{{$l_lang_type==1?@$rs_facts[0]->sub_title:@$rs_facts[0]->sub_title_l}}</p>
    </div>

    <div class="row wow fadeInUp" id="counter">
      <div class="col-sm-3 col-xs-12">
        <div  class="text-center text-white mb-5">
					<div class="counter-value" data-count="{{@$rs_facts[0]->val_1}}">0</div>
          <span class="d-inline-block bg-primary text-uppercase font-weight-medium rounded-sm shadow-sm mt-1 py-2 px-3">{{$l_lang_type==1?@$rs_facts[0]->caption_1:@$rs_facts[0]->caption_1_l}}</span>
        </div>
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="text-center text-white mb-5">
					<div class="counter-value" data-count="{{@$rs_facts[0]->val_2}}">0</div>
          <span class="d-inline-block bg-success text-uppercase font-weight-medium rounded-sm shadow-sm mt-1 py-2 px-3">{{$l_lang_type==1?@$rs_facts[0]->caption_2:@$rs_facts[0]->caption_2_l}}</span>
        </div>
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="text-center text-white mb-5">
          <div class="counter-value" data-count="{{@$rs_facts[0]->val_3}}">0</div>
          <span class="d-inline-block bg-danger text-uppercase font-weight-medium rounded-sm shadow-sm mt-1 py-2 px-3">{{$l_lang_type==1?@$rs_facts[0]->caption_3:@$rs_facts[0]->caption_3_l}}</span>
        </div>
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="text-center text-white mb-5">
					<div class="counter-value" data-count="{{@$rs_facts[0]->val_4}}">0</div>
          <span class="d-inline-block bg-info text-uppercase font-weight-medium rounded-sm shadow-sm mt-1 py-2 px-3">{{$l_lang_type==1?@$rs_facts[0]->caption_4:@$rs_facts[0]->caption_4_l}}</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ====================================
———	BLOG SECTION
===================================== -->

<section class="pt-7 pb-9 pt-md-10" id="events">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Events':'आयोजन'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="row">
      @foreach ($rs_events as $rs_events_val)
      <div class="col-md-6">
        <div class="{{$rs_events_val->text_color}} media media-events-list">
          <a class="media-img" href="{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}">
            <img src="{{ asset($rs_events_val->image) }}" alt="events-image">
            <div class="media-img-overlay p-4">
              <span class="{{$rs_events_val->text_color}} badge badge-rounded "> {{date('d', strtotime($rs_events_val->date))}} <br> {{date('M', strtotime($rs_events_val->date))}}</span>
            </div>
          </a>
          <div class="media-body">
            <h3 class="media-heading mb-4">
              <a class="text-white text-capitalize d-block text-truncate" {{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}>{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a>
            </h3>
            <ul class="list-unstyled mb-2">
              <li class="text-white">
                <i class="far fa-clock me-2" aria-hidden="true"></i>{{$rs_events_val->time}}
              </li>
            </ul>
      
            <p class="text-white mb-5">{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
            <div class="mb-1">
              <a href="{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}" class="btn btn-white btn-sm text-uppercase text-hover-success">{{$l_lang_type==1?'read more':'और पढ़ें'}}</a>
            </div>            
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="{{ route('template.events',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase">{{$l_lang_type==1?'View More':'और देखें'}}</a>
    </div>
  </div>
</section>

<!-- ====================================
———	CONTACT SECTION
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-purple"  style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-6 col-xs-12">
        <div class="section-title align-items-baseline mb-4">
          <h2 class="text-white px-0 mb-0">{{$l_lang_type==1?'Our Address':'हमारा पता'}}</h2>
        </div>
        <ul class="list-unstyled">
          <li class="media align-items-center mb-3">
            <div class="icon-rounded-circle-small bg-primary me-2">
              <i class="fas fa-map-marker-alt text-white"></i>
            </div>
            <div class="media-body">
              <p class="mb-0 text-white">{{$l_lang_type==1?@$rs_school_detail[0]->address:@$rs_school_detail[0]->address_l}}</p>
            </div>
          </li>
          <li class="media align-items-center mb-3">
            <div class="icon-rounded-circle-small bg-success me-2">
              <i class="fas fa-envelope text-white"></i>
            </div>
            <div class="media-body">
              <p class="mb-0 text-white"><a class="text-white">{{@$rs_school_detail[0]->email}}</a></p>
            </div>
          </li>
          <li class="media align-items-center mb-3">
            <div class="icon-rounded-circle-small bg-info me-2">
              <i class="fas fa-phone-alt text-white"></i>
            </div>
            <div class="media-body">
              <p class="mb-0"><a class="text-white">{{@$rs_school_detail[0]->mobile}}</a></p>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-12">
        <form action="{{ route('admin.messageform') }}" method="post" class="add_form">
          {{csrf_field()}}
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group form-group-icon">
                <i class="fa fa-user"></i>
                <input type="text" name="name" class="form-control border-primary" placeholder="{{$l_lang_type==1?'Name':'नाम'}}" required="" maxlength="50">
              </div>
            </div>

            <div class="col-sm-6 col-xs-12">
              <div class="form-group form-group-icon">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email_id" class="form-control border-success" placeholder="{{$l_lang_type==1?'Email':'ईमेल'}}" required="" maxlength="50">
              </div>
            </div>

            <div class="col-sm-6 col-xs-12">
              <div class="form-group form-group-icon">
                <i class="fas fa-phone-alt"></i>
                <input type="text" name="mobile_no" class="form-control border-purple" placeholder="{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}}" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
              </div>
            </div>

            <div class="col-sm-6 col-xs-12">
              <div class="form-group form-group-icon">
                <i class="fa fa-book"></i>
                <input type="text" name="subject" class="form-control border-pink" placeholder="{{$l_lang_type==1?'Subject':'विषय'}}" required="" maxlength="50">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group form-group-icon">
                <i class="fa fa-comments"></i>
                <textarea class="form-control border-info" name="message" placeholder="{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}" rows="6" maxlength="200"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="text-sm-center mt-6">
                <button type="submit" class="btn btn-danger text-uppercase">
                  {{$l_lang_type==1?'Send Message':'मेसेज भेजें'}}
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div> <!-- element wrapper ends -->

<!-- Modal Products -->
<div class="modal fade" id="modal-products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
              {!! @$rs_flash[0]->content!!}
          </div>
          <div class="col-sm-12 col-xs-12 text-center">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ====================================
———	FOOTER
===================================== -->
@endsection


