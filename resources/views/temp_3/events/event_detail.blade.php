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
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="upcoming-events">
                            <div class="thumb">
                                <img class="img-fullwidth" alt="images" src="{{ asset(@$rs_events_val->image) }}">
                            </div>
                            <div class="event-details">
                                <h4 class="title mt-0"><a href="#">{{$l_lang_type==1?@$rs_events_val->title:@$rs_events_val->title_l}}</a></h4>
                                <ul class="event-meta">
                                    <li><i class="fa fa-calendar"></i>{{date('d-M-Y', strtotime(@$rs_events_val->date))}}</li>
                                    <li><i class="far fa-clock"></i>{{@$rs_events_val->time}}</li>
                                </ul>
                                <p>{{$l_lang_type==1?@$rs_events_val->sub_title:@$rs_events_val->sub_title_l}}</p>
                                <p>{{$l_lang_type==1?@$rs_events_val->description:@$rs_events_val->description_l}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="upcoming-events">
                            <h4>Events Lists</h4>
                            <ul style="height: 600px;overflow-x: hidden;overflow-y: scroll;">
                                @foreach ($rs_events as $val_events)
                                    <li class="cat-item"><a href="{{ route('template.events.detail',[3,$l_lang_type,$val_events->id]) }}">{{$l_lang_type==1?@$val_events->title:@$val_events->title_l}}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 

</div> 
@endsection