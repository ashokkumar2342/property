@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Contact Us':'संपर्क करें'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 xs-margin-30px-bottom">
                <div class="contact-detail text-center">
                    <div class="contact-icon bg-sky">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="text-uppercase margin-5px-bottom margin-25px-top sm-margin-20px-top font-size20 md-font-size18 sm-font-size16">{{$l_lang_type==1?'Our Address':'हमारा पता'}}</h5>
                    <p class="no-margin-bottom">{{$l_lang_type==1?@$rs_school_detail[0]->address:@$rs_school_detail[0]->address_l}}</p>
                </div>
            </div>

            <div class="col-md-4 xs-margin-30px-bottom">
                <div class="contact-detail text-center">
                    <div class="contact-icon bg-yellow yellow-border">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5 class="text-uppercase margin-5px-bottom margin-25px-top sm-margin-20px-top font-size20 md-font-size18 sm-font-size16">{{$l_lang_type==1?'Phone No.':'फोन नंबर।'}}:</h5>
                    <p class="no-margin-bottom">{{@$rs_school_detail[0]->mobile}} , {{@$rs_school_detail[0]->contact}}
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-detail text-center">
                    <div class="contact-icon bg-pink pink-border">
                        <i class="far fa-envelope"></i>
                    </div>
                    <h5 class="text-uppercase margin-5px-bottom margin-25px-top sm-margin-20px-top font-size20 md-font-size18 sm-font-size16">{{$l_lang_type==1?'Email':'ईमेल'}}</h5>
                    <p class="no-margin-bottom"><a>{{@$rs_school_detail[0]->email}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact info section -->

<!-- start contact form section -->
<section class="no-padding-top">
    <div class="container">
        <div class="section-heading">
            <h3>Send Your Message</h3>
            <span class="title-separator"></span>
        </div>
        <div class="row">
            <div class="col-lg-9 center-col">

                
                    <form action="{{ route('admin.messageform') }}" method="post" class="add_form">
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{$l_lang_type==1?'Name':'नाम'}} *:</label>
                                    <input type="text" name="name" class="form-control border-primary" placeholder="{{$l_lang_type==1?'Name':'नाम'}}" required="" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{$l_lang_type==1?'Email':'ईमेल'}} *:</label>
                                    <input type="email" name="email_id" class="form-control border-success" placeholder="{{$l_lang_type==1?'Email':'ईमेल'}}" required="" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}} *:</label>
                                    <input type="text" name="mobile_no" class="form-control border-purple" placeholder="{{$l_lang_type==1?'Mobile Number':'मोबाइल नंबर'}}" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{$l_lang_type==1?'Subject':'विषय'}} *:</label>
                                    <input type="text" name="subject" class="form-control border-pink" placeholder="{{$l_lang_type==1?'Subject':'विषय'}}" required="" maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}</label>
                                <div class="form-group">
                                    <textarea class="form-control border-info" name="message" placeholder="{{$l_lang_type==1?'Write Message':'मेसेज लिखना'}}" rows="6" maxlength="200"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center margin-25px-top xs-margin-15px-top">
                                <button type="submit" class="butn">{{$l_lang_type==1?'Send Message':'मेसेज भेजें'}}</button>
                            </div>
                        </div>
                    </form>
                

            </div>
        </div>
    </div>
</section>
<!-- end contact form section -->

<!-- start map section -->
<section class="no-padding-top">
        {!!@$rs_school_detail[0]->c_map!!}
</section>
    
@endsection
