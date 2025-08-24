<!DOCTYPE html>
<html lang="en">


 @php
    $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
    $rs_more_page = App\Helper\WebHelper::getMorePage();
  @endphp
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>KidsAcademy</title>
  <link href="{{ asset($rs_school_detail[0]->url_icon)}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
    rel="stylesheet">

  <!-- Bootstrap -->
  <link href="{{ asset('temp_2/assets/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Font-awesome -->
  <link href="{{ asset('temp_2/assets/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Flaticon -->
  <link href="{{ asset('temp_2/assets/flaticon/flaticon.css') }}" rel="stylesheet">

  <!-- lightcase -->
  <link href="{{ asset('temp_2/assets/css/lightcase.css') }}" rel="stylesheet">

  <!-- Swiper -->
  <link href="{{ asset('temp_2/assets/css/swiper.min.css') }}" rel="stylesheet">

  <!-- quick-view -->
  <link href="{{ asset('temp_2/assets/css/quick-view.css') }}" rel="stylesheet">

  <!-- nstSlider -->
  <link href="{{ asset('temp_2/assets/css/jquery.nstSlider.css') }}" rel="stylesheet">

  <!-- flexslider -->
  <link href="{{ asset('temp_2/assets/css/flexslider.css') }}" rel="stylesheet">

  <!-- Style -->
  <link href="{{ asset('temp_2/assets/css/rtl.css') }}" rel="stylesheet">

  <!-- Style -->
  <link href="{{ asset('temp_2/assets/css/style.css') }}" rel="stylesheet">

  <!-- Responsive -->
  <link href="{{ asset('temp_2/assets/css/responsive.css') }}" rel="stylesheet">

  <link href="{{ asset('temp_2/assets/css/fullcalendar.min.css') }}" rel="stylesheet">

  <link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/all.min.css') }}" rel='stylesheet'>
  <link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/fontawesome.min.css') }}" rel='stylesheet'>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <style type="text/css">
    .section-notch {
        position: relative;
    }

    .section-notch:before {
        content: "";
        position: absolute;
        background: url('{{ asset('temp_2/assets/images/section_notch_top.png') }}');
        background-repeat: repeat-x;
        display: block;
        top: 0;
        width: 100%;
        height: 7px;
        z-index: 2;
    }

    .section-notch:after {
        content: "";
        position: absolute;
        background-image: url('{{ asset('temp_2/assets/images/section_notch_bottom.png') }}');
        background-repeat: repeat-x;
        bottom: 0;
        width: 100%;
        height: 7px;
        z-index: 2;
    }
      .event_date {
        width: 82px;
        background: #ea7066!important;
        float: left;
        text-align: center;
        margin-top: 40px;
        border-radius: 2px;
    }
    .event-date-wrap {
        border: 1px dashed #8d84a0;
        margin: 8px;
        padding: 4px 0;
    }
    .date-description {
        margin-left: 115px;
        color: #fff;
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
        font-size: 14px;
    }

    .teachers-three {
        background-image: url('{{ asset('temp_2/assets/images/background/partner-bg.jpg') }}');
    }
    .achievements {
        background-image: url('{{ asset('temp_2/assets/images/background/achievements-bg.jpg') }}');
    }
    .contact {
        background-image: url('{{ asset('temp_2/assets/images/background/blog-bg.jpg') }}');
    }
    .contact .contact-details {
        background-color: rgba(7, 143, 203, .8);
    }
    
  </style>
</head>


<body id="scroll-top">

  <!-- Preloader start here -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- Preloader end here -->


  <!-- mobile menu start here -->
  <div class="mobile-menu-area">
    <div class="logo-area">
      <a class="logo" href="{{ route('template.index',[2,2]) }}"><img src="{{ asset($rs_school_detail[0]->logo) }}" alt="logo" class="img-responsive"></a>
      <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="mobile-menu">
      <ul class="m-menu">
        <li>
          <a class="text-dark font-weight-medium opacity-80" href="{{ route('admin.login') }}"><i class="fa fa-lock" aria-hidden="true"></i>
            लॉग इन करें
          </a>
        </li>
        <li>
          <a class="text-dark font-weight-medium opacity-80" href="{{ route('template.contact',[2,2]) }}"><i class="fa fa-user" aria-hidden="true"></i> प्रवेश</a>
        </li>
        <li>
          <a class="nav-link dropdown-toggle  active " href="{{ route('template.index',[2,2]) }}">
            <i class="fa fa-home"></i>
            <span>होम</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false"><i class="fa fa-info"></i> के बारे में <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('template.about',[2,2])}}">हमारे बारे में</a></li>
            <li><a href="{{ route('template.whos.message',[2,2])}}">कौन कौन है</a></li>
          </ul>
        </li>

        {{-- <li>
          <a class="nav-link dropdown-toggle  active " href="{{ route('template.about',[2,2]) }}">
            <i class="fa fa-info"></i>
            <span>हमारे बारे में</span>
          </a>
        </li> --}}
        <li>
          <a class="nav-link dropdown-toggle  active " href="{{ route('template.gallery',[2,2]) }}">
            <i class="fa fa-image"></i>
            <span>गैलरी</span>
          </a>
        </li>
        <li>
          <a class="nav-link dropdown-toggle  active " href="{{ route('template.teacher',[2,2]) }}">
            <i class="fa fa-users"></i>
            <span>अध्यापक</span>
          </a>
        </li>
        <li>
          <a class="nav-link dropdown-toggle  active " href="{{ route('template.events',[2,2]) }}">
            <span>आयोजन</span>
          </a>
        </li>
        <li>
          <a class="nav-link dropdown-toggle  active " style="color:rgba(7, 143, 203, .8);" href="{{ route('template.contact',[2,2]) }}">
            <i class="fa fa-phone"></i>
            <span>संपर्क करें</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" style="color:rgba(7, 143, 203, .8);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false"><i class="fa fa-cog"></i> पृष्ठों <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('template.features',[2,2]) }}" style="color:rgba(7, 143, 203, .8);">विशेषताएँ</a>
            </li>
            <li>
              <a href="{{ route('template.infrastructure',[2,2]) }}" style="color:rgba(7, 143, 203, .8);">आधारभूत संरचना</a>
            </li>
            <li><a style="color:rgba(7, 143, 203, .8);" href="{{ route('template.calendar',[2,2])}}">पंचांग</a></li>
            @foreach ($rs_more_page as $rs_more_page_val)
              <li>
                <a style="color:rgba(7, 143, 203, .8);" href="{{ route('template.morepage',[2,2,$rs_more_page_val->id])}}">{{$rs_more_page_val->link_name_l}}</a>
              </li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- mobile menu ending here -->
  <header>
    <div class="header-top">
      <div class="container">
        <div class="ht-area">
          <ul class="left">
            <li><span><i class="fa fa-envelope"></i></span> {{@$rs_school_detail[0]->email}}</li>
            <li><span><i class="fa fa-phone"></i></span> {{@$rs_school_detail[0]->mobile}}</li>
            <li><span><i class="fa fa-clock-o"></i></span> खुलने का समय : {{@$rs_school_detail[0]->opening_time_l}}
            </li>
            
          </ul>
          <ul class="right">
            <li><span><i class="fa fa-language" style="color:red"></i></span><a href="{{ route('template.index',[2,1]) }}" style="color:#fff"> View in English</a></li>
            <li>
              <a class="text-white font-weight-medium opacity-80" href="javascript:void(0)" data-bs-toggle="modal"
                data-bs-target="#modal-login"><i class="fa fa-lock" aria-hidden="true"></i>
                लॉग इन करें
              </a>
            </li>
            <li>
              <a class="text-white font-weight-medium opacity-80" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-createAccount"><i class="fa fa-user" aria-hidden="true"></i> प्रवेश</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main-menu">
      <div class="container">
        <div class="row no-gutters">
          <nav class="main-menu-area w-100">
            <div class="logo-area">
              <a class="" href="{{ route('template.index',[2,2]) }}"><img src="{{ asset($rs_school_detail[0]->logo) }}" alt="logo"
                  class="img-responsive"></a>
              <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="menu-area">
              <ul class="menu">
                <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.index',[2,2]) }}">
                    <i class="fa fa-home"></i>
                    <span>होम</span>
                  </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-info"></i> के बारे में <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('template.about',[2,2])}}">हमारे बारे में</a></li>
                    <li><a href="{{ route('template.whos.message',[2,2])}}">कौन कौन है</a></li>
                  </ul>
                </li>
                {{-- <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.about',[2,2]) }}">
                    <i class="fa fa-info"></i>
                    <span>हमारे बारे में</span>
                  </a>
                </li> --}}
                <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.gallery',[2,2]) }}">
                    <i class="fa fa-image"></i>
                    <span>गैलरी</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.teacher',[2,2]) }}">
                    <i class="fa fa-users"></i>
                    <span>अध्यापक</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.events',[2,2]) }}">
                    <i class="fa fa-copy"></i>
                    <span>आयोजन</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link dropdown-toggle  active " href="{{ route('template.contact',[2,2]) }}">
                    <i class="fa fa-phone"></i>
                    <span>संपर्क करें</span>
                  </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-cog"></i> पृष्ठों <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{ route('template.features',[2,2]) }}">विशेषताएँ</a>
                    </li>
                    <li>
                      <a href="{{ route('template.infrastructure',[2,2]) }}">आधारभूत संरचना</a>
                    </li>
                    <li><a href="{{ route('template.calendar',[2,2])}}">पंचांग</a></li>
                    @foreach ($rs_more_page as $rs_more_page_val)
                      <li>
                        <a  href="{{ route('template.morepage',[2,2,$rs_more_page_val->id])}}">{{$rs_more_page_val->link_name_l}}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>