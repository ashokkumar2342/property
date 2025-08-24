@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_gallery = App\Helper\WebHelper::getGellery(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Our Gallery':'हमारी गैलरी'}}</h1>
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
            <h3>{{$l_lang_type==1?'Our':'हमारी'}} <span class="text-theme-colored3"> {{$l_lang_type==1?'Gallery':'गैलरी'}}</h3>
            <span class="title-separator"></span>
        </div>

        <div class="gallery form-row">
            @foreach ($rs_gallery as $rs_gallery_val)
                <div class="col-md-3 col-6 margin-10px-top">
                    <div class="gallery-block">
                        <img src="{{ asset($rs_gallery_val->image) }}" alt="">
                        <div class="zoom-area">
                            <a class="popimg" href="{{ asset($rs_gallery_val->image) }}">+</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
    
    
@endsection