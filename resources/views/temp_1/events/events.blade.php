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
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Events': 'आयोजन'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Events': 'आयोजन'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	EVENTS SECTION
===================================== -->
<section class="pt-7 pb-9 pt-md-10">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Events':'आयोजन'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="row">
      @foreach ($rs_events as $rs_events_val)
      <div class="col-md-6">
        <div class="{{$rs_events_val->text_color}} media media-events-list">
          <a class="media-img" href="{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}">
            <img src="{{ asset($rs_events_val->image) }}" alt="events-image">
            <div class="media-img-overlay p-4">
              <span class="{{$rs_events_val->text_color}} badge badge-rounded "> {{date('d', strtotime($rs_events_val->date))}} <br> {{date('M', strtotime($rs_events_val->date))}}</span>
            </div>
          </a>
          <div class="media-body">
            <h3 class="media-heading mb-4">
              <a class="text-white text-capitalize d-block text-truncate" href="{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}">{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a>
            </h3>
            <ul class="list-unstyled mb-2">
              <li class="text-white">
                <i class="far fa-clock me-2" aria-hidden="true"></i>{{$rs_events_val->time}}
              </li>
            </ul>
      
            <p class="text-white mb-5">{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
            <div class="mb-1">
              <a href="{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}" class="btn btn-white btn-sm text-uppercase text-hover-success">{{$l_lang_type==1?'read more':'और पढ़ें'}}</a>
            </div>         
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