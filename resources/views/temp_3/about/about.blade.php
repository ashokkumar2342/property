@php
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
}else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
}
$rs_about = App\Helper\WebHelper::getAbout();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'About':'हमारे'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Us':'बारे में'}}</span></h2>
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

    <section>
      <div class="container" data-tm-padding-bottom="220px">
        <div class="section-content">
          <div class="row">
            <div class="col-lg-5 col-xl-5 offset-xl-1 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
              <div class="video-popup">
                <a>
                  <img alt src="{{ asset(@$rs_about[0]->image) }}" class="img-fullwidth">
                </a>
              </div>
            </div>
            <div class="col-lg-7 col-xl-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
              <div class="about-text-content mb-md-30">

                <p>{!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="tm-floating-objects">
        <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
      </div>
    </section>

</div>
@endsection