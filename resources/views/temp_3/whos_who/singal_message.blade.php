@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white">{{$l_lang_type==1?"Who's": 'कौन'}}<span class="text-theme-colored3"> {{$l_lang_type==1?"Who": 'कौन है'}}</span></h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                                <span class="trail-item trail-begin">
                                    <a href="{{ route('template.index',[3,$l_lang_type]) }}"><span>{{$l_lang_type==1?'Home':'होमे'}}</span></a>
                                </span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
      <div class="container pb-80">
        <div class="section-title">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
              <div class="tm-sc-section-title section-title text-center">
                <div class="title-wrapper">
                  <h2 class="title"><span class="text-theme-colored3">{{$l_lang_type==1?"Message": 'संदेश'}}</span></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content">
          @foreach ($result_rs as $result_val)
            <div class="row">
              <div class="col-lg-3">
                <div class="sidebar">
                  <div class="widget widget_text text-center">
                    <img src="{{ asset(@$result_val->image) }}" class="img-fullwidth" alt="">
                  </div>
                </div>
              </div>
              <div class="col-lg-9">
                <h3 class="mt-0">{{$l_lang_type==1?@$result_val->name : @$result_val->name_l}}<small class="text-muted" data-tm-font-size="1.2rem" style="font-size: 1.2rem;">/ {{$l_lang_type==1?@$result_val->designation : @$result_val->designation_l}}</small></h3>
                {!!$l_lang_type==1?@$result_val->message : @$result_val->message_l!!}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

</div>
@endsection