@php
 $admin = \App\Helper\MyFuncs::getUser();
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_home_banner = App\Helper\WebHelper::getHomeBannerImage();
  $rs_features = App\Helper\WebHelper::getFeatures(6);
  $rs_infrastructure = App\Helper\WebHelper::getInfrastructure(4);
  $rs_teacher = App\Helper\WebHelper::getTeacher(6);
  $rs_gallery = App\Helper\WebHelper::getGellery(4);
  $rs_events = App\Helper\WebHelper::getEvents(2);
  $rs_about = App\Helper\WebHelper::getAbout();
  $rs_facts = App\Helper\WebHelper::getFacts();
  $rs_whos_who = App\Helper\WebHelper::getWhosWho();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
  $rs_notice_board = App\Helper\WebHelper::getNoticeboard(3);
  
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
  }else{
    $include_page_extends = 'temp_5.include_hindi.main';
    $include_page_section = 'temp_5.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)
<style>
#carousel-banner .carousel-inner {
    height: 500px; /* Set carousel height to 600px */
}

#carousel-banner .carousel-item img {
    object-fit: cover; /* Ensure the images cover the area and maintain aspect ratio */
    height: 500px; /* Set height of carousel images to 600px */
}

.carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}
.info-links {
    background: #f6fcf6;
    border: 1px solid #ddd;
    border-radius: 6px;
}

.info-links li {
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 500;
}

.check-icon {
    color: green;
    margin-right: 8px;
    font-weight: bold;
}

.blink {
    animation: blinker 1.5s linear infinite;
    color: red;
    font-weight: bold;
    text-decoration: none;
    margin-left: 5px;
}

@keyframes blinker {
    50% { opacity: 0; }
}

/* Section Title Base */
.project-section-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 3rem;
    font-weight: 700;
    color: #1c3f6c;
    letter-spacing: 1.2px;
    position: relative;
    display: inline-block;
    text-transform: uppercase;
    background: linear-gradient(90deg, #1c3f6c, #2980b9);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: fadeInUp 1s ease-out;
}

/* Accent Word Styling */
.project-section-title .text-accent {
    color: #e63946;
    font-weight: 800;
}

/* Optional Icon Before Title */
.highlight-icon {
    font-size: 1.8rem;
    color: #34a853;
    margin-right: 10px;
    vertical-align: middle;
}

/* Fade-in Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}



</style>
<main class="main"><!-- Editable Banner Section with Carousel -->
  <main class="main">
  <!-- Editable Banner Section with Carousel -->
  <section id="carousel-banner" class="carousel-banner section" style="padding-top: 0px">
    <div class="container-fluid p-0">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          
          <!-- Carousel Item 1 -->
          <div class="carousel-item active">
            <div class="carousel-banner-content">
              <div class="editable-img" data-section="carousel_image_1">
                <img class="d-block w-100" src="{{ asset(DB::table('blade_contents')->where('section','carousel_image_1')->value('content') ?? 'images/slider/1.png') }}" alt="First Slide">
              </div>
              <div class="carousel-caption">
                <h5 class="editable" data-section="carousel_text_1">
                  {!! DB::table('blade_contents')->where('section','carousel_text_1')->value('content') ?? 'Your Dream Property Awaits!' !!}
                </h5>
                <p class="editable" data-section="carousel_subtext_1">
                  {!! DB::table('blade_contents')->where('section','carousel_subtext_1')->value('content') ?? 'Find your perfect home with ease.' !!}
                </p>
              </div>
            </div>
          </div>

          <!-- Carousel Item 2 -->
          <div class="carousel-item">
            <div class="carousel-banner-content">
              <div class="editable-img" data-section="carousel_image_2">
                <img class="d-block w-100" src="{{ asset(DB::table('blade_contents')->where('section','carousel_image_2')->value('content') ?? 'images/slider/2.png') }}" alt="Second Slide">
              </div>
              <div class="carousel-caption">
                <h5 class="editable" data-section="carousel_text_2">
                  {!! DB::table('blade_contents')->where('section','carousel_text_2')->value('content') ?? 'Explore New Listings!' !!}
                </h5>
                <p class="editable" data-section="carousel_subtext_2">
                  {!! DB::table('blade_contents')->where('section','carousel_subtext_2')->value('content') ?? 'Browse the latest properties for sale.' !!}
                </p>
              </div>
            </div>
          </div>

          <!-- Carousel Item 3 -->
          <div class="carousel-item">
            <div class="carousel-banner-content">
              <div class="editable-img" data-section="carousel_image_3">
                <img class="d-block w-100" src="{{ asset(DB::table('blade_contents')->where('section','carousel_image_3')->value('content') ?? 'images/slider/3.png') }}" alt="Third Slide">
              </div>
              <div class="carousel-caption">
                <h5 class="editable" data-section="carousel_text_3">
                  {!! DB::table('blade_contents')->where('section','carousel_text_3')->value('content') ?? 'Find Your Ideal Home!' !!}
                </h5>
                <p class="editable" data-section="carousel_subtext_3">
                  {!! DB::table('blade_contents')->where('section','carousel_subtext_3')->value('content') ?? 'Get expert guidance to find the perfect property.' !!}
                </p>
              </div>
            </div>
          </div>

        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section><!-- /Editable Banner Section -->
<!-- ============================= -->
<!-- 🔍 Advanced Property Filter -->
<!-- ============================= -->
<section id="property-filter" class="py-4 bg-light border-bottom">
  <div class="container">
    <form id="propertyFilterForm" method="GET" action="#" class="row g-3 align-items-end">

      <!-- State -->
      <div class="col-md-3">
        <label class="form-label fw-bold">State</label>
        <select id="state" name="state_id" class="form-select" onchange="fetchCities(this.value)">
          <option value="">Select State</option>
          @foreach($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- City -->
      <div class="col-md-3">
        <label class="form-label fw-bold">City</label>
        <select id="city" name="city_id" class="form-select" onchange="fetchLocalities(this.value)">
          <option value="">Select City</option>
        </select>
      </div>

      <!-- Locality -->
      <div class="col-md-3">
        <label class="form-label fw-bold">Locality</label>
        <select id="locality" name="locality_id" class="form-select">
          <option value="">Select Locality</option>
        </select>
      </div>

      <!-- Property Type -->
      <div class="col-md-3">
        <label class="form-label fw-bold">Property Type</label>
        <select name="type" class="form-select">
          <option value="">All Types</option>
          <option value="flat">Flat</option>
          <option value="house">Independent House</option>
          <option value="villa">Villa</option>
          <option value="plot">Plot</option>
          <option value="commercial">Commercial</option>
        </select>
      </div>

      <!-- Budget -->
      <div class="col-md-3">
        <label class="form-label fw-bold">Budget</label>
        <select name="budget" class="form-select">
          <option value="">Any Budget</option>
          <option value="5000000">Up to ₹50 Lakhs</option>
          <option value="10000000">₹50L - ₹1Cr</option>
          <option value="20000000">₹1Cr - ₹2Cr</option>
          <option value="50000000">Above ₹2Cr</option>
        </select>
      </div>

      <!-- Loan Availability -->
      <div class="col-md-3 d-flex align-items-center">
        <label class="form-check-label me-3 fw-bold">Loan Available</label>
        <div class="form-check form-switch">
          <input type="checkbox" name="loan_available" value="1" class="form-check-input">
        </div>
      </div>

      <!-- More Filters (bedrooms, bathrooms, area) -->
      <div class="col-md-3">
        <label class="form-label fw-bold">Bedrooms</label>
        <select name="bedrooms" class="form-select">
          <option value="">Any</option>
          @for($i=1;$i<=6;$i++)
            <option value="{{ $i }}">{{ $i }}+</option>
          @endfor
        </select>
      </div>

      <div class="col-md-3">
        <label class="form-label fw-bold">Bathrooms</label>
        <select name="bathrooms" class="form-select">
          <option value="">Any</option>
          @for($i=1;$i<=6;$i++)
            <option value="{{ $i }}">{{ $i }}+</option>
          @endfor
        </select>
      </div>

      <div class="col-md-3">
        <label class="form-label fw-bold">Area (sqft)</label>
        <select name="area" class="form-select">
          <option value="">Any</option>
          <option value="1000">Up to 1000</option>
          <option value="2000">1000–2000</option>
          <option value="3000">2000–3000</option>
          <option value="5000">Above 3000</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100">
          <i class="bi bi-search"></i> Search Properties
        </button>
      </div>

    </form>
  </div>
</section>

<section>
    <div class="container mt-4">
        @foreach ($properties as $property)
        <div class="card p-2 mb-3">
            <div class="row">
                <!-- Image Section -->
               <div class="col-md-3">
                   <div class="top-img position-relative">
                       @if($property->image)
                           <img src="{{ route('property.image.show', ['id' => $property->last_image_id]) }}" 
                                alt="Property Image" height="200px" width="200px">
                       @else
                           <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="w-100 rounded">
                       @endif

                       <div class="auction-tag position-absolute top-0 start-0 bg-warning text-dark px-2 py-1 rounded-end">
                           {{ $property->property_status ?? 'Upcoming Auction' }}
                       </div>
                   </div>
               </div>


                <!-- Details Section -->
                <div class="col-md-9">
                    <div class="click-card">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0">{{ $property->title }}</h5>
                            <a href="#" class="text-danger"><i class="far fa-heart"></i></a>
                        </div>

                        <div class="p-key-point d-flex flex-wrap">
                            <div class="me-4">
                                <strong>Carpet Area:</strong> {{ $property->carpet_area ?? 'N/A' }} sq.ft
                            </div>
                            <div class="me-4">
                                <strong>Possession:</strong> {{ $property->possession_status ?? 'N/A' }}
                            </div>
                            <div class="me-4">
                                <strong>Type:</strong> {{ $property->type_of_action ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="d-flex flex-wrap my-2">
                            <div class="me-4">
                                <strong>State:</strong> {{ $property->state_name ?? '-' }}
                            </div>
                            <div class="me-4">
                                <strong>District:</strong> {{ $property->district_name ?? '-' }}
                            </div>
                            <div class="me-4">
                                <strong>City:</strong> {{ $property->city_name ?? '-' }}
                            </div>
                        </div>

                        <div class="d-flex flex-wrap my-2">
                            <div class="me-4">
                                <strong>Auction Start:</strong> {{ $property->auction_start_datetime ?? '-' }}
                            </div>
                            <div class="me-4">
                                <strong>Auction End:</strong> {{ $property->auction_end_datetime ?? '-' }}
                            </div>
                            <div class="me-4">
                                <strong>EMD End:</strong> {{ $property->emd_end_datetime ?? '-' }}
                            </div>
                        </div>

                        <div class="bank-details d-flex justify-content-between align-items-center border-top pt-2">
                            <div><strong>{{ $property->bank_name ?? 'Bank' }}</strong></div>
                            <div><strong>Property ID:</strong> {{ $property->property_system_id ?? '-' }}</div>
                        </div>

                        <div class="p-price py-2 d-flex justify-content-between align-items-center">
                            <div class="price text-success fw-bold">
                                ₹ {{ number_format($property->base_price, 2) }}
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{route('property.details.show',Crypt::encrypt($property->id))}}" class="btn btn-primary btn-sm">View Details</a>
                                <a href="#" class="btn btn-outline-primary btn-sm">Contact Us</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Interested?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Hero Section -->
<section class="section bg-gradient py-5">

    <div class="container">
        <div class="hero-wrapper row g-4">

            <div class="col-lg-7 hero-content">
                <h1 class="project-section-title">
                    <span class="highlight-icon">📌</span> Ongoing <span class="text-accent">Projects</span>
                </h1>
                <!-- ✅ Links Section -->
                <div class="info-links p-3 mt-4 bg-white shadow-lg rounded-lg">
                    <ul class="list-unstyled mb-0">
                        @foreach($result_rs as $project)
                            <li>
                                <span class="check-icon">✔</span> 
                                {{ $project->name }}
                               <a href="{{ route('template.registration', [1, 1, $project->id]) }}" class="blink">→ →Registration Open </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- ✅ Links Section End -->

            </div>

            <div class="col-lg-5 hero-visual">
                <div class="editable-img" data-section="hero_image_1">
                    <div class="image-overlay">
                        <img src="{{ asset(DB::table('blade_contents')->where('section','hero_image_1')->value('content') ?? 'temp_5/assets/img/real-estate/property-exterior-8.webp') }}" class="img-fluid rounded-lg shadow-xl" alt="Hero Image">
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>




<!-- About Section -->
<section id="home-about" class="home-about section">
    <div class="container">
        <div class="row">

            <div class="col-lg-5">
                <div class="editable-img" data-section="about_image_primary">
                    <img src="{{ asset(DB::table('blade_contents')->where('section','about_image_primary')->value('content') ?? 'temp_5/assets/img/real-estate/property-exterior-1.webp') }}" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-7">
                <h2 class="editable" data-section="about_section_title">
                    {!! DB::table('blade_contents')->where('section','about_section_title')->value('content') ?? 'Building Dreams...' !!}
                </h2>
                <p class="editable" data-section="about_paragraph">
                    {!! DB::table('blade_contents')->where('section','about_paragraph')->value('content') ?? 'Sed ut perspiciatis...' !!}
                </p>
            </div>

        </div>
    </div>
</section>

<section id="featured-properties" class="featured-properties section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 class="editable" data-section="featured_properties_title">
            {!! DB::table('blade_contents')->where('section', 'featured_properties_title')->value('content') ?? 'Featured Properties' !!}
        </h2>
        <p class="editable" data-section="featured_properties_description">
            {!! DB::table('blade_contents')->where('section', 'featured_properties_description')->value('content') ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit' !!}
        </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
            <!-- Property 1 -->
            <div class="col-lg-8">
                <div class="featured-property-main" data-aos="zoom-in" data-aos-delay="200">
                    <div class="property-hero">
                        <div class="editable-img" data-section="property_hero_image_1">

                             <img src="{{ asset(DB::table('blade_contents')->where('section','hero_image_1')->value('content') ?? 'temp_5/assets/img/real-estate/property-exterior-8.webp') }}" class="img-fluid" alt="Hero Image">
                        </div>
                        <div class="property-overlay">
                            <div class="property-badge-main premium editable" data-section="property_badge_1">
                                {!! DB::table('blade_contents')->where('section', 'property_badge_1')->value('content') ?? 'Premium' !!}
                            </div>
                            <div class="property-stats">
                                <div class="stat-item" data-section="property_bedrooms_1">
                                    <i class="bi bi-house-door"></i>
                                    <span>{!! DB::table('blade_contents')->where('section', 'property_bedrooms_1')->value('content') ?? '6 Bedrooms' !!}</span>
                                </div>
                                <div class="stat-item" data-section="property_bathrooms_1">
                                    <i class="bi bi-droplet-fill"></i>
                                    <span>{!! DB::table('blade_contents')->where('section', 'property_bathrooms_1')->value('content') ?? '5 Bathrooms' !!}</span>
                                </div>
                                <div class="stat-item" data-section="property_area_1">
                                    <i class="bi bi-arrows-move"></i>
                                    <span>{!! DB::table('blade_contents')->where('section', 'property_area_1')->value('content') ?? '5,500 sq ft' !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-hero-content">
                        <div class="property-header">
                            <div class="property-info">
                                <h2 class="editable" data-section="property_title_1">
                                    {!! DB::table('blade_contents')->where('section', 'property_title_1')->value('content') ?? 'Magnificent Estate with Garden Views' !!}
                                </h2>
                                <div class="property-address">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span class="editable" data-section="property_address_1">
                                        {!! DB::table('blade_contents')->where('section', 'property_address_1')->value('content') ?? 'Malibu, CA 90265' !!}
                                    </span>
                                </div>
                            </div>
                            <div class="property-price-main editable" data-section="property_price_1">
                                {!! DB::table('blade_contents')->where('section', 'property_price_1')->value('content') ?? '$4,850,000' !!}
                            </div>
                        </div>
                        <p class="editable" data-section="property_description_1">
                            {!! DB::table('blade_contents')->where('section', 'property_description_1')->value('content') ?? 'Luxurious estate nestled in exclusive Malibu hills featuring panoramic ocean views, infinity pool, wine cellar, and private tennis court.' !!}
                        </p>
                        <div class="property-actions-main">
                            <a href="property-details.html" class="btn-primary-custom">Schedule Tour</a>
                            <a href="property-details.html" class="btn-outline-custom">View Gallery</a>
                            <div class="property-listing-info">
                                <span class="listing-status for-sale">For Sale</span>
                                <span class="listing-date">Listed today</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Properties -->
            <div class="col-lg-4">
                <div class="properties-sidebar">
                    <!-- Sidebar Property 1 -->
                    <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="300">
                        <div class="sidebar-property-image">
                            <div class="editable-img" data-section="sidebar_property_image_1">
                                <img src="{{ asset(DB::table('blade_contents')->where('section', 'sidebar_property_image_1')->value('content') ?? 'temp_5/assets/img/real-estate/property-exterior-1.webp') }}" alt="Modern Condo" class="img-fluid">
                            </div>
                            <div class="sidebar-property-badge hot editable" data-section="sidebar_property_badge_1">
                                {!! DB::table('blade_contents')->where('section', 'sidebar_property_badge_1')->value('content') ?? 'Hot Deal' !!}
                            </div>
                        </div>
                        <div class="sidebar-property-content">
                            <h4 class="editable" data-section="sidebar_property_title_1">
                                {!! DB::table('blade_contents')->where('section', 'sidebar_property_title_1')->value('content') ?? 'Contemporary Downtown Condo' !!}
                            </h4>
                            <div class="sidebar-location">
                                <i class="bi bi-pin-map"></i>
                                <span class="editable" data-section="sidebar_property_address_1">
                                    {!! DB::table('blade_contents')->where('section', 'sidebar_property_address_1')->value('content') ?? 'Seattle, WA 98101' !!}
                                </span>
                            </div>
                            <div class="sidebar-specs">
                                <span class="editable" data-section="sidebar_property_specs_1">
                                    <i class="bi bi-house"></i> 3 BR
                                </span>
                                <span class="editable" data-section="sidebar_property_specs_2">
                                    <i class="bi bi-droplet"></i> 2 BA
                                </span>
                                <span class="editable" data-section="sidebar_property_specs_3">
                                    <i class="bi bi-rulers"></i> 2,100 sq ft
                                </span>
                            </div>
                            <div class="sidebar-price-row">
                                <div class="sidebar-price editable" data-section="sidebar_property_price_1">
                                    {!! DB::table('blade_contents')->where('section', 'sidebar_property_price_1')->value('content') ?? '$1,595,000' !!}
                                </div>
                                <a href="property-details.html" class="sidebar-btn">View</a>
                            </div>
                        </div>
                    </div>
                    <!-- More sidebar properties can be added in a similar way -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Services Section -->
<section id="featured-services" class="featured-services section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="editable" data-section="featured_services_title">
      {!! DB::table('blade_contents')->where('section','featured_services_title')->value('content') ?? 'Featured Services' !!}
    </h2>
    <p class="editable" data-section="featured_services_paragraph">
      {!! DB::table('blade_contents')->where('section','featured_services_paragraph')->value('content') ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit' !!}
    </p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      <!-- Service Item 1 -->
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-search"></i>
          </div>
          <div class="service-info">
            <h3 class="editable" data-section="service_1_title">
              {!! DB::table('blade_contents')->where('section','service_1_title')->value('content') ?? 'Property Search' !!}
            </h3>
            <p class="editable" data-section="service_1_description">
              {!! DB::table('blade_contents')->where('section','service_1_description')->value('content') ?? 'Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum' !!}
            </p>
            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Comprehensive Listings</li>
              <li><i class="bi bi-check-circle-fill"></i> Advanced Filtering</li>
              <li><i class="bi bi-check-circle-fill"></i> Virtual Tours</li>
            </ul>
            <a href="service-details.html" class="service-link">
              <span>Explore Now</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
          <div class="service-visual">
            <div class="editable-img" data-section="service_1_image">
              <img src="{{ asset(DB::table('blade_contents')->where('section','service_1_image')->value('content') ?? 'assets/img/real-estate/property-interior-2.webp') }}" class="img-fluid" alt="Property Search" loading="lazy">
            </div>
          </div>
        </div>
      </div><!-- End Service Item 1 -->

      <!-- Service Item 2 -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-calculator"></i>
          </div>
          <div class="service-info">
            <h3 class="editable" data-section="service_2_title">
              {!! DB::table('blade_contents')->where('section','service_2_title')->value('content') ?? 'Property Valuation' !!}
            </h3>
            <p class="editable" data-section="service_2_description">
              {!! DB::table('blade_contents')->where('section','service_2_description')->value('content') ?? 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam' !!}
            </p>
            <ul class="service-highlights">
              <li><i class="bi bi-check-circle-fill"></i> Market Analysis</li>
              <li><i class="bi bi-check-circle-fill"></i> Comparative Reports</li>
              <li><i class="bi bi-check-circle-fill"></i> Investment Insights</li>
            </ul>
            <a href="service-details.html" class="service-link">
              <span>Get Valuation</span>
              <i class="bi bi-arrow-up-right"></i>
            </a>
          </div>
          <div class="service-visual">
            <div class="editable-img" data-section="service_2_image">
              <img src="{{ asset(DB::table('blade_contents')->where('section','service_2_image')->value('content') ?? 'assets/img/real-estate/property-exterior-1.webp') }}" class="img-fluid" alt="Property Valuation" loading="lazy">
            </div>
          </div>
        </div>
      </div><!-- End Service Item 2 -->

    </div>
  </div>

  <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
    <a href="services.html" class="btn-view-all">
      <span>View All Services</span>
      <i class="bi bi-arrow-right"></i>
    </a>
  </div>
</section><!-- /Featured Services Section -->
<!-- Call To Action Section -->
<section class="call-to-action-1 call-to-action section" id="call-to-action">

  <div class="cta-bg" style="background-image: url('{{ asset(DB::table('blade_contents')->where('section','cta_background')->value('content') ?? 'temp_5/assets/img/real-estate/showcase-3.webp') }}');"></div>
  
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8">
        <div class="cta-content text-center">
          
          <!-- Editable Title -->
          <h2 class="editable" data-section="cta_title">
            {!! DB::table('blade_contents')->where('section','cta_title')->value('content') ?? 'Need Help Finding Your Dream Property?' !!}
          </h2>

          <!-- Editable Paragraph -->
          <p class="editable" data-section="cta_paragraph">
            {!! DB::table('blade_contents')->where('section','cta_paragraph')->value('content') ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.' !!}
          </p>

          <!-- Editable Buttons -->
          <div class="cta-buttons">
            <a href="#" class="btn btn-primary editable" data-section="cta_button_1">
              {!! DB::table('blade_contents')->where('section','cta_button_1')->value('content') ?? 'Contact Us Today' !!}
            </a>
            <a href="#" class="btn btn-outline editable" data-section="cta_button_2">
              {!! DB::table('blade_contents')->where('section','cta_button_2')->value('content') ?? 'Schedule a Call' !!}
            </a>
          </div>

          <!-- Editable Features -->
          <div class="cta-features">
            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-telephone-fill"></i>
              <span class="editable" data-section="cta_feature_1">
                {!! DB::table('blade_contents')->where('section','cta_feature_1')->value('content') ?? 'Free Consultation' !!}
              </span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="250">
              <i class="bi bi-clock-fill"></i>
              <span class="editable" data-section="cta_feature_2">
                {!! DB::table('blade_contents')->where('section','cta_feature_2')->value('content') ?? '24/7 Support' !!}
              </span>
            </div>
            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-shield-check-fill"></i>
              <span class="editable" data-section="cta_feature_3">
                {!! DB::table('blade_contents')->where('section','cta_feature_3')->value('content') ?? 'Trusted Experts' !!}
              </span>
            </div>
          </div>

        </div><!-- End CTA Content -->
      </div>
    </div>
  </div>

</section><!-- /Call To Action Section -->


@if($admin)
<div class="admin-actions mt-3">
    <button id="enableEdit" class="btn btn-warning">Enable Edit Mode</button>
    <button id="saveEdits" class="btn btn-success d-none">Save Changes</button>
</div>
@endif

</main>
@endsection

