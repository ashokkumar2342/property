<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('login_cdn/main.d810cf0ae7f39f28f336.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
    @php
      $rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
    @endphp
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="text-center">
                            <img src="{{ asset(@$rs_school_detail[0]->logo)}}" alt="logo" style="width:250px;height:70px;">
                        </div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div><strong>{{@$rs_school_detail[0]->name}}</strong></div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                    <form action="{{ route('admin.login.post') }}" method="post" class="add_form">{{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input type="text" name="email" class="form-control border" placeholder="Email Or Mobile No." required="">
                                                </div>
                                            </div>
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input type="password" name="password" class="form-control border" placeholder="Password" required="">
                                                </div>
                                            </div>
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        </div>
                                        {{-- <div class="mb-2 lg-3">
                                             <div class="captcha">
                                              <span>{!! captcha_img('flat') !!}</span>
                                              <button type="button" class="btn btn-default btn-sm" id="refresh">refresh</button>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <input type="text" id="captcha" name="captcha" required="" class="form-control" placeholder="Enter Captcha" aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <p class="text-danger">{{ $errors->first('captcha') }}</p> --}}
                                    
                                        <div class="divider"></div>
                                        <h6 class="mb-0"><a href="{{ route('template.index',[1,1]) }}" class="text-primary">Go to home page</a></h6>
                                        <div class="modal-footer clearfix">
                                            <div class="float-left">
                                                <a href="javascript:void(0);" class="btn-lg btn btn-link">Forget Password</a>
                                            </div>
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">© Copyright {{date('Y')}} Designed By EAGESKOOL</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('login_cdn/main.d810cf0ae7f39f28f336.js') }}"></script>
    <script src="{{ asset('temp_1/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
    <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script> 
    @include('admin.include.message')
    <script type="text/javascript">
        $('#refresh').click(function(){ 
            $.ajax({ 
                type:'GET',
                url:'{{ route('refresh.captcha') }}',
                success:function(data){
                    $(".captcha span").html(data);
                }
            });
            alert('ok');
        });
    </script>
</body>
</html>