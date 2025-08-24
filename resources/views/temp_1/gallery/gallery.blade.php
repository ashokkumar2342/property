@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_gallery = App\Helper\WebHelper::getGellery(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-wrapper photo-gallery">


  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">{{$l_lang_type==1?'Gallery': 'गैलरी'}}</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              {{$l_lang_type==1?'Gallery': 'गैलरी'}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	GALLERY
===================================== -->
<section class="py-8 py-md-10">
	<div class="container">
		<div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">{{$l_lang_type==1?'Our Gallery':'हमारी गैलरी'}}</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div id="gallery-grid">
			<div class="row grid wow fadeInUp">
        @php
            $counter = 0;
        @endphp
        @foreach ($rs_gallery as $rs_gallery_val)
        @php
            $counter ++;
            
            if ($counter == 1) {
              $color = 'danger';
            }
            if ($counter == 2) {
              $color = 'warning';
            }
            if ($counter == 3) {
              $color = 'success';
            }
            if ($counter == 4) {
              $color = 'pink';
            }
        @endphp
          <div class="col-md-4 col-lg-3 col-xs-12 element-item nature">
            <div class="media media-hoverable justify-content-center">
              <div class="position-relative w-100">
                <img class="media-img w-100 lazyestload" data-src="{{ asset($rs_gallery_val->image) }}" src="{{ asset($rs_gallery_val->image) }}" alt="gallery-img">
                <a class="media-img-overlay" data-fancybox="gallery" href="{{ asset($rs_gallery_val->image) }}">
                  <div class="btn btn-squre">
                    <i class="fas fa-search-plus"></i>
                  </div>
                </a>
                <div class="card-body bg-{{$color}} pt-3 px-3 pb-1">
                  <h5 class="">
                    <a class="text-white">{{$l_lang_type==1?$rs_gallery_val->title:$rs_gallery_val->title_l}} &nbsp;</a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          @php
              if ($counter == 4) {
                  $counter = 0;
              }                        
          @endphp
        @endforeach
			</div>
    </div>
	</div>
</section>

</div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
@endsection