<!DOCTYPE html>
<html lang="en">
<head>
    @php
      $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
      $rs_more_page = App\Helper\WebHelper::getMorePage();
    @endphp
    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Kids Education and Shop Template Template" />
    <meta name="description" content="Kidszone - Kids Education and Shop Template" />

    <!-- title  -->
    <title>Home | Welcome To {{@$rs_school_detail[0]->name}}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(@$rs_school_detail[0]->url_icon) }}" />
    <link rel="apple-touch-icon" href="{{ asset('temp_4/assets/img/logos/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('temp_4/assets/img/logos/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('temp_4/assets/img/logos/apple-touch-icon-114x114.png') }}" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('temp_4/assets/css/plugins.css') }}" />

    <!-- revolution slider css -->
    <link rel="stylesheet" href="{{ asset('temp_4/assets/css/rev_slider/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('temp_4/assets/css/rev_slider/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('temp_4/assets/css/rev_slider/navigation.css') }}">

    <!-- search css -->
    <link rel="stylesheet" href="{{ asset('temp_4/assets/search/search.css') }}" />
    <link href="{{ asset('temp_1/assets/css/fullcalendar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- core style css -->
    <link href="{{ asset('temp_4/assets/css/styles.css') }}" rel="stylesheet" />
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

<body>

    <!-- start page loading -->
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

    <!-- start main-wrapper section -->
    <div class="main-wrapper">

        <!-- start header section -->
        <header class="header-style-color">
            <div id="top-bar" class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="top-bar-info">
                                <ul>
                                    <li>
                                        <a>
                                            
                                            <i class="far fa-envelope"></i> {{@$rs_school_detail[0]->email}}
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            
                                            <i class="fas fa-phone-alt"></i> {{$rs_school_detail[0]->mobile}}
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-clock"></i> Opening Time : {{$rs_school_detail[0]->opening_time}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('template.index',[4,2]) }}"><i class="fa fa-language"></i> हिंदी में देखें</a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="top-right-bar">
                                <ul class="top-social-icon">
                                    <li>
                                        <a href="{{ route('admin.login') }}" class="btn"><i class="fa fa-lock"></i> <strong>Login</strong></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('template.contact',[4,1]) }}" class="btn"><i class="fa fa-user"></i> <strong>Admission</strong></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-default border-bottom border-color-light-white">
                <div class="">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                    <div class="navbar-header navbar-header-custom" style="margin-left: 10px;">
                                        <!-- start logo -->
                                        <a href="{{ route('template.index',[4,1]) }}" class="navbar-brand"><img id="logo" src="{{ asset($rs_school_detail[0]->logo)}}" alt="logo"></a>
                                        <a href="{{ route('template.index',[4,1]) }}" class="navbar-brand">
                                            <strong style="background-image: linear-gradient(to left, violet, indigo, #b5d56a, #a597e7, #c09b3c, #ea77ad, #ea7066);-webkit-background-clip: text;-moz-background-clip: text;        background-clip: text;color: transparent;font:italic;font-size:20px; ">{{$rs_school_detail[0]->name_l}} <br>{{$rs_school_detail[0]->name}}</strong>
                                        </a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ml-auto" id="nav" style="display: none;margin-right: 10px;">
                                        <li><a href="{{ route('template.index',[4,1]) }}">Home</a></li>
                                        <li><a>About</a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('template.about',[4,1]) }}">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('template.whos.message',[4,1])}}">Who's Who</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('template.gallery',[4,1]) }}">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('template.teacher',[4,1]) }}">Teachers</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('template.events',[4,1]) }}">Events</a>
                                        </li>
                                        <li><a>More</a>
                                            <ul>
                                                <li>
                                                  <a href="{{ route('template.features',[4,1]) }}">Features</a>
                                                </li>
                                                <li>
                                                  <a href="{{ route('template.infrastructure',[4,1]) }}">Infrastructure</a>
                                                </li>
                                                <li><a href="{{ route('template.calendar',[4,1]) }}">Calendar</a></li>
                                                @foreach ($rs_more_page as $rs_more_page_val)
                                                    <li><a href="{{ route('template.morepage',[4,1,$rs_more_page_val->id])}}">{{$rs_more_page_val->link_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('template.contact',[4,1]) }}">Contact Us</a>
                                        </li>
                                    </ul>
                                    <!-- end menu area -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>