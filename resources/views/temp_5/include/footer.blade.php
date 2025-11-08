@php
  $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
  $rs_flash = App\Helper\WebHelper::getPopupFlash();
@endphp
<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">HomeSpace</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-12 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contant</a></li>
            <li><a href="#">Login</a></li>
          </ul>
        </div>

     

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>jhajjar</p>
          <p>Haryana</p>
          <p>Inidia</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+91 0000000000</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">HomeSpace</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
{{-- <script src="{{ asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('temp_5/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('temp_5/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('temp_5/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('temp_5/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('temp_5/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('temp_5/assets/js/main.js')}}"></script>
    <!-- all js include end -->
    <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
    <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
   {{--  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>


    @include('admin.include.message')

    <script>
    $(document).ready(function(){

        let editMode = false;

        $('#enableEdit').click(function(){
            editMode = !editMode;
            if(editMode){
                $(this).text('Disable Edit Mode');
                $('#saveEdits').removeClass('d-none');

                $('.editable').summernote({
                    height:150,
                    toolbar:[['style',['bold','italic','underline','clear']],
                             ['para',['ul','ol','paragraph']],
                             ['insert',['link','picture']],
                             ['view',['codeview']]],
                    callbacks:{
                        onImageUpload: function(files){
                            let editor = $(this);
                            let data = new FormData();
                            data.append('image', files[0]);
                            data.append('section', $(this).data('section'));
                            data.append('_token', "{{ csrf_token() }}");

                            $.ajax({
                                url: "{{ route('admin.blade.uploadImage') }}",
                                type:'POST',
                                data: data,
                                processData:false,
                                contentType:false,
                                success: function(res){ editor.summernote('insertImage', res.url); }
                            });
                        }
                    }
                });

                $('.editable-img img').on('click', function(){
                    if(!editMode) return;
                    let section = $(this).parent().data('section');
                    let imgEl = $(this);
                    $('<input type="file" accept="image/*">').on('change', function(e){
                        let file = e.target.files[0];
                        let formData = new FormData();
                        formData.append('image', file);
                        formData.append('section', section);
                        formData.append('_token', "{{ csrf_token() }}");

                        $.ajax({
                            url: "{{ route('admin.blade.uploadImage') }}",
                            type:'POST',
                            data: formData,
                            processData:false,
                            contentType:false,
                            success: function(res){ imgEl.attr('src', res.url); }
                        });
                    }).click();
                });

            } else {
                $(this).text('Enable Edit Mode');
                $('#saveEdits').addClass('d-none');
                $('.editable').summernote('destroy');
                $('.editable-img img').off('click');
            }
        });

        $('#saveEdits').click(function(){
            let updates = [];

            $('.editable').each(function(){
                if($(this).next('.note-editor').length){
                    updates.push({
                        section: $(this).data('section'),
                        content: $(this).summernote('code'),
                        type: 'text'
                    });
                }
            });

            $('.editable-img img').each(function(){
                updates.push({
                    section: $(this).parent().data('section'),
                    content: $(this).attr('src'),
                    type: 'image'
                });
            });

            $.post("{{ route('admin.blade.update') }}", {updates, _token: "{{ csrf_token() }}"})
             .done(res=>{ alert(res.message); location.reload(); })
             .fail(()=>alert('Error saving content!'));
        });

    });
    </script>

</body>


<!-- Mirrored from kidszone.websitelayout.net/demo-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 09:25:08 GMT -->
</html>