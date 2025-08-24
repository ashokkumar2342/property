@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(0);
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
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Notice Board': 'सूचना पट्ट'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Notice Board': 'सूचना पट्ट'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-pink py-5 py-md-9" style="background-image: url('{{ asset('temp_1/assets/img/background/avator-bg.png') }}');">
    <div class="container">
      <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
        <span class="shape shape-left bg-info"></span>
        <h2 class="text-white">{{$l_lang_type==1?'Notice Board':'सूचना पट्ट'}} </h2>
        <span class="shape shape-right bg-info"></span>
      </div>
      <div class="card card-product border-primary card-hover">
        <div class="row" style="margin:10px;">
          <div class="col-md-12">
            @foreach ($rs_notice_board as $rs_notice_board_val)
              <div class="event_date">
                <div class="event-date-wrap">
                  <p>{{date('d', strtotime($rs_notice_board_val->date)) }}</p>
                  <span>{{date('M.Y', strtotime($rs_notice_board_val->date)) }}</span>
                  <span></span>
                </div>
              </div>
              <div class="date-description">
                @if ($rs_notice_board_val->file_path != '')
                  <a target="_blank" href="{{ asset($rs_notice_board_val->file_path) }}">
                @endif
                <h3>{{$l_lang_type==1?$rs_notice_board_val->title:$rs_notice_board_val->title_l}}</h3>
                <p>{{$l_lang_type==1?$rs_notice_board_val->sub_title:$rs_notice_board_val->sub_title_l}}</p>
                </a>
                <hr class="event_line">
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="btn-aria text-center mt-4 wow fadeInUp">
        <a href="{{ route('template.notice',[1,$l_lang_type]) }}" class="btn btn-danger text-uppercase box-shadow">View More</a>
      </div>
    </div>
  </section>

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection