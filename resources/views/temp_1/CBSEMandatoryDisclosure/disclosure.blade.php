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
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'CBSE Mandatory Disclosure': 'सीबीएसई अनिवार्य प्रकटीकरण'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'CBSE Mandatory Disclosure': 'सीबीएसई अनिवार्य प्रकटीकरण'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	EVENTS SECTION
===================================== -->
<section class="pt-9 pb-8 pt-md-5 pb-lg-9 pt-xl-7">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'CBSE Mandatory Disclosure': 'सीबीएसई अनिवार्य प्रकटीकरण'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
      @php
          $counter = 0;
      @endphp
      @foreach ($rs_records as $rs_values)
        @php
            $counter ++;
            
            if ($counter == 0) {
              $color = 'primary';
            }
            if ($counter == 1) {
              $color = 'warning';
            }
            if ($counter == 2) {
              $color = 'success';
            }
            if ($counter == 3) {
              $color = 'danger';
            }
        @endphp
        <div class="col-sm-6 col-lg-3 col-xs-12">
          <div class="card card-border border-{{$color}} card-hover bg-white">
            <a class="position-relative" target="_blank" href="{{ asset(@$rs_values->file_path) }}">
              <iframe src="{{ asset(@$rs_values->file_path) }}" style="width:280px;"></iframe>
            </a>
            <div class="card-body bg-{{$color}} px-5 py-6">
              <h5 class="mb-1">
                <a target="_blank" class="text-white font-size-20" href="{{ asset(@$rs_values->file_path) }}">{{$l_lang_type==1?$rs_values->link_name: $rs_values->link_name_l}}</a>
              </h5>
              <a target="_blank" href="{{ asset(@$rs_values->file_path) }}" class="btn btn-sm btn-white text-hover-{{$color}} text-uppercase d-inline-block">
                <i class="fa fa-eye me-2" aria-hidden="true"></i>Download
              </a>
            </div>
          </div>
        </div>
      @php
          if ($counter == 3) {
              $counter = 1;
          }                        
      @endphp
      @endforeach
    </div>
  </div>
</section>

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection