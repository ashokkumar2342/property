@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_teacher = App\Helper\WebHelper::getTeacher(0);
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
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Staff': 'कर्मचारी'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Staff': 'कर्मचारी'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="py-10" id="teachers">
    <div class="container">
      <div class="section-title justify-content-center mb-4 mb-md-8">
        <span class="shape shape-left bg-info"></span>
        <h2 class="text-danger">{{$l_lang_type==1?'Our Staff':'हमारे कर्मचारी'}}</h2>
        <span class="shape shape-right bg-info"></span>
      </div>

      <div class="row">
        @foreach ($rs_teacher as $rs_teacher_val)
        <div class="col-sm-6 col-xs-12 mb-7 mb-md-8 mb-lg-9">
          <div class="media media-avator-view flex-column flex-sm-row">
            <a class="media-img mb-5 mb-sm-0 me-md-5 me-lg-6 rounded-sm shadow-sm">
              <img class="rounded-sm" src="{{ asset($rs_teacher_val->image) }}" alt="avator-img1.jpg">
            </a>
            <div class="media-body">
              <a class="{{$rs_teacher_val->text_color}} font-size-20 font-weight-medium d-inline-block mb-1">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</a>

              <span class="text-muted font-size-15 mb-1 d-block"><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
              <p>{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
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