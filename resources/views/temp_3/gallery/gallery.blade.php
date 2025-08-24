@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_gallery = App\Helper\WebHelper::getGellery(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Gallery':'गैलरी'}}</span></h2>
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
    <section data-tm-bg-color="#f9f9f9">
        <div class="container pb-90">
            <div class="section-conent">
                <div class="row">
                    @foreach ($rs_gallery as $rs_gallery_val)
                    <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="gallery-block">
                            <div class="gallery-thumb">
                                <img alt="gallery" src="{{ asset($rs_gallery_val->image) }}" class="img-fullwidth">
                            </div>
                            <div class="overlay-shade"></div>
                            <div class="icons-holder">
                                <div class="icons-holder-inner">
                                    <div class="gallery-icon">
                                        <a href="{{ asset($rs_gallery_val->image) }}" data-lightbox-gallery="gallery"><i class="pe-7s-science"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="tm-floating-objects">
            <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
        </div>
    </section>
</div>
@endsection