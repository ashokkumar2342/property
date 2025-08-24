@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Notice': 'सूचना'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Board': 'पट्ट'}}</span></h2>
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
    <section class="bg-img-cover bg-img-center" data-tm-bg-img="" style="background-color: #ea77ad!important;">
      <div class="container">
        <div class="card card-product border-primary card-hover" style="height: 600px;border: 1px solid black;overflow-x: hidden;overflow-y: scroll;">
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
      </div>
      <br>
      <div class="tm-floating-objects">
        <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
      </div>
    </section>


  

  

</div> 
@endsection