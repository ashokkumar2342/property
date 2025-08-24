@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper contact-us">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Contact Us': 'संपर्क करें'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Contact Us': 'संपर्क करें'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	ABOUT MEDIA
===================================== -->
<section class="py-8 py-md-10">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Contact Us':'संपर्क करें'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="mb-9">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-4">
            <div class="icon-rounded-circle-large shadow-sm mb-md-2 me-md-0 me-2 me-lg-2 bg-primary">
              <i class="fas fa-map-marker-alt text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-primary mt-0 font-weight-bold mb-3">{{$l_lang_type==1?'Our Address':'हमारा पता'}}:</h3>
              <p class="text-muted font-weight-medium">{{$l_lang_type==1?@$rs_school_detail[0]->address:@$rs_school_detail[0]->address_l}}</p>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-6">
            <div class="icon-rounded-circle-large shadow-sm me-2 mb-md-2 me-md-0 me-lg-2 bg-success">
              <i class="fas fa-phone-alt text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-success mt-0 font-weight-bold mb-3">{{$l_lang_type==1?'Phone No.':'फोन नंबर।'}}:</h3>
              <a class="text-muted font-weight-medium" href="tel:954 124 2542 Or 546 235 4478">
                {{@$rs_school_detail[0]->mobile}} , {{@$rs_school_detail[0]->contact}}
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-3 mb-md-0">
            <div class="icon-rounded-circle-large shadow-sm me-2 mb-md-2 me-md-0 me-lg-2 bg-danger">
              <i class="far fa-envelope text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-danger">{{$l_lang_type==1?'Email':'ईमेल'}}:</h3>
              <p class="font-weight-medium">
                <a class="text-muted">{{@$rs_school_detail[0]->email}}</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-10">
      {!!@$rs_school_detail[0]->c_map!!}
    </div>

    <div>
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
</section>

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection
