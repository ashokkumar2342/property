@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $getEvents = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
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
          url: '{{ route('template.events.detail',[4,$l_lang_type,$rs_events_val->id]) }}',
          start: '{{$rs_events_val->date}}'
        },
      @endforeach
      ]
    });

    calendar.render();
  });
</script>
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Calendar': 'पंचांग'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="py-8 py-md-10">
    <div class="container">
        <div class="section-content text-center">
            <div class="row">
                <div class="col-md-12">
                    <div id="full-event-calendar"></div>
                </div>
            </div>
        </div>
    </div>
</section>
</div> 
@endsection