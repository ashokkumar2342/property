@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper events">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	EVENTS SECTION
===================================== -->
<section class="pt-10 pb-3 pb-md-7 pb-lg-8">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="row">
      <div class="col-sm-12 col-xs-12 table-responsive">
        {!!$l_lang_type==1?@$result_rs[0]->page_content: @$result_rs[0]->page_content_l!!}
      </div>
      @if (!empty($result_rs[0]->file_path))
      <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
          <iframe src="{{ asset(@$result_rs[0]->file_path) }}"  width="100%" height="800px"></iframe>
      </div>
        
      @endif
  </div>
</section>



</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection