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
            <h1>{{$l_lang_type==1?'Events': 'आयोजन'}}</h1>
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
        <div class="row">

            <!-- start left side section -->
            <div class="col-lg-4 col-md-12 order-2 order-lg-1">

                <div class="padding-40px-right md-padding-30px-right sm-no-padding-right">

                    <div class="side-bar">

                        <div class="widget-sidebar">

                            <div class="block-info">
                                <h6 class="bg-yellow">{{$l_lang_type==1?'Events': 'आयोजन'}}</h6>
                                <ul class="list-style12">
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($rs_events as $rs_val)
                                        @php
                                            $counter ++;
                                            if ($counter == 1) {
                                                $color = 'text-sky';
                                                $icon = 'fas fa-gift'; 
                                            }elseif($counter == 2){
                                                $color = 'text-yellow';
                                                $icon = 'fas fa-gift';
                                            }elseif($counter == 3){
                                                $color = 'text-pink'; 
                                                $icon = 'fas fa-gift';
                                            }elseif($counter == 4){
                                                $color = 'text-green';
                                                $icon = 'fas fa-gift';
                                            }
                                        @endphp
                                        <li>
                                            <a href="{{ route('template.events.detail',[4,$l_lang_type, $rs_val->id]) }}"><i class="{{$icon}} {{$color}}  font-size20 vertical-align-middle width-40px"></i>{{$l_lang_type==1?@$rs_val->title:@$rs_val->title_l}}</a>
                                        </li>
                                        @php
                                            if ($counter == 4) {
                                                $counter = 1;
                                            }
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end left side section -->

            <!-- start right side section -->
            <div class="col-lg-8 col-md-12 order-1 order-lg-2 sm-margin-30px-bottom">

                <div class="margin-40px-bottom sm-margin-30px-bottom"><img src="{{ asset(@$rs_events_val->image) }}" class="border-radius-5 box-shadow-primary" alt=""></div>
                <h4 class="margin-15px-bottom">{{$l_lang_type==1?@$rs_events_val->title:@$rs_events_val->title_l}}</h4>
                <p><span> <i class="far fa-calendar"></i> {{date('d', strtotime($rs_events_val->date))}}</span>
                <span>{{date('M', strtotime($rs_events_val->date))}}</span>
                <span><i class="fas fa-clock"></i> {{$l_lang_type==1?$rs_events_val->time:$rs_events_val->time}}</span></p>
                <p>{{$l_lang_type==1?@$rs_events_val->sub_title:@$rs_events_val->sub_title_l}}</p>
                <p class="margin-30px-bottom">{{$l_lang_type==1?@$rs_events_val->description:@$rs_events_val->description_l}}</p>
            </div>
            <!-- end right side section -->
        </div>
    </div>
</section>
    
@endsection