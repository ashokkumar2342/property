@php
    $admin = \App\Helper\MyFuncs::getUser();
    if ($l_lang_type == 1) {
        $include_page_extends = 'temp_5.include.main';
        $include_page_section = 'temp_5.include.main.container';
    } else {
        $include_page_extends = 'temp_5.include_hindi.main';
        $include_page_section = 'temp_5.include_hindi.main.container';
    }
@endphp

@extends($include_page_extends)
@section($include_page_section)

<!-- Page Title -->
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">{{ $property->title ?? 'Property Details' }}</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">{{ $property->title ?? 'Project Details' }}</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Property Details Section -->
<section id="property-details" class="property-details section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-7">

        <!-- Property Hero Section -->
        <div class="property-hero mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="hero-image-container">
            <div class="property-gallery-slider swiper init-swiper">
              <div class="swiper-wrapper">
                @forelse($images as $img)
                  <div class="swiper-slide">
                    <img src="{{ route('property.image.show', ['id' => $img->id]) }}"
                         class="img-fluid hero-image rounded-3 shadow-sm"
                         alt="{{ $property->title }}">
                  </div>
                @empty
                  <div class="swiper-slide">
                    <img src="{{ asset('assets/img/no-image.jpg') }}"
                         class="img-fluid hero-image rounded-3 shadow-sm"
                         alt="No Image Available">
                  </div>
                @endforelse
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>

        <!-- Property Info -->
        <div class="property-info mb-5" data-aos="fade-up" data-aos-delay="300">
          <div class="property-header">
            <h1 class="property-title">{{ $property->title }}</h1>
            <div class="property-meta">
              <span class="address"><i class="bi bi-geo-alt"></i> {{ $property->address_line }}</span>
              <span class="listing-id">ID: #{{ $property->id }}</span>
            </div>
          </div>

          <div class="pricing-section mt-3">
            <div class="main-price h4 text-primary fw-bold">₹{{ number_format($property->base_price, 2) }}</div>
            <div class="price-breakdown text-muted">
              <span>Status: {{ $property->status_name ?? 'Available' }}</span>
            </div>
          </div>

          <div class="quick-stats mt-4">
            <div class="row g-3">
              <div class="col-6 col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                  <i class="bi bi-house fs-3 text-primary mb-2"></i>
                  <div class="fw-semibold">{{ $property->num_of_rooms ?? '-' }}</div>
                  <small>Rooms</small>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                  <i class="bi bi-car-front fs-3 text-primary mb-2"></i>
                  <div class="fw-semibold">{{ $property->num_of_car_parking ?? '-' }}</div>
                  <small>Parking</small>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                  <i class="bi bi-arrows-angle-expand fs-3 text-primary mb-2"></i>
                  <div class="fw-semibold">{{ $property->carpet_area ?? '-' }}</div>
                  <small>Area ({{ $property->unit ?? 'sqft' }})</small>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="stat-card text-center p-3 border rounded">
                  <i class="bi bi-building fs-3 text-primary mb-2"></i>
                  <div class="fw-semibold">{{ $property->floor_no ?? '-' }}</div>
                  <small>Floor</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Property Description -->
        <div class="property-details mb-5" data-aos="fade-up" data-aos-delay="400">
          <h3>Description</h3>
          <p>{{ $property->description ?? 'No description available.' }}</p>

          @if($property->other_detail)
            <div class="mt-3">
              <h5>Additional Details</h5>
              <p>{{ $property->other_detail }}</p>
            </div>
          @endif
        </div>

      </div>

      <!-- Sidebar -->
      <div class="col-lg-5">
        <div class="sticky-sidebar">
          <div class="calculator-card mb-4 p-4 bg-light rounded" data-aos="fade-up" data-aos-delay="550">
            <h4>Property Summary</h4>
            <div class="calculator-content mt-3">
              <div><strong>Type:</strong> {{ $property->type_name }}</div>
              <div><strong>Ownership:</strong> {{ $property->ownership_type }}</div>
              <div><strong>Facing:</strong> {{ $property->facing ?? 'N/A' }}</div>
              <div><strong>Developer:</strong> {{ $property->developer_name ?? 'N/A' }}</div>
              <div><strong>Water:</strong> {{ $property->water_availability ?? 'N/A' }}</div>
            </div>
          </div>

          <!-- Similar Properties -->
          @if(isset($similar) && $similar->count())
          <div class="similar-properties" data-aos="fade-up" data-aos-delay="650">
            <h4>Similar Properties</h4>
            @foreach($similar as $sp)
              @php
                  $imgId = DB::table('property_images')->where('property_id', $sp->id)->value('id');
              @endphp
              <div class="similar-property-item mb-3 d-flex border rounded p-2">
                <div class="me-3">
                  @if($imgId)
                      <img src="{{ route('property.image.show', ['id' => $imgId]) }}"
                           class="img-fluid rounded" width="100" alt="{{ $sp->title }}">
                  @else
                      <img src="{{ asset('assets/img/no-image.jpg') }}"
                           class="img-fluid rounded" width="100" alt="No Image">
                  @endif
                </div>
                <div>
                  <h6 class="mb-1">{{ $sp->title }}</h6>
                  <p class="text-primary fw-semibold mb-1">₹{{ number_format($sp->base_price, 2) }}</p>
                  <p class="small text-muted mb-2">{{ $sp->num_of_rooms ?? '-' }} Rooms • {{ $sp->carpet_area ?? '-' }} {{ $sp->unit ?? 'sqft' }}</p>
                  <a href="{{ url('property/details/' . Crypt::encrypt($sp->id)) }}" class="btn btn-outline-primary btn-sm">View</a>
                </div>
              </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
