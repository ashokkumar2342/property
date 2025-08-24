<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kidz-html.netlify.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Feb 2024 15:42:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  @php
    $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
    $rs_more_page = App\Helper\WebHelper::getMorePage();
  @endphp
  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Welcome To {{@$rs_school_detail[0]->name}}</title>

  <!-- Plugins css Style -->
  <link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/all.min.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/fontawesome.min.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/animate/animate.css') }}" rel='stylesheet'>

  <link href="{{ asset('temp_1/assets/plugins/fancybox/jquery.fancybox.min.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/isotope/isotope.min.css') }}" rel='stylesheet'>
  
  
  <link href="{{ asset('temp_1/assets/plugins/owl-carousel/owl.carousel.min.css') }}" rel='stylesheet' media='screen'>
  <link href="{{ asset('temp_1/assets/plugins/owl-carousel/owl.theme.default.min.css') }}" rel='stylesheet' media='screen'>
  <link href="{{ asset('temp_1/assets/plugins/revolution/css/settings.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/revolution/css/layers.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/revolution/css/navigation.css') }}" rel='stylesheet'>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Custom css -->
  <link href="{{ asset('temp_1/assets/css/kidz.css') }}" id="option_style" rel="stylesheet">
  <link href="{{ asset('temp_1/assets/css/fullcalendar.min.css') }}" rel="stylesheet">

  <!-- Favicon -->
  <link href="{{ asset(@$rs_school_detail[0]->url_icon) }}" rel="shortcut icon">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  .tho-option-switcher-btn{
    display: none;
  }
  .event_date {
    width: 82px;
    background: #ea7066!important;
    float: left;
    text-align: center;
    border-radius: 2px;
}
.event-date-wrap {
    border: 1px dashed #8d84a0;
    margin: 8px;
    padding: 4px 0;
}
.date-description {
    margin-left: 115px;
}
.event-date-wrap p {
    font-size: 23px;
    font-weight: 700;
    color: #fff;
    margin: 0;
}
.event-date-wrap span {
    color: #fff;
    font-weight: 700;
    font-size: 12px;
}


</style>
</head>

<body id="body" class="up-scroll">
  <!-- ====================================
  ——— PRELOADER
  ===================================== -->
  <div id="preloader" class="smooth-loader-wrapper">
    <div class="smooth-loader">
      <div class="loader">
        <span class="dot dot-1"></span>
        <span class="dot dot-2"></span>
        <span class="dot dot-3"></span>
        <span class="dot dot-4"></span>
      </div>
    </div>
  </div>

  <!-- ====================================
  ——— HEADER
  ===================================== -->
  <header class="header" id="pageTop">
    <!-- Top Color Bar -->
    <div class="color-bars">
      <div class="container-fluid">
        <div class="row">
          <div class="col color-bar bg-warning d-none d-md-block"></div>
          <div class="col color-bar bg-success d-none d-md-block"></div>
          <div class="col color-bar bg-danger d-none d-md-block"></div>
          <div class="col color-bar bg-info d-none d-md-block"></div>
          <div class="col color-bar bg-purple d-none d-md-block"></div>
          <div class="col color-bar bg-pink d-none d-md-block"></div>
          <div class="col color-bar bg-warning"></div>
          <div class="col color-bar bg-success"></div>
          <div class="col color-bar bg-danger"></div>
          <div class="col color-bar bg-info"></div>
          <div class="col color-bar bg-purple"></div>
          <div class="col color-bar bg-pink"></div>
        </div>
      </div>
    </div>

            <!-- Top Bar-->
        <!-- d-none d-md-block -->
        <div class=" bg-stone  top-bar">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 d-none d-lg-block">
                <ul class="list-inline d-flex justify-content-xl-start align-items-center h-100 mb-0">
                  <li>
                    <span class="bg-primary icon-header me-xl-2">
                      <i class="fas fa-envelope" aria-hidden="true"></i>
                    </span>
                    <a href="mailto:info@yourdomain.com" class="me-lg-4 me-xl-6 text-white opacity-80">{{$rs_school_detail[0]->email}}</a>
                  </li>
                  <li>
                    <span class="bg-success icon-header me-xl-2">
                      <i class="fas fa-phone-alt" aria-hidden="true"></i>
                    </span>
                    <a href="tel:+1 234 567 8900" class="me-lg-4 me-xl-6 text-white opacity-80"> {{$rs_school_detail[0]->mobile}} </a>
                  </li>
                  <li class="text-white">
                    <span class="bg-pink icon-header">
                      <i class="far fa-clock" aria-hidden="true"></i>
                    </span>
                    <span class="opacity-80">Opening Time : {{$rs_school_detail[0]->opening_time}}</span>
                  </li>
                </ul>
              </div>

              <div class="col-lg-4">
                <ul class="list-inline d-flex mb-0 justify-content-xl-end justify-content-center align-items-center me-xl-2">
                  <li>
                    <span class="bg-info icon-header me-lg-0 me-xl-1">
                      <i class="fa fa-language" aria-hidden="true" style="color:red"></i>
                    </span>
                  </li>
                  <li class="me-3 me-md-4 me-lg-3 me-xl-5 dropdown dropdown-sm">
                    <a class="btn btn-link" type="button" href="{{ route('template.index',[1,2]) }}"> हिंदी में देखें </a>
                  </li>
                  
                  <li class="text-white me-md-3 me-lg-2 me-xl-5">
                    <span class="bg-purple icon-header me-1 me-md-2 me-lg-1 me-xl-2">
                      <i class="fas fa-unlock-alt text-white font-size-13" aria-hidden="true"></i>
                    </span>
                    <a class="text-white font-weight-medium opacity-80" target="_blank" href="{{ route('admin.login') }}">
                      Login
                    </a>
                  </li>
                  
                  <li>
                    <span class="bg-purple icon-header me-1 me-md-2 me-lg-1 me-xl-2">
                      <i class="fas fa-user text-white font-size-13" aria-hidden="true"></i>
                    </span>
                    <a class="text-white font-weight-medium opacity-80" href="{{ route('template.contact',[1,1]) }}">Admission</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-scrollUp navbar-sticky navbar-white">
      {{-- <div class="container"> --}}
        <a class="navbar-brand" href="{{ route('template.index',[1,1]) }}">
          <img class="d-inline-block" src="{{ asset($rs_school_detail[0]->logo)}}" alt="logo">
        </a>
        <a class="navbar-brand d-inline-block" href="{{ route('template.index',[1,1]) }}">
          <strong style="background-image: linear-gradient(to left, violet, indigo, #b5d56a, #a597e7, #c09b3c, #ea77ad, #ea7066);-webkit-background-clip: text;-moz-background-clip: text;        background-clip: text;color: transparent;font:italic;font-size:20px; ">{{$rs_school_detail[0]->name_l}} <br>{{$rs_school_detail[0]->name}}</strong>
        </a>
        <button class="navbar-toggler py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-lg-auto">
            <li class="nav-item dropdown bg-primary">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.index',[1,1]) }}">
                <i class="fas fa-home nav-icon" aria-hidden="true"></i>
                <span>Home</span>
              </a>
            </li>
            <li class="nav-item dropdown bg-danger">
              <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-info nav-icon" aria-hidden="true"></i>
                <span title="More Menu">About</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="{{ route('template.about',[1,1]) }}">About Us</a>
                </li>
                
                  <li>
                    <a class="dropdown-item " href="{{ route('template.whos.message',[1,1])}}">Who's Who</a>
                  </li>
              </ul>
            </li>
            {{-- <li class="nav-item dropdown bg-danger">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.about',[1,1]) }}">
                <i class="fas fa-info nav-icon" aria-hidden="true"></i>
                <span>About Us</span>
              </a>
            </li> --}}
            <li class="nav-item dropdown bg-info">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.gallery',[1,1]) }}">
                <i class="far fa-image nav-icon" aria-hidden="true"></i>
                <span>Gallery</span>
              </a>
            </li>
            
            <li class="nav-item dropdown bg-pink">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.teacher',[1,1]) }}">
                <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                <span>Staff</span>
              </a>
            </li>
            <li class="nav-item dropdown bg-success">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.events',[1,1]) }}">
                <i class="far fa-copy nav-icon" aria-hidden="true"></i>
                <span>Events</span>
              </a>
            </li>
            <li class="nav-item dropdown bg-danger">
              <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars nav-icon" aria-hidden="true"></i>
                <span title="More Menu">More</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="{{ route('template.features',[1,1]) }}">Features</a>
                </li>
                <li>
                  <a class="dropdown-item " href="{{ route('template.infrastructure',[1,1]) }}">Infrastructure</a>
                </li>
                <li>
                  <a class="dropdown-item " href="{{ route('template.calendar',[1,1])}}">Calendar</a>
                </li>
                <li>
                  <a class="dropdown-item " href="{{ route('template.CBSEMandatoryDisclosure',[1,1])}}">CBSE Mandatory Disclosure</a>
                </li>
                @foreach ($rs_more_page as $rs_more_page_val)
                  <li>
                    <a class="dropdown-item " href="{{ route('template.morepage',[1,1,$rs_more_page_val->id])}}">{{$rs_more_page_val->link_name}}</a>
                  </li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item dropdown bg-purple">
              <a class="nav-link dropdown-toggle  active " href="{{ route('template.contact',[1,1]) }}">
                <i class="fas fa-phone nav-icon" aria-hidden="true"></i>
                <span>Contact Us</span>
              </a>
            </li>
          </ul>
        </div>
      {{-- </div> --}}
    </nav>
  </header>