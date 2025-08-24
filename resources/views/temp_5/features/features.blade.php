@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_features = App\Helper\WebHelper::getFeatures(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="no-padding-bottom">
    <div class="container lg-container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Features':'विशेषताएं'}}</span></h3>
            <span class="title-separator"></span>
        </div>
        <div class="row">
            @php
                $counter = 0;
            @endphp
            @foreach ($rs_features as $rs_val)
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
                <div class="col-sm-6 col-lg-3 padding-10px-all sm-padding-10px-all xs-padding-10px-all">
                    <div class="features-block {{$color}}">
                        <div class="icon-img">
                            <i class="{{$rs_val->icon}}"></i>
                        </div>
                        <h4><a href="{{ route('template.singal.features',[4,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h4>
                        <p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
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