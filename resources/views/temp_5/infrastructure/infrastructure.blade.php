@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h1>
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
            <h3>{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h3>
            <span class="title-separator"></span>
        </div>

        <div class="courses owl-carousel owl-theme">
            @php
                $counter = 0;
            @endphp
            @foreach ($rs_infrastructure as $rs_infr_val)
                @php
                    $counter ++;
                    if ($counter == 1) {
                        $color = 'blue';  
                    }elseif($counter == 2){
                        $color = 'yellow';
                    }elseif($counter == 3){
                        $color = 'pink'; 
                    }elseif($counter == 4){
                        $color = 'green';
                    }
                @endphp
                <div class="courses-block {{$color}}">
                    <div class="courses-pic">
                        <a href="{{ route('template.infrastructure',[4,$l_lang_type]) }}">
                            <img src="{{ asset($rs_infr_val->image) }}" alt="" />
                        </a>
                    </div>
                    <div class="course-desc">
                        <h4><a href="{{ route('template.infrastructure',[4,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a></h4>
                        <p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
                    </div>
                </div>
                @php
                    if ($counter == 4) {
                        $counter = 1;
                    }
                @endphp
            @endforeach
        </div>

    </div>
</section>

  
@endsection