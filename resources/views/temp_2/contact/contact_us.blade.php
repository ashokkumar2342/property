@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Contact us':'संपर्क करें'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Contact us':'संपर्क करें'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <section class="contact contact-page">
    <div class="contact-details padding-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12">
            <ul>
              <li class="contact-item">
                <span class="icon flaticon-signs"></span>
                <div class="content">
                  <h4>Our Address</h4>
                  <p style="color:#fff">{{$rs_school_detail[0]->address}}</p>
                </div>
              </li>
              <li class="contact-item">
                <span class="icon flaticon-smartphone"></span>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p style="color:#fff">{{$rs_school_detail[0]->mobile}}</p>
                </div>
              </li>
              <li class="contact-item">
                <span class="icon flaticon-message"></span>
                <div class="content">
                  <h4>Email Address</h4>
                  <p style="color:#fff">{{$rs_school_detail[0]->email}}</p>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-lg-8 col-md-6 col-xs-12">
            <form class="contact-form">
              <input type="text" name="name" class="form-control contact-input" placeholder="First name" required="" maxlength="50">
              <input type="email" name="email_id" class="form-control contact-input" placeholder="Email address" required="" maxlength="50">
              <input type="text" name="mobile_no" class="form-control contact-input" placeholder="Phone" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
              <input type="text" name="subject" class="form-control contact-input" placeholder="Subject" required="" maxlength="50">
              <textarea class="form-control contact-input" name="message" placeholder="Write message" rows="6" maxlength="200"></textarea>
              <input type="submit" name="submit" value="Send Message" class="contact-button">
            </form>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- contact-details -->
    <div class="contact-map" id="map-canvas">
      {!!$rs_school_detail[0]->c_map!!}
    </div>
  </section>


  <!-- Footer Start here -->
  @endsection