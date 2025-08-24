@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Infrastructure': 'आधारभूत संरचना'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Infrastructure': 'आधारभूत संरचना'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->

  <!-- Classes Start here -->
  <section class="classes padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?'Infrastructure':'आधारभूत संरचना'}}</h3>
      </div>
      <div class="row">
        @foreach ($rs_infrastructure as $rs_infr_val)
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="class-item">
              <div class="image">
                <img src="{{ asset($rs_infr_val->image) }}" alt="class image" class="img-responsive">
              </div>
              <div class="content">
                <h4><a href="{{ route('template.infrastructure',[2,$l_lang_type]) }}">{{$l_lang_type==1?$rs_infr_val->title:$rs_infr_val->title_l}}</a></h4>
                <p>{{$l_lang_type==1?$rs_infr_val->sub_title:$rs_infr_val->sub_title_l}}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div><!-- container -->
  </section><!-- classes -->
  <!-- Classes End here -->
  
@endsection