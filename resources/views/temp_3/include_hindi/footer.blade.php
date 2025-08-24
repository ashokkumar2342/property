@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
@endphp
<footer id="footer" class="footer divider layer-overlay overlay-dark-8" data-tm-bg-img="images/bg/bg8.jpg">
    <div class="footer-widget-area">
        <div class="container pt-90 pb-40">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="widget tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
                        <div class="thumb">
                            <img alt="Logo" src="{{ asset(@$rs_school_detail[0]->logo) }}">
                        </div>
                        <div class="description">{!!@$rs_school_detail[0]->footer_description_l!!}</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-2">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">त्वरित लिंक</h4>
                        <ul>
                            <li class="mb-4">
                              <a href="{{ route('template.about',[3,1]) }}">
                                हमारे बारे में
                              </a>
                            </li>
                            <li class="mb-4">
                              <a href="{{ route('template.gallery',[3,1]) }}">
                                गैलरी
                              </a>
                            </li>
                            <li class="mb-4">
                              <a href="{{ route('template.teacher',[3,1]) }}">
                                अध्यापक
                              </a>
                            </li>
                            <li class="mb-4">
                              <a href="{{ route('template.events',[3,1]) }}">
                                आयोजन
                              </a>
                            </li>
                            <li class="mb-3">
                              <a href="{{ route('template.contact',[3,1]) }}">
                                
                                संपर्क करें
                              </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget">
                        <h4 class="widget-title">संपर्क करें</h4>
                        <ul class="twitter-post">
                          <li style="color:#fff"><span><i class="fa fa-home" aria-hidden="true"></i></span>
                            {{@$rs_school_detail[0]->address_l}}
                          </li>
                          <li style="color:#fff"><span><i class="fa fa-phone" aria-hidden="true"></i></span>
                            {{@$rs_school_detail[0]->mobile}}, {{@$rs_school_detail[0]->contact}}
                          </li>
                          <li style="color:#fff"><span><i class="fa fa-globe" aria-hidden="true"></i></span>
                            {{@$rs_school_detail[0]->email}}
                          </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="widget">
                        <h4 class="widget-title">नक्शा</h4>
                        <div class="opening-hours border-dark">
                            {!!@$rs_school_detail[0]->map!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-tm-bg-color="#2A2A2A">
            <div class="container">
                <div class="row pt-20 pb-20">
                    <div class="col-sm-6">
                        <div class="footer-paragraph">
                            © {{date('Y')}}. EAGESKOOL द्वारा डिज़ाइन किया गया
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-paragraph text-right">
                            <ul class="styled-icons icon-dark icon-theme-colored1 icon-rounded clearfix">
                                @if (@$rs_school_detail[0]->facebook_link != "")
                                  <li><a class="social-link" target="_blank" href="{{@$rs_school_detail[0]->facebook_link}}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                @elseif(@$rs_school_detail[0]->twitter_link != "")
                                  <li><a class="social-link" target="_blank" href="{{@$rs_school_detail[0]->twitter_link}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                @elseif(@$rs_school_detail[0]->youtube_link != "")
                                <li><a class="social-link" target="_blank" href="{{@$rs_school_detail[0]->youtube_link}}"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<script src="{{ asset('temp_3/assets/js/custom.js') }}"></script>
</body>
</html>