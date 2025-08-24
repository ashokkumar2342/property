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
  <section class="blog-post padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?$rs_features_tile[0]->title:$rs_features_tile[0]->title_l}}</h3>
      </div>
      <div class="row">
        @foreach ($result_rs as $result_rs_val)
        <div class="col-lg-8">
          <div class="single-post">
            <div class="post-image">
              <img src="{{ asset($result_rs_val->image) }}" alt="post image" class="img-responsive">
            </div>
            <div class="post-content">
              <p>{!!$l_lang_type==1?$result_rs_val->description:$result_rs_val->description_l!!}</p>
            </div>
          </div><!-- single post -->
        </div>
        @endforeach
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item">
              <h3 class="sidebar-title">{{$l_lang_type==1?'Our Features': 'हमारी विशेषताएं'}}</h3>
              <ul class="sidebar-categories">
                @foreach ($rs_features as $rs_val)
                <li>
                  <a href="{{ route('template.singal.features',[2,$l_lang_type, $rs_val->id]) }}">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}
                  </a>
                </li>
                @endforeach
              </ul>
            </div><!-- sidebar item -->
          </div><!-- sidebar -->
        </div>
      </div>
    </div>
  </section>
  <!-- facility End here -->

  
@endsection