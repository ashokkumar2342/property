@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Events':'आयोजन'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Events':'आयोजन'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <!-- Event Start here -->
  <section class="event event-two padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?'Events':'आयोजन'}}</h3>
      </div>
      <div class="event-items">
        <div class="row">
          @foreach ($rs_events as $rs_events_val)
            <div class="col-lg-4 col-sm-6 col-xs-12">
              <div class="event-item">
                <div class="event-image">
                  <img src="{{ asset($rs_events_val->image) }}" alt="event image" class="img-responsive">
                  <div class="date">
                    <span>{{date('d', strtotime($rs_events_val->date))}}</span>
                    <p>{{date('M', strtotime($rs_events_val->date))}}</p>
                  </div>
                </div>
                <div class="event-content">
                  <h4>{{$l_lang_type==1?$rs_events_val->title:$rs_events_val->title_l}}</h4>
                  <ul>
                    <li><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>{{$rs_events_val->time}}</li>
                  </ul>
                  <p>{{$l_lang_type==1?$rs_events_val->sub_title:$rs_events_val->sub_title_l}}</p>
                  <a href="{{ route('template.events',[2,$l_lang_type]) }}" class="button-default">Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        </div><!-- row -->
      </div><!-- event items -->
    </div><!-- container -->
  </section>
  <!-- event End here -->

  <!-- Footer Start here -->
  @endsection