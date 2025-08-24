@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
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
          <h1 class="breadcrumb-title">{{$l_lang_type==1?"Message": 'संदेश'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?"Message": 'संदेश'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="py-7 py-md-10">
    <div class="container">
      <div class="section-title justify-content-center mb-4 mb-md-8">
        <span class="shape shape-left bg-info"></span>
        <h2 class="text-danger">{{$l_lang_type==1?"Message": 'संदेश'}}</h2>
        <span class="shape shape-right bg-info"></span>
      </div>
      @foreach ($result_rs as $result_val)
        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div class="image mb-5 mb-md-0">
              <img class="w-100 rounded" src="{{ asset(@$result_val->image) }}" alt="team-1.jpg">
            </div>
          </div>

          <div class="col-sm-8 col-xs-12">
            <h2 class="text-warning font-weight-bold text-capitalize ps-0 mb-5">{{$l_lang_type==1?@$result_val->name : @$result_val->name_l}}</h2>
            <div class="text-white rounded bg-danger text-uppercase font-weight-medium px-6 py-3 mb-3">{{$l_lang_type==1?@$result_val->designation : @$result_val->designation_l}}</div>
            {!!$l_lang_type==1?@$result_val->message : @$result_val->message_l!!}
          </div>
        </div>
        <br>
        
      @endforeach
    </div>
  </section>
  
</div> <!-- element wrapper ends -->

<!-- ====================================
——— FOOTER
===================================== -->
@endsection