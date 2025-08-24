@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_gallery = App\Helper\WebHelper::getGellery(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Gallery':'गैलरी'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Gallery':'गैलरी'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <!-- Gallery Start here -->
<section class="gallery padding-120">
  <div class="container">
    <div class="section-header">
      <h3>{{$l_lang_type==1?'Our Gallery':'हमारी गैलरी'}}</h3>
    </div>
    <div class="gallery-items">
      @foreach ($rs_gallery as $rs_gallery_val)
        <div class="gallery-item branding packing">
          <div class="gallery-image">
            <img src="{{ asset($rs_gallery_val->image) }}" alt="gallery image" class="img-responsive">
            <div class="gallery-overlay">
              <div class="bg"></div>
            </div>
            <div class="gallery-content">
              <a href="{{ asset($rs_gallery_val->image) }}" data-rel="lightcase:myCollection"><i
                  class="icon flaticon-expand"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div><!-- gallery items -->
  </div><!-- container -->
</section><!-- gallery -->
<!-- Gallery End here -->

  <!-- Footer Start here -->
  @endsection