@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
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
          url: '{{ route('template.events.detail',[1,$l_lang_type,$rs_events_val->id]) }}',
          start: '{{$rs_events_val->date}}'
        },
      @endforeach
      ]
    });

    calendar.render();
  });
</script>
<div class="main-wrapper contact-us">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Calendar': 'पंचांग'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Calendar': 'पंचांग'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	ABOUT MEDIA
===================================== -->
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

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection