@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
@endphp
<footer class="footer-bg-img">
  <!-- Footer Color Bar -->
  <div class="color-bar">
    <div class="container-fluid">
      <div class="row">
        <div class="col color-bar bg-warning"></div>
        <div class="col color-bar bg-danger"></div>
        <div class="col color-bar bg-success"></div>
        <div class="col color-bar bg-info"></div>
        <div class="col color-bar bg-purple"></div>
        <div class="col color-bar bg-pink"></div>
        <div class="col color-bar bg-warning d-none d-md-block"></div>
        <div class="col color-bar bg-danger d-none d-md-block"></div>
        <div class="col color-bar bg-success d-none d-md-block"></div>
        <div class="col color-bar bg-info d-none d-md-block"></div>
        <div class="col color-bar bg-purple d-none d-md-block"></div>
        <div class="col color-bar bg-pink d-none d-md-block"></div>
      </div>
    </div>
  </div>

  <div class="pt-8 pb-7  bg-repeat" style="background-image: url('{{ asset('temp_1/assets/img/background/footer-bg-img-1.png') }}');">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 col-xs-12">
          <a class="mb-6 d-block" href="{{ route('template.index',[1,1]) }}">
            <img class="img-fluid d-inline-block w-50 lazyestload" data-src="{{ asset(@$rs_school_detail[0]->logo) }}" src="{{ asset(@$rs_school_detail[0]->logo) }}">
          </a>
          <p class="mb-6">{!!@$rs_school_detail[0]->footer_description!!}</p>
          
        </div>

        <div class="col-sm-6 col-lg-3 col-xs-12">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Useful Links</h4>
          <ul class="list-unstyled">
            <li class="mb-4">
              <a href="{{ route('template.about',[1,1]) }}">
                <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>About Us
              </a>
            </li>
            <li class="mb-4">
              <a href="{{ route('template.gallery',[1,1]) }}">
                <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Gallery
              </a>
            </li>
            <li class="mb-4">
              <a href="{{ route('template.teacher',[1,1]) }}">
                <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Teachers
              </a>
            </li>
            <li class="mb-4">
              <a href="{{ route('template.events',[1,1]) }}">
                <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>Events
              </a>
            </li>
            <li class="mb-3">
              <a href="{{ route('template.contact',[1,1]) }}">
                <i class="fas fa-angle-double-right me-2" aria-hidden="true"></i>
                Contact Us
              </a>
            </li>
          </ul>
        </div>

        <div class="col-sm-6 col-lg-3 col-xs-12">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Contact Us</h4>
          <ul class="list-unstyled list-item-border-bottom">
            <li class="mb-4 pb-4">
              <div class="media">
                <a class="me-2" href="#">
                  <i class="fas fa-envelope" aria-hidden="true" style="color:red"></i>
                </a>
                <div class="media-body">
                  <h5 class="line-hight-16 mb-1">
                    <a class="font-base font-size-14" href="#">{{@$rs_school_detail[0]->email}}</a>
                  </h5>
                </div>
              </div>
            </li>
            <li class="mb-4 pb-4">
              <div class="media">
                <a class="me-2" href="#">
                  <i class="fas fa-phone-alt" aria-hidden="true" style="color:green"></i>
                </a>
                <div class="media-body">
                  <h5 class="line-hight-16 mb-1">
                    <a class="font-base font-size-14" href="#">{{@$rs_school_detail[0]->mobile}}, {{@$rs_school_detail[0]->contact}}</a>
                  </h5>
                </div>
              </div>
            </li>
            <li class="mb-4 pb-4">
              <div class="media">
                <a class="me-2" href="#">
                  <i class="fas fa-map-marker-alt" aria-hidden="true" style="color:red"></i>
                </a>
                <div class="media-body">
                  <h5 class="line-hight-16 mb-1">
                    <a class="font-base font-size-14" href="#">{{@$rs_school_detail[0]->address}}</a>
                  </h5>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 col-xs-12">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Map</h4>
          {!!@$rs_school_detail[0]->map!!}
        </div>
      </div>
    </div>
  </div>

  <!-- Copy Right -->
  <div class="copyright">
    <div class="container">
      <div class="row py-4 align-items-center">
        <div class="col-sm-7 col-xs-12 order-1 order-md-0">
          <p class="copyright-text"> © <span id="copy-year"></span> Designed By EAGESKOOL , Last Update :: {{date('d-M-Y h:i', strtotime(@$rs_school_detail[0]->update_date_time))}}</p>
        </div>

        <div class="col-sm-5 col-xs-12">
          <ul class="list-inline d-flex align-items-center justify-content-md-end justify-content-center mb-md-0">
            @if (@$rs_school_detail[0]->facebook_link != "")
              <li class="me-3">
                <a class="icon-rounded-circle-small bg-primary" target="_blank" href="{{@$rs_school_detail[0]->facebook_link}}">
                  <i class="fab fa-facebook-f text-white" aria-hidden="true"></i>
                </a>
              </li>
            @endif
            @if(@$rs_school_detail[0]->twitter_link != "")
              <li class="me-3">
                <a class="icon-rounded-circle-small bg-success" target="_blank" href="{{@$rs_school_detail[0]->twitter_link}}">
                  <i class="fab fa-twitter text-white" aria-hidden="true"></i>
                </a>
              </li>
            @endif
            @if(@$rs_school_detail[0]->youtube_link != "")
              <li class="me-3">
                <a class="icon-rounded-circle-small bg-danger" target="_blank" href="{{@$rs_school_detail[0]->youtube_link}}">
                  <i class="fab fa-youtube text-white" aria-hidden="true"></i>
                </a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Modal Login -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
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
            <div class="form-group">
              <button type="submit" class="btn btn-danger text-uppercase w-100">Log In</button>
            </div>

            {{-- <div class="form-group text-center text-secondary mb-0">
              <a class="text-danger" href="#">Forgot password?</a>
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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

<!-- Modal Enroll -->
<div class="modal fade" id="modal-enrolAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm rounded" role="document">
    <div class="modal-content">
      <div class="bg-pink rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Create An Account</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="#" method="POST" role="form">
            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="User name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Phone" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Password" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Re-Password" required="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-pink text-uppercase text-white w-100">Register</button>
            </div>

            <div class="form-group text-center text-secondary mb-0">
              <p class="mb-0">Allready have an account? <a class="text-pink" href="javascript:void(0)">Log in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!--scrolling-->
<div class="">
  <a href="#pageTop" class="back-to-top" id="back-to-top" style="opacity: 1;">
    <i class="fas fa-arrow-up" aria-hidden="true"></i>
  </a>
</div>

<!-- Javascript -->
<script src="{{ asset('temp_1/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('temp_1/assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/isotope/isotope.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/images-loaded/js/imagesloaded.pkgd.min.js')}}"></script>

<script src="{{ asset('temp_1/assets/plugins/lazyestload/lazyestload.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/velocity/velocity.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/smoothscroll/SmoothScroll.js')}}"></script>


<script src="{{ asset('temp_1/assets/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Load revolution slider only on Local File Systems. The following part can be removed on Server -->
 
<script src="{{ asset('temp_1/assets/plugins/revolution/js/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/revolution/js/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/plugins/revolution/js/revolution.extension.navigation.min.js')}}"></script> 


<script src="{{ asset('temp_1/assets/plugins/wow/wow.min.js')}}"></script>

<script>
  var d = new Date();
  var year = d.getFullYear();
  document.getElementById("copy-year").innerHTML = year;
</script>
<script src="{{ asset('temp_1/assets/js/fullcalendar.min.js')}}"></script>
<script src="{{ asset('temp_1/assets/js/kidz.js')}}"></script>
<link href="{{ asset('temp_1/assets/options/optionswitch.css')}}" rel="stylesheet">
<script src="{{ asset('temp_1/assets/options/optionswitcher.js')}}"></script>
<script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
<script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
<script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
<script type="text/javascript">
  
  
  $(function () {
    @if (@$rs_flash[0]->status ==1)
      $('#modal-products').modal('show');
    @endif
  });
  
</script> 
@include('admin.include.message')
</body>


<!-- Mirrored from kidz-html.netlify.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Feb 2024 15:44:48 GMT -->
</html>