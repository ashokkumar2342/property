@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Events': 'आयोजन'}}</h2>
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
    <section class="our-blog">
        <div class="container">
            <div class="section-content" data-tm-padding-bottom="450">
                <div class="row">
                    @foreach ($rs_events as $rs_events_val)
                    <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="blog-style1-current-theme">
                            <article class="post">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img class="img-responsive img-fullwidth" src="{{ asset($rs_events_val->image) }}" alt>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <div class="header-wrapper d-flex">
                                        <div class="entry-date bg-theme-colored1 text-center mr-15">
                                            <span class="day bg-theme-colored1">{{date('d', strtotime($rs_events_val->date))}}</span>
                                            <span class="month bg-theme-colored1">{{date('M', strtotime($rs_events_val->date))}}</span>
                                        </div>
                                        <h4 class="entry-title"><a class="text-theme-colored4" href="#">{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a></h4>
                                    </div>
                                    <p class="mt-10">{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
                                </div>
                                <div class="bg-theme-colored1 text-center p-10">

                                </div>
                            </article>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tm-floating-objects">
            <span class="z-index-0 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f1.png') }}" data-tm-width="100%" data-tm-height="550" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
        </div>
    </section>
 

</div> 
@endsection