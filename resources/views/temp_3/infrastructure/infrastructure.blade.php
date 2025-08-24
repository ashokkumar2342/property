@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper teachers">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Infrastructure': 'आधारभूत संरचना'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Infrastructure': 'आधारभूत संरचना'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

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
            <a href="#" class="position-relative">
              <img class="card-img-top lazyestload" data-src="{{ asset($rs_infr_val->image) }}" src="{{ asset($rs_infr_val->image) }}" alt="Card image">
            </a>
            <div class="card-body border-top-5 px-3 border-primary">
              <h3 class="card-title">
                <a class="{{$rs_infr_val->text_color}} text-capitalize d-block text-truncate" href="#">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a>
              </h3>
              <p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection