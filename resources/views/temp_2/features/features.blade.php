@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_features = App\Helper\WebHelper::getFeatures(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->
  
  <!-- facility Start here -->
  <section class="facility padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?'Our Features':'हमारी विशेषताएं'}}</h3>
      </div>
      <div class="row">
        @foreach ($rs_features as $rs_val)
          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="facility-item">
              <span class="icon {{$rs_val->icon}}"></span>
              <h4 class="{{$rs_val->text_color}}"><a href="{{ route('template.singal.features',[2,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h4>
              <p>{{$l_lang_type==1?$rs_val->sub_title:$rs_val->sub_title_l}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- facility End here -->

  
@endsection