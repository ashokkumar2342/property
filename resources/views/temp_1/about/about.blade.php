@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_about = App\Helper\WebHelper::getAbout();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper about-us">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'About Us':'हमारे बारे में'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	ABOUT MEDIA
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8 bg-purple"  style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
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

      <div class="col-sm-6 col-xs-12">
        {!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}
      </div>
    </div>
  </div>
</section>
</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection