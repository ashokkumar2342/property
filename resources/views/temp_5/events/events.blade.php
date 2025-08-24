@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Events':'आयोजन'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">

        <div class="section-heading">
            <h3>Events</h3>
            <span class="title-separator"></span>
        </div>

        <div class="row">
            @foreach ($rs_events as $rs_events_val)
                <div class="col-md-4 padding-20px-all sm-padding-25px-all xs-padding-20px-all">

                    <div class="news-block purple">
                        <div class="news-img">
                            <a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}"><img src="{{ asset($rs_events_val->image) }}" alt="" /></a>
                            <div class="date-details">
                                <span class="date">{{date('d', strtotime($rs_events_val->date))}}</span>
                                <p class="month">{{date('M', strtotime($rs_events_val->date))}}</p>
                            </div>
                        </div>
                        <div class="news-details">
                            <ul class="blog-deta">
                                <li>
                                    <a><i aria-hidden="true" class="fas fa-clock"></i>{{$l_lang_type==1?$rs_events_val->time:$rs_events_val->time}}</a>
                                </li>
                            </ul>
                            <h4><a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}">{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</a></h4>
                            <p>{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
                            <a href="{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}">read more ...</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
    

@endsection