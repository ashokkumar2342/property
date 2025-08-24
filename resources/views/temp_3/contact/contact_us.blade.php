@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Contact':'संपर्क'}} <span class="text-theme-colored3">{{$l_lang_type==1?'Us':'करें'}}</span></h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                                <span class="trail-item trail-begin">
                                    <a href="{{ route('template.index',[3,$l_lang_type]) }}"><span>{{$l_lang_type==1?'Home':'होमे'}}</span></a>
                                </span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
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
                                <div class="content">{{@$rs_school_detail[0]->address}}</div>
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
                                    <label>Name <small>*</small></label>
                                    <input type="text" name="name" class="form-control border-primary" placeholder="First name" required="" maxlength="50">
                                </div>
                                <p class="text-danger" style="color:red">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Email <small>*</small></label>
                                    <input type="email" name="email_id" class="form-control border-success" placeholder="Email address" required="" maxlength="50">
                                </div>
                                <p class="text-danger" style="color:red">{{ $errors->first('email_id') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Phone <small>*</small></label>
                                    <input type="text" name="mobile_no" class="form-control border-purple" placeholder="Phone" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                                </div>
                                <p class="text-danger" style="color:red">{{ $errors->first('mobile_no') }}</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Subject <small>*</small></label>
                                    <input type="text" name="subject" class="form-control border-pink" placeholder="Subject" required="" maxlength="50">
                                </div>
                                <p class="text-danger" style="color:red">{{ $errors->first('subject') }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Message</label>
                            <textarea class="form-control border-info" name="message" placeholder="Write message" rows="6" maxlength="200"></textarea>
                        </div>
                        <div class="mb-3">
                            <input name="form_botcheck" class="form-control" type="hidden" value />
                            <button type="submit" class="btn btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Send your message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid pt-0 pb-0">
            <div class="row">
                {!!@$rs_school_detail[0]->c_map!!}
            </div>
        </div>
    </section>

</div>

@endsection
