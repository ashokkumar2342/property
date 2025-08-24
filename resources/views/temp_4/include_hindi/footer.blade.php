@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
@endphp
<footer>
            <div class="footer-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12 sm-margin-30px-bottom">
                            <div class="footer margin-20px-bottom"><img src="{{ asset(@$rs_school_detail[0]->logo) }}" alt="" class="width-75 sm-width-150px" /></div>
                            <p class="margin-10px-bottom">{!!@$rs_school_detail[0]->footer_description_l!!}</p>
                        </div>

                        <div class="col-lg-2 col-sm-6 col-12 sm-margin-30px-bottom">
                            <div class="padding-50px-left md-padding-20px-left ms-no-padding-left">
                                <h4 class="font-size22 sm-font-size20 xs-font-size18 font-weight-800 margin-25px-bottom sm-margin-20px-bottom ms-margin-15px-bottom">त्वरित लिंक</h4>
                                <ul class="list-style3">
                                    <li>
                                      <a href="{{ route('template.about',[4,2]) }}">
                                        हमारे बारे में
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ route('template.gallery',[4,2]) }}">
                                        गैलरी
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ route('template.teacher',[4,2]) }}">
                                        अध्यापक
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ route('template.events',[4,2]) }}">
                                        आयोजन
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ route('template.contact',[4,2]) }}">
                                        
                                        संपर्क करें
                                      </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="padding-50px-left md-padding-20px-left ms-no-padding-left">
                                <h4 class="font-size22 sm-font-size20 xs-font-size18 font-weight-800 margin-25px-bottom sm-margin-20px-bottom">संपर्क करें</h4>
                                <ul class="contact-info">
                                    <li><i class="fas fa-mobile-alt"></i><a>{{@$rs_school_detail[0]->mobile}}, {{@$rs_school_detail[0]->contact}}</a></li>
                                    <li><i class="far fa-envelope"></i><a>{{@$rs_school_detail[0]->email}}</a></li>
                                    <li><i class="fas fa-map-marker-alt"></i> {{@$rs_school_detail[0]->address_l}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 ms-margin-30px-bottom">
                            <h4 class="font-size22 sm-font-size20 xs-font-size18 font-weight-800 margin-25px-bottom sm-margin-20px-bottom ms-margin-15px-bottom">नक्शा</h4>
                            {!!@$rs_school_detail[0]->map!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="container">
                    <p>&copy; {{date('Y')}} EAGESKOOL द्वारा डिज़ाइन किया गया</p>
                </div>
            </div>
        </footer>
        <!-- end footer section -->

    </div>
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- Java script -->
    <script src="{{ asset('temp_4/assets/js/core.min.js') }}"></script>

    <!-- serch -->
    <script src="{{ asset('temp_4/assets/search/search.js') }}"></script>

    <!-- revolution slider js files start -->
    <script src="{{ asset('temp_4/assets/js/rev_slider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('temp_4/assets/js/rev_slider/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- revolution slider js files end -->
        
    <!-- custom scripts -->
    <script src="{{ asset('temp_4/assets/js/main.js') }}"></script>
    <script src="{{ asset('temp_1/assets/js/fullcalendar.min.js')}}"></script>
    <!-- all js include end -->
    <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
    <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>

    @include('admin.include.message')
</body>


<!-- Mirrored from kidszone.websitelayout.net/demo-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 09:25:08 GMT -->
</html>