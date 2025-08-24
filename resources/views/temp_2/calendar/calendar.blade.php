@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $getEvents = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('full-event-calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prevYear,prev,next,nextYear today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        initialDate: '{{date('Y-m-d')}}',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
          @foreach ($getEvents as $rs_events_val)
        {
          title: '{{$rs_events_val->title}}',
          url: '{{ route('template.events.detail',[2,$l_lang_type,$rs_events_val->id]) }}',
          start: '{{$rs_events_val->date}}'
        },
      @endforeach
        ]
      });

      calendar.render();
    });
  </script>

  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Calendar':'पंचांग'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Calendar':'पंचांग'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->

  <section class="contact contact-page">
    <div class="contact-details padding-120">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="full-event-calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer Start here -->
  @endsection