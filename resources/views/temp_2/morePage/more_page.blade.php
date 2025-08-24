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
        <h3>{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <!-- Teachers Start here -->
  <section class="teachers teachers-page padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</h3>
      </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            {!!$l_lang_type==1?@$result_rs[0]->page_content: @$result_rs[0]->page_content_l!!}
          </div>
          @if (!empty($result_rs[0]->file_path))
          <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
              <iframe src="{{ asset(@$result_rs[0]->file_path) }}"  width="100%" height="800px"></iframe>
          </div>
            
          @endif
      </div>
    </div><!-- container -->
  </section><!-- teacher -->
  <!-- Teachers End here -->

  <!-- Footer Start here -->
@endsection