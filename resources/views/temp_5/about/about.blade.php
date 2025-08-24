@php
 $admin = \App\Helper\MyFuncs::getUser();
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
}else{
    $include_page_extends = 'temp_5.include_hindi.main';
    $include_page_section = 'temp_5.include_hindi.main.container';
}
$rs_about = App\Helper\WebHelper::getAbout();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<!-- Page Title -->
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">About</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li class="current">About</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->
<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <!-- Editable Hero Content -->
        <div class="hero-content text-center" data-aos="zoom-in" data-aos-delay="200">
          <h2 class="editable" data-section="about_hero_title">
            {!! DB::table('blade_contents')->where('section','about_hero_title')->value('content') ?? 'Premium Real Estate Excellence Since 2008' !!}
          </h2>
          <p class="hero-description editable" data-section="about_hero_description">
            {!! DB::table('blade_contents')->where('section','about_hero_description')->value('content') ?? 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris viverra veniam ut aliquam lorem dapibus gravida. Sed efficitur mauris vel magna consectetur tempor.' !!}
          </p>
        </div>

        <!-- Editable Dual Image Layout -->
        <div class="dual-image-layout" data-aos="fade-up" data-aos-delay="300">
          <div class="row g-4 align-items-center">
            <div class="col-lg-6">
              <div class="primary-image-wrap">
                <img src="{{ asset(DB::table('blade_contents')->where('section','about_primary_image')->value('content') ?? 'temp_5/assets/img/real-estate/property-exterior-4.webp') }}" alt="Luxury Property" class="img-fluid">
                <div class="floating-badge" data-aos="zoom-in" data-aos-delay="400">
                  <div class="badge-content">
                    <i class="bi bi-award"></i>
                    <span class="editable" data-section="about_badge_text">
                      {!! DB::table('blade_contents')->where('section','about_badge_text')->value('content') ?? 'Top Rated Agency' !!}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="secondary-image-wrap">
                <img src="{{ asset(DB::table('blade_contents')->where('section','about_secondary_image')->value('content') ?? 'temp_5/assets/img/real-estate/agent-3.webp') }}" alt="Professional Agent" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Editable Features Showcase -->
    <div class="features-showcase" data-aos="fade-up" data-aos-delay="350">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6">
          <div class="feature-box" data-aos="flip-up" data-aos-delay="400">
            <div class="feature-icon">
              <i class="bi bi-house-door"></i>
            </div>
            <div class="feature-content">
              <h4 class="editable" data-section="about_feature_1_title">
                {!! DB::table('blade_contents')->where('section','about_feature_1_title')->value('content') ?? 'Residential Sales' !!}
              </h4>
              <p class="editable" data-section="about_feature_1_description">
                {!! DB::table('blade_contents')->where('section','about_feature_1_description')->value('content') ?? 'Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim.' !!}
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-box" data-aos="flip-up" data-aos-delay="450">
            <div class="feature-icon">
              <i class="bi bi-building"></i>
            </div>
            <div class="feature-content">
              <h4 class="editable" data-section="about_feature_2_title">
                {!! DB::table('blade_contents')->where('section','about_feature_2_title')->value('content') ?? 'Commercial Properties' !!}
              </h4>
              <p class="editable" data-section="about_feature_2_description">
                {!! DB::table('blade_contents')->where('section','about_feature_2_description')->value('content') ?? 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.' !!}
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-box" data-aos="flip-up" data-aos-delay="500">
            <div class="feature-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="feature-content">
              <h4 class="editable" data-section="about_feature_3_title">
                {!! DB::table('blade_contents')->where('section','about_feature_3_title')->value('content') ?? 'Investment Guidance' !!}
              </h4>
              <p class="editable" data-section="about_feature_3_description">
                {!! DB::table('blade_contents')->where('section','about_feature_3_description')->value('content') ?? 'Totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.' !!}
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-box" data-aos="flip-up" data-aos-delay="550">
            <div class="feature-icon">
              <i class="bi bi-shield-check"></i>
            </div>
            <div class="feature-content">
              <h4 class="editable" data-section="about_feature_4_title">
                {!! DB::table('blade_contents')->where('section','about_feature_4_title')->value('content') ?? 'Legal Support' !!}
              </h4>
              <p class="editable" data-section="about_feature_4_description">
                {!! DB::table('blade_contents')->where('section','about_feature_4_description')->value('content') ?? 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.' !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Features Showcase -->

   

   

   

  </div>

</section><!-- /About Section -->
@if($admin)
<div class="admin-actions mt-3">
    <button id="enableEdit" class="btn btn-warning">Enable Edit Mode</button>
    <button id="saveEdits" class="btn btn-success d-none">Save Changes</button>
</div>
@endif

@endsection