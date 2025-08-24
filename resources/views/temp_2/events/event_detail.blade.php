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
      </div>
    </div>
  </section>
  <section class="singel-class event-single padding-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item">
              <h3 class="sidebar-title">Events Lists</h3>

              <ul class="sidebar-categories" style="height: 600px;overflow-x: hidden;overflow-y: scroll;">
                @foreach ($rs_events as $val_events)
                  <li>
                    <a href="{{ route('template.events.detail',[2,$l_lang_type,$val_events->id]) }}">
                      <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$l_lang_type==1?@$val_events->title:@$val_events->title_l}}
                    <span>{{date('d-M-Y', strtotime(@$val_events->date))}}</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single-post">
            <div class="post-image">
              <img src="{{ asset(@$rs_events_val->image) }}" alt="post image" class="img-responsive">
            </div>
            <div class="post-content">
              <h3>{{$l_lang_type==1?@$rs_events_val->title:@$rs_events_val->title_l}}</h3>
              <ul class="post-meta">
                <li><span class="icon flaticon-signs"></span> {{date('d-M-Y', strtotime(@$rs_events_val->date))}}</li>
                <li><span class="icon flaticon-alarm-clock"></span> {{@$rs_events_val->time}}</li>
              </ul>
              <p>{{$l_lang_type==1?@$rs_events_val->sub_title:@$rs_events_val->sub_title_l}}</p>
              <p>{{$l_lang_type==1?@$rs_events_val->description:@$rs_events_val->description_l}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection