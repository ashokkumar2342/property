@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_home_banner = App\Helper\WebHelper::getHomeBannerImage();
  $rs_features = App\Helper\WebHelper::getFeatures(6);
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(4);
  $rs_teacher = App\Helper\WebHelper::getTeacher(6);
  $rs_gallery = App\Helper\WebHelper::getGellery(6);
  $rs_events = App\Helper\WebHelper::getEvents(6);
  $rs_about = App\Helper\WebHelper::getAbout();
  $rs_facts = App\Helper\WebHelper::getFacts();
  $rs_whos_who = App\Helper\WebHelper::getWhosWho();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(4);
  
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)

<!-- header End here -->
<style type="text/css">

</style>
<!-- Banner Start here -->
<section class="banner section-notch">
	<div class="banner-slider swiper-container">
		<div class="swiper-wrapper">
			@foreach ($rs_home_banner as $val_home_banner)
			<div class="banner-item slide-one swiper-slide" style="background-image: url('{{ asset($val_home_banner->image) }}');">
				<div class="banner-overlay"></div>
				<div class="container">
					<div class="banner-content">
						<h3>{!!$l_lang_type == 1?$val_home_banner->description:$val_home_banner->description_l!!}</h3>
						<ul>
							<li><a href="#" class="button-default">Read More</a></li>
							<li><a href="#" class="button-default">Buy Now</a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="swiper-pagination"></div>
	</div>
</section>
<!-- Banner End here -->

<!-- facility Start here -->
<section class="facility facility-two">
  <div class="container">
    <div class="facility-items">
      <div class="facility-item">
        <div class="front-part">
          <span class="icon-two fas fa-info"></span>
          <h4>{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h4>
        </div>
        <div class="back-part">
          <span class="icon-two fas fa-info"></span>
          <h4>{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h4>
        </div>
      </div>
      <div class="facility-item">
        <div class="front-part">
          <span class="icon-two fas fa-users"></span>
          <h4>{{$l_lang_type==1?'Teachers':'अध्यापक'}}</h4>
        </div>
        <div class="back-part">
          <span class="icon-two fas fa-users"></span>
          <h4>{{$l_lang_type==1?'Teachers':'अध्यापक'}}</h4>
        </div>
      </div>
      <div class="facility-item">
        <div class="front-part">
          <span class="icon-two fas fa-image"></span>
          <h4>{{$l_lang_type==1?'Gallery':'गैलरी'}}</h4>
        </div>
        <div class="back-part">
          <span class="icon-two fas fa-image"></span>
          <h4>{{$l_lang_type==1?'Gallery':'गैलरी'}}</h4>
        </div>
      </div>
      <div class="facility-item">
        <div class="front-part">
          <span class="icon-two fas fa-copy"></span>
          <h4>{{$l_lang_type==1?'Events':'आयोजन'}}</h4>
        </div>
        <div class="back-part">
          <span class="icon-two fas fa-copy"></span>
          <h4>{{$l_lang_type==1?'Events':'आयोजन'}}</h4>
        </div>
      </div>
    </div>
  </div>
</section>
<br>

<!-- facility Start here -->
<section class="facility padding-120">
	<div class="container">
		<div class="section-header">
			<h3>{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}}</h3>
		</div>
		<div class="row">
			@foreach ($rs_features as $rs_val)
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="facility-item">
						<span class="icon {{$rs_val->icon}}"></span>
						<h4 class="{{$rs_val->text_color}}"><a href="{{ route('template.singal.features',[2,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h4>
						<p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
					</div>
				</div>
			@endforeach
		</div>
		<br>
		<div class="class-button text-center">
			<a href="{{ route('template.features',[2,$l_lang_type]) }}" class="button-default">{{$l_lang_type==1?'View More':'और देखें'}}</a>
		</div>
	</div>
</section>
<!-- facility End here -->


<!-- About Start here -->
<section class="about section-notch">
	<div class="overlay padding-120">
		<div class="container">
			<div class="section-header">
				<h3>{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h3>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="about-image">
						<img src="{{ asset(@$rs_about[0]->image) }}" alt="about image" class="img-responsive">
					</div>
				</div>
				<div class="col-sm-6 col-xs-12" style="text-align: justify;">
				  {!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- overlay -->
</section><!-- about -->
<!-- About End here -->


<!-- Classes Start here -->
<section class="classes padding-120">
	<div class="container">
		<div class="section-header">
			<h3>{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h3>
		</div>
		<div class="row">
			@foreach ($rs_infrastructure as $rs_infr_val)
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="class-item">
						<div class="image">
							<img src="{{ asset($rs_infr_val->image) }}" alt="class image" class="img-responsive">
						</div>
						<div class="content">
							<h4><a href="{{ route('template.infrastructure',[2,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a></h4>
							<p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="class-button">
			<a href="{{ route('template.infrastructure',[2,$l_lang_type]) }}" class="button-default">{{$l_lang_type==1?'View More':'और देखें'}}</a>
		</div>
	</div><!-- container -->
</section><!-- classes -->
<!-- Classes End here -->

<section class="teachers teachers-three">
    <div class="overlay padding-120">
      <div class="container">
        <div class="section-header">
          <h3>{{$l_lang_type==1?"Who's Who":'कौन कौन है'}}</h3>
        </div>
            <div class="teacher-items">
              <div class="teacher-slider swiper-container swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-874.5px, 0px, 0px); transition-duration: 0ms;">
                  @foreach ($rs_whos_who as $rs_whos_who_val)
                    <div class="teacher-item swiper-slide" style="width: 271.5px; margin-right: 20px;">
                      <div class="teacher-image">
                        <img src="{{ asset($rs_whos_who_val->image) }}" alt="teacher image" class="img-responsive">
                      </div>
                      <div class="teacher-content">
                        <h4><a href="{{ route('template.singal.message',[2, $l_lang_type, $rs_whos_who_val->id]) }}">{{$l_lang_type==1?$rs_whos_who_val->name:$rs_whos_who_val->name_l}}</a></h4>
                        <span>{{$l_lang_type==1?$rs_whos_who_val->designation:$rs_whos_who_val->designation_l}}</span>
                      </div>
                    </div>
                  @endforeach
                  <div class="teacher-item swiper-slide" style="width: 271.5px; margin-right: 20px;">
                    <div class="teacher-image">
                      <img src="images/teachers/teacher_11.jpg" alt="teacher image" class="img-responsive">
                    </div>
                    <div class="teacher-content">
                      <h4><a href="teacher-details.html">Gary Jhonson</a></h4>
                      <span>English Teacher</span>
                    </div>
                  </div><!-- teacher-item -->
                  <div class="teacher-item swiper-slide" style="width: 271.5px; margin-right: 20px;">
                    <div class="teacher-image">
                      <img src="images/teachers/teacher_11.jpg" alt="teacher image" class="img-responsive">
                    </div>
                    <div class="teacher-content">
                      <h4><a href="teacher-details.html">Gary Jhonson</a></h4>
                      <span>English Teacher</span>
                    </div>
                  </div><!-- teacher-item -->
                  <div class="teacher-item swiper-slide" style="width: 271.5px; margin-right: 20px;">
                    <div class="teacher-image">
                      <img src="images/teachers/teacher_12.jpg" alt="teacher image" class="img-responsive">
                    </div>
                    <div class="teacher-content">
                      <h4><a href="teacher-details.html">Robarto Jhonson</a></h4>
                      <span>Math Teacher</span>
                    </div>
                  </div><!-- teacher-item -->

                </div><!-- swiper-wrapper -->
              </div><!-- swiper-container -->
            </div><!-- partner-items -->

          </div>
    </div><!-- overlay -->
  </section>
<br>
<br>
<br>
<!-- Teachers Start here -->
<section class="teachers teachers-page padding-120">
   <div class="container">
		<div class="section-header">
			<h3>{{$l_lang_type==1?'Our Teachers':'हमारे अध्यापक'}}</h3>
		</div>
			<div class="row">
				@foreach ($rs_teacher as $rs_teacher_val)
					<div class="col-lg-6 col-xs-12">
						<div class="teacher-item">
							<div class="teacher-image">
								<img src="{{ asset($rs_teacher_val->image) }}" alt="teacher image" class="img-responsive">
							</div>
							<div class="teacher-content">
								<h4>{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</h4>
								<span><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
								<p>{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
							</div>
						</div><!-- teacher item -->
					</div>
				@endforeach
			</div><!-- row -->
		</div>
		<div class="gallery-button text-center"><a href="{{ route('template.teacher',[2,$l_lang_type]) }}" class="button-default">{{$l_lang_type==1?'View More':'और देखें'}}</a></div>
	</div>
</section><!-- teacher -->
<!-- Teachers End here -->


<!-- Gallery Start here -->
<section class="gallery padding-120">
	<div class="container">
		<div class="section-header">
			<h3>{{$l_lang_type==1?'Our Gallery':'हमारी गैलरी'}}</h3>
		</div>
		<div class="gallery-items">
			@foreach ($rs_gallery as $rs_gallery_val)
				<div class="gallery-item branding packing">
					<div class="gallery-image">
						<img src="{{ asset($rs_gallery_val->image) }}" alt="gallery image" class="img-responsive">
						<div class="gallery-overlay">
							<div class="bg"></div>
						</div>
						<div class="gallery-content">
							<a href="{{ asset($rs_gallery_val->image) }}" data-rel="lightcase:myCollection"><i
									class="icon flaticon-expand"></i></a>
						</div>
					</div>
				</div>
			@endforeach
		</div><!-- gallery items -->
		<div class="gallery-button"><a href="{{ route('template.gallery',[2,$l_lang_type]) }}" class="button-default">{{$l_lang_type==1?'View More':'और देखें'}}</a></div>
	</div><!-- container -->
</section><!-- gallery -->
<!-- Gallery End here -->


<!-- Achievements Start here -->
<section class="achievements section-notch">
	<div class="overlay padding-120">
		<div class="container">
			<div class="section-header">
				<h3 style="color:#fff">{{$l_lang_type==1?@$rs_facts[0]->title:@$rs_facts[0]->title_l}}</h3>
				<p style="color:#fff">{{$l_lang_type==1?@$rs_facts[0]->sub_title:@$rs_facts[0]->sub_title_l}}</p>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-3 col-12">
					<div class="achievement-item">
						<i class="icon flaticon-student"></i>
						<span class="counter">{{@$rs_facts[0]->val_1}}</span><span>+</span>
						<p>{{$l_lang_type==1?@$rs_facts[0]->caption_1:@$rs_facts[0]->caption_1_l}}</p>
					</div><!-- achievement item -->
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="achievement-item">
						<i class="icon flaticon-construction"></i>
						<span class="counter">{{@$rs_facts[0]->val_2}}</span>
						<p>{{$l_lang_type==1?@$rs_facts[0]->caption_2:@$rs_facts[0]->caption_2_l}}</p>
					</div><!-- achievement item -->
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="achievement-item">
						<i class="icon flaticon-school-bus"></i>
						<span class="counter">{{@$rs_facts[0]->val_3}}</span>
						<p>{{$l_lang_type==1?@$rs_facts[0]->caption_3:@$rs_facts[0]->caption_3_l}}</p>
					</div><!-- achievement item -->
				</div>
				<div class="col-md-3 col-sm-3 col-12">
					<div class="achievement-item">
						<i class="icon flaticon-people"></i>
						<span class="counter">{{@$rs_facts[0]->val_4}}</span>
						<p>{{$l_lang_type==1?@$rs_facts[0]->caption_4:@$rs_facts[0]->caption_4_l}}</p>
					</div><!-- achievement item -->
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- overlay -->
</section><!-- achievements -->
<!-- Achievements End here -->

<!-- Event Start here -->
<section class="event event-two padding-120">
  <div class="container">
  	<div class="section-header">
  		<h3>{{$l_lang_type==1?'Events':'आयोजन'}}</h3>
  	</div>
    <div class="event-items">
      <div class="row">
      	@foreach ($rs_events as $rs_events_val)
	        <div class="col-lg-4 col-sm-6 col-xs-12">
	          <div class="event-item">
	            <div class="event-image">
	              <img src="{{ asset($rs_events_val->image) }}" alt="event image" class="img-responsive">
	              <div class="date">
	                <span>{{date('d', strtotime($rs_events_val->date))}}</span>
	                <p>{{date('M', strtotime($rs_events_val->date))}}</p>
	              </div>
	            </div>
	            <div class="event-content">
	              <h4>{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</h4>
	              <ul>
	                <li><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>{{$rs_events_val->time}}</li>
	              </ul>
	              <p>{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
	              <a href="{{ route('template.events.detail',[2,$l_lang_type,$rs_events_val->id]) }}" class="button-default">{{$l_lang_type==1?'read more':'और पढ़ें'}}</a>
	            </div>
	          </div>
	        </div>
	      @endforeach
      </div><!-- row -->
    </div><!-- event items -->
  </div><!-- container -->
</section>
<!-- event End here -->
<section class="contact contact-page">
  <div class="contact-details padding-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <ul>
            <li class="contact-item">
              <span class="icon flaticon-signs"></span>
              <div class="content">
                <h4>{{$l_lang_type==1?'Our Address':'हमारा पता'}}</h4>
                <p style="color:#fff">{{$l_lang_type==1?@$rs_school_detail[0]->address:@$rs_school_detail[0]->address_l}}</p>
              </div>
            </li>
            <li class="contact-item">
              <span class="icon flaticon-smartphone"></span>
              <div class="content">
                <h4>{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}}</h4>
                <p style="color:#fff">{{$rs_school_detail[0]->mobile}}</p>
              </div>
            </li>
            <li class="contact-item">
              <span class="icon flaticon-message"></span>
              <div class="content">
                <h4>{{$l_lang_type==1?'Email':'ईमेल'}}</h4>
                <p style="color:#fff">{{$rs_school_detail[0]->email}}</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-lg-8 col-md-6 col-xs-12">
          <form class="contact-form">
            <input type="text" name="name" class="form-control contact-input" placeholder="{{$l_lang_type==1?'Name':'नाम'}}" required="" maxlength="50">
            <input type="email" name="email_id" class="form-control contact-input" placeholder="{{$l_lang_type==1?'Email':'ईमेल'}}" required="" maxlength="50">
            <input type="text" name="mobile_no" class="form-control contact-input" placeholder="{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}}" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
            <input type="text" name="subject" class="form-control contact-input" placeholder="{{$l_lang_type==1?'Subject':'विषय'}}" required="" maxlength="50">
            <textarea class="form-control contact-input" name="message" placeholder="{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}" rows="6" maxlength="200"></textarea>
            <input type="submit" name="submit" value="{{$l_lang_type==1?'Send Message':'मेसेज भेजें'}}" class="contact-button">
          </form>
        </div>
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- contact-details -->
</section>
<!-- Footer Start here -->
@endsection