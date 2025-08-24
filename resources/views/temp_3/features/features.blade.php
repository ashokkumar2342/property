@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_features = App\Helper\WebHelper::getFeatures(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Our': 'हमारी'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Features': 'विशेषताएं'}}</span></h2>
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
        </div>
    </section>


  

  

</div> 

<!-- ====================================
———	FOOTER
===================================== -->
@endsection