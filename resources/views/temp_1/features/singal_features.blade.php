@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_features = App\Helper\WebHelper::getFeatures(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper teachers">


  <!-- ====================================
  ——— BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Our Features': 'हमारी विशेषताएं'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Our Features': 'हमारी विशेषताएं'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="py-10">
    <div class="container">
      <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
        <span class="shape shape-left bg-info"></span>
        <h2 class="text-danger">{{$l_lang_type==1?$rs_features_tile[0]->title:$rs_features_tile[0]->title_l}} </h2>
        <span class="shape shape-right bg-info"></span>
      </div>
      <div class="row">
        <div class="col-lg-9 col-sm-8 col-xs-12 order-sm-1">
          @foreach ($result_rs as $result_rs_val)
            <div class="card shadow-none bg-transparent">
              <div class="position-relative">
                <img class="w-100 rounded-top" src="{{ asset($result_rs_val->image) }}" alt="events-xl-img1.jpg">
              </div>

              <div class="card-body border-top-5 px-3 border-primary">
                <h3 class="text-primary font-weight-bold mb-4"></h3>
                <p class="text-muted mb-6">{!!$l_lang_type==1?$result_rs_val->description:$result_rs_val->description_l!!}</p>
              </div>
            </div>
          @endforeach
        </div>

        <div class="col-lg-3 col-sm-4 col-xs-12">
          <div class="">
            <div class="section-title bg-primary rounded-top">
              <h3 class="text-capitalize text-white font-weight-bold rounded py-2 ps-3 mb-0">{{$l_lang_type==1?'Our Features': 'हमारी विशेषताएं'}}</h3>
            </div>
            <div class="border border-top-0 px-4 py-5 rounded-bottom">
              @foreach ($rs_features as $rs_val)
                <div class="media mb-3">
                  <div class="{{$rs_val->icon_color}} media-icon-large me-xl-4">
                    <i class="{{$rs_val->icon}}" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h3 class="{{$rs_val->text_color}}"><a href="{{ route('template.singal.features',[1,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h3>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div> <!-- element wrapper ends -->

<!-- ====================================
——— FOOTER
===================================== -->
@endsection