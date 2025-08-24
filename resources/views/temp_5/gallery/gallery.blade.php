
@php
 $admin = \App\Helper\MyFuncs::getUser();
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
}else{
    $include_page_extends = 'temp_5.include_hindi.main';
    $include_page_section = 'temp_5.include_hindi.main.container';
}
 $rs_gallery = App\Helper\WebHelper::getGellery(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<!-- Page Title -->
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Gallery</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li class="current">Gallery</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->
<!-- About Section -->
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

   

   

   

  </div>

</section><!-- /About Section -->
@if($admin)
<div class="admin-actions mt-3">
    <button id="enableEdit" class="btn btn-warning">Enable Edit Mode</button>
    <button id="saveEdits" class="btn btn-success d-none">Save Changes</button>
</div>
@endif

@endsection
