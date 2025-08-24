@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
@endphp
<!-- Modal Login -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="bg-warning rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Login</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="{{ route('admin.login.post') }}" method="post" class="add_form">
          {{ csrf_field() }}
            <div class="form-group form-group-icon">
              <input type="text" name="email" class="form-control border" placeholder="Email Or Mobile No." required="">
            </div>
            <p class="text-danger">{{ $errors->first('email') }}</p>
            <div class="form-group form-group-icon">
              <input type="password" name="password" class="form-control border" placeholder="Password" required="">
            </div>
            <p class="text-danger">{{ $errors->first('email') }}</p>
            <div class="form-group">
              <button type="submit" class="btn btn-danger text-uppercase w-100">Log In</button>
            </div>

            <div class="form-group text-center text-secondary mb-0">
              <a class="text-danger" href="#">Forgot password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Login end-->

<!-- Modal Create Account -->
<div class="modal fade" id="modal-createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm rounded" role="document">
    <div class="modal-content">
      <div class="bg-warning rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Admission</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="{{ route('admin.admission') }}" method="POST" role="form" class="add_form">
            {{ csrf_field() }}
            <div class="form-group form-group-icon">
              <input type="text" name="name" class="form-control border" placeholder="Enter Name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" name="mobile_no" class="form-control border" placeholder="Enter Mobile No." required="">
            </div>
            <div class="form-group form-group-icon">
              <input type="text" name="email" class="form-control border" placeholder="Enter Email" required="">
            </div>
            <div class="form-group form-group-icon">
              <input type="text" name="class" class="form-control border" placeholder="Enter Class" required="">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-danger text-uppercase w-100">Submit</button>
            </div>

            {{-- <div class="form-group text-center text-secondary mb-0">
              <p class="mb-0">Allready have an account? <a class="text-danger" href="#">Log in</a></p>
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
    <div class="footer-top" style="background-color: #92278f;">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="footer-item">
              <div class="title"><img src="{{ asset(@$rs_school_detail[0]->logo) }}" alt="logo" class="img-responsive"></div>
              <div class="footer-about text-white">
                <p style="color:#fff">{!!@$rs_school_detail[0]->footer_description!!}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Useful Links</h4>
              <ul class="footer-post">
                <li class="mb-4">
                  <a href="{{ route('template.about',[2,1]) }}" style="color:#fff">
                    <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>About Us
                  </a>
                </li>
                <li class="mb-4">
                  <a href="{{ route('template.gallery',[2,1]) }}" style="color:#fff">
                    <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Gallery
                  </a>
                </li>
                <li class="mb-4">
                  <a href="{{ route('template.teacher',[2,1]) }}" style="color:#fff">
                    <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Teachers
                  </a>
                </li>
                <li class="mb-4">
                  <a href="{{ route('template.events',[2,1]) }}" style="color:#fff">
                    <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Events
                  </a>
                </li>
                <li class="mb-3">
                  <a href="{{ route('template.contact',[2,1]) }}" style="color:#fff">
                    <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Contact Us</h4>
              <ul class="twitter-post">
                <li style="color:#fff"><span><i class="fa fa-home" aria-hidden="true"></i></span>
                  {{@$rs_school_detail[0]->address}}
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
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="footer-item">
              <h4 class="title">Map</h4>
              {!!@$rs_school_detail[0]->map!!}
            </div>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- footer top -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <p>&copy; {{date('Y')}}. Designed By <a href="#">EAGESKOOL</a></p>
          </div>
          <div class="col-md-6 col-xs-12">
            <ul class="social-default">
              @if (@$rs_school_detail[0]->facebook_link != "")
                <li><a target="_blank" href="{{@$rs_school_detail[0]->facebook_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              @elseif(@$rs_school_detail[0]->twitter_link != "")
                <li><a target="_blank" href="{{@$rs_school_detail[0]->twitter_link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              @elseif(@$rs_school_detail[0]->youtube_link != "")
              <li><a target="_blank" href="{{@$rs_school_detail[0]->youtube_link}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              @endif
            </ul>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- footer bottom -->
  </footer>
  <a class="page-scroll scroll-top" href="#scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  <!-- Footer End here -->
  <!-- jquery -->
  <script src="{{ asset('temp_2/assets/js/jquery-3.7.1.min.js')}}"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('temp_2/assets/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Isotope -->
  <script src="{{ asset('temp_2/assets/js/isotope.min.js')}}"></script>

  <!-- lightcase -->
  <script src="{{ asset('temp_2/assets/js/lightcase.js')}}"></script>

  <!-- counterup -->
  <script src="{{ asset('temp_2/assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('temp_2/assets/js/jquery.counterup.min.js')}}"></script>

  <!-- Swiper -->
  <script src="{{ asset('temp_2/assets/js/swiper.jquery.min.js')}}"></script>

  <!--progress-->
  <script src="{{ asset('temp_2/assets/js/circle-progress.min.js')}}"></script>

  <!--velocity-->
  <script src="{{ asset('temp_2/assets/js/velocity.min.js')}}"></script>

  <!--quick-view-->
  <script src="{{ asset('temp_2/assets/js/quick-view.js')}}"></script>

  <!--nstSlider-->
  <script src="{{ asset('temp_2/assets/js/jquery.nstSlider.js')}}"></script>

  <!--flexslider-->
  <script src="{{ asset('temp_2/assets/js/flexslider-min.js')}}"></script>

  <!--easing-->
  <script src="{{ asset('temp_2/assets/js/jquery.easing.min.js')}}"></script>

  <!--coundown-->
  <script src="{{ asset('temp_2/assets/js/coundown.js')}}"></script>

  <!-- custom -->
  <script src="{{ asset('temp_2/assets/js/custom.js')}}"></script>

  <script src="{{ asset('temp_2/assets/js/fullcalendar.min.js')}}"></script>

  <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
  <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
  <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
  
  @include('admin.include.message')
  
</body>


<!-- Mirrored from aminurislam.com/labartisan/kidsacademy-demo/kidsacademy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2024 06:29:15 GMT -->
</html>