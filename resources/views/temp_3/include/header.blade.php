<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from html.kodesolution.com/2017/kidspro-html-b5/index-mp-layout1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2024 07:10:18 GMT -->
<head>
    @php
      $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
      $rs_more_page = App\Helper\WebHelper::getMorePage();
    @endphp
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="KidsPro - Kids Education & Kindergarten School HTML5 Template" />
<meta name="keywords" content="kindergarten,children,kidsschool,school,baby,childschool,academy,course,education," />
<meta name="author" content="ThemeMascot" />

<title>Home | Welcome To {{@$rs_school_detail[0]->name}}</title>

<link href="{{ asset(@$rs_school_detail[0]->url_icon) }}" rel="shortcut icon" type="image/png">
<link href="{{ asset('temp_3/assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
<link href="{{ asset('temp_3/assets/images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('temp_3/assets/images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('temp_3/assets/images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

<link href="{{ asset('temp_3/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('temp_3/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('temp_3/assets/css/javascript-plugins-bundle.css') }}" rel="stylesheet" />

<link href="{{ asset('temp_3/assets/js/menuzord/css/menuzord.css') }}" rel="stylesheet" />

<link href="{{ asset('temp_3/assets/css/style-main.css') }}" rel="stylesheet" type="text/css">
<link id="menuzord-menu-skins" href="{{ asset('temp_3/assets/css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet" />

<link href="{{ asset('temp_3/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">


<link href="{{ asset('temp_3/assets/css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/all.min.css') }}" rel='stylesheet'>
<link href="{{ asset('temp_1/assets/plugins/fontawesome-5.15.2/css/fontawesome.min.css') }}" rel='stylesheet'>
<link href="{{ asset('temp_1/assets/css/fullcalendar.min.css') }}" rel="stylesheet">

<script src="{{ asset('temp_3/assets/js/jquery.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/javascript-plugins-bundle.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/menuzord/js/menuzord.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('temp_3/assets/js/revolution-slider/css/rs6.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp_3/assets/js/revolution-slider/extra-rev-slider1.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<script src="{{ asset('temp_3/assets/js/revolution-slider/js/revolution.tools.min.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/revolution-slider/js/rs6.min.js') }}"></script>
<script src="{{ asset('temp_3/assets/js/revolution-slider/extra-rev-slider1.js') }}"></script>
<script src="{{ asset('temp_1/assets/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
<script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
<script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>

@include('admin.include.message')



<style type="text/css">
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
        font-size: 14px;
    }
</style>
</head>
<body class="tm-container-1230px has-side-panel side-panel-right">
<div id="wrapper" class="clearfix">

<header id="header" class="header header-layout-type-header-2rows">
<div class="header-top">
<div class="container">
<div class="row">
<div class="col-xl-auto header-top-left align-self-center text-center text-xl-start">
<ul class="element contact-info">
<li class="contact-email">
    <i class="fa fa-envelope font-icon sm-display-block"></i> 
    {{$rs_school_detail[0]->email}}
</li>
<li class="contact-phone">
    <i class="fa fa-phone font-icon sm-display-block"></i>
    {{$rs_school_detail[0]->mobile}}
</li>
<li class="contact-address"><i class="fa fa-clock font-icon sm-display-block"></i>Opening Time : {{$rs_school_detail[0]->opening_time}}</li>
<li class="contact-address"><i class="fa fa-language font-icon sm-display-block"></i> <a href="{{ route('template.index',[3,2]) }}"> हिंदी में देखें</a></li>
</ul>
</div>
<div class="col-xl-auto ms-xl-auto header-top-right align-self-center text-center text-xl-end">
<div class="element pt-0 pt-lg-10 pb-0">
<a href="{{ route('admin.login') }}" class="btn btn-theme-colored2 btn-sm">Login</a>
<a href="{{ route('template.contact',[3,1]) }}" class="btn btn-theme-colored2 btn-sm">Admission</a>
</div>
</div>
</div>
</div>
</div>
<div class="header-nav tm-enable-navbar-hide-on-scroll">
    <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="menuzord-container header-nav-container">
            <div class="position-relative">
                <div class="row header-nav-col-row">
                    <div class="col-sm-auto align-self-center" style="margin-left: 5px;">
                        <a style="margin-left: 5px;" class="menuzord-brand site-brand" href="{{ route('template.index',[3,1]) }}">
                            <img class="logo-default logo-1x" src="{{ asset($rs_school_detail[0]->logo)}}" alt="Logo">
                            <img class="logo-default logo-2x retina" src="{{ asset($rs_school_detail[0]->logo)}}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-sm-auto align-self-center" style="margin-left: 5px;">
                        <a class="menuzord-brand site-brand" href="{{ route('template.index',[3,1]) }}">
                            <strong style="background-image: linear-gradient(to left, violet, indigo, #b5d56a, #a597e7, #c09b3c, #ea77ad, #ea7066);-webkit-background-clip: text;-moz-background-clip: text;        background-clip: text;color: transparent;font:italic;font-size:20px; ">{{$rs_school_detail[0]->name_l}} <br>{{$rs_school_detail[0]->name}}</strong>
                        </a>
                    </div>
                    <div class="col-sm-auto ms-auto pr-0 align-self-center">
                        <nav id="top-primary-nav" class="menuzord theme-color1" data-effect="fade" data-animation="none" data-align="right">
                            <ul id="main-nav" class="menuzord-menu">
                                <li class="active menu-item">
                                    <a href="{{ route('template.index',[3,1]) }}">Home</a>
                                </li>
                                <li class="menu-item"><a href="#">About</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('template.about',[3,1]) }}">About Us</a></li>
                                        <li><a href="{{ route('template.whos.message',[3,1])}}">Who's Who</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('template.gallery',[3,1]) }}">Gallery</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('template.teacher',[3,1]) }}">Teachers</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('template.events',[3,1]) }}">Events</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('template.contact',[3,1]) }}">Contact Us</a>
                                </li>
                                <li class="menu-item"><a href="#">More</a>
                                    <ul class="dropdown">
                                        <li>
                                          <a href="{{ route('template.features',[3,1]) }}">Features</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('template.infrastructure',[3,1]) }}">Infrastructure</a>
                                        </li>
                                        <li><a href="{{ route('template.calendar',[3,1]) }}">Calendar</a></li>
                                        @foreach ($rs_more_page as $rs_more_page_val)
                                            <li><a href="{{ route('template.morepage',[3,1,$rs_more_page_val->id])}}">{{$rs_more_page_val->link_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row d-block d-xl-none">
                    <div class="col-12">
                        <nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
                            <ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>