@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?"Message": 'संदेश'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?"Message": 'संदेश'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->
  <!-- teacher-details start here -->
  <section class="teacher-details padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?"Message": 'संदेश'}}</h3>
      </div>
      @foreach ($result_rs as $result_val)
      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <div class="teacher-image">
            <img src="{{ asset(@$result_val->image) }}" alt="teacher image" class="img-responsive">
          </div>
        </div>
        <div class="col-lg-6 col-xs-12">
          <div class="teacher-content">
            <h4>{{$l_lang_type==1?@$result_val->name : @$result_val->name_l}}</h4>
            <span><strong>{{$l_lang_type==1?@$result_val->designation : @$result_val->designation_l}}</strong></span>
            <p>{!!$l_lang_type==1?@$result_val->message : @$result_val->message_l!!}</p>
          </div>
        </div>
      </div>
      <br>
    @endforeach
    </div><!-- container -->
  </section><!-- teacher-details -->
  <!-- teacher-details end here -->

  
@endsection