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
                    <li>{{$l_lang_type==1?$rs_features_tile[0]->title:$rs_features_tile[0]->title_l}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <section>
        <div class="container">
            <div class="row">

                <!-- start left side -->
                <div class="col-lg-4 col-md-12 order-2 order-lg-1">

                    <div class="padding-40px-right md-padding-20px-right sm-no-padding-right">

                        <div class="side-bar">

                            <div class="widget-sidebar">

                                <div class="block-info">
                                    <h6 class="bg-yellow">{{$l_lang_type==1?'Our': 'हमारी'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Features': 'विशेषताएं'}}</h6>
                                    <ul class="list-style12">
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @foreach ($rs_features as $rs_val)
                                            @php
                                                $counter ++;
                                                if ($counter == 1) {
                                                    $color = 'text-sky';  
                                                }elseif($counter == 2){
                                                    $color = 'text-yellow';
                                                }elseif($counter == 3){
                                                    $color = 'text-pink'; 
                                                }elseif($counter == 4){
                                                    $color = 'text-green';
                                                }
                                            @endphp
                                            <li>
                                                <a href="{{ route('template.singal.features',[4,$l_lang_type, $rs_val->id]) }}"><i class="{{$rs_val->icon}} {{$color}}  font-size20 vertical-align-middle width-40px"></i>{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a>
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
                <!-- end left side -->

                <!-- start right side -->
                <div class="col-lg-8 col-md-12 order-1 order-lg-2 sm-margin-30px-bottom">
                    <div class="margin-40px-bottom sm-margin-30px-bottom">
                        @foreach ($result_rs as $result_rs_val)
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-5">
                                    <div class="service-img">
                                        <img src="{{ asset($result_rs_val->image) }}" class="border-radius-10 border border-sky border-width-3" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 xs-margin-25px-bottom">
                                    <h4 class="margin-15px-bottom">{{$l_lang_type==1?$rs_features_tile[0]->title:$rs_features_tile[0]->title_l}}</h4>
                                    <p class="no-margin">{!!$l_lang_type==1?$result_rs_val->description:$result_rs_val->description_l!!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

    
@endsection