@php
$admin = \App\Helper\MyFuncs::getUser();
$l_lang_type =1;
if ($l_lang_type == 1 ) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
} else {
    $include_page_extends = 'temp_5.include_hindi.main';
    $include_page_section = 'temp_5.include_hindi.main.container';
}
$rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<style type="text/css">
.captcha {
  display: flex;
  align-items: center;
  gap: 10px;
}

.captcha span img {
  height: 40px;
  border-radius: 4px;
}

.captcha button {
  padding: 6px 10px;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElqsC5X3z8dHxzJzB+f7m5P5U6CkC9Ujz8+6Yk4Lvw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Login</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Login</li>
            </ol>
        </nav>
    </div>
</div>

<section id="contact-2" class="contact-2 section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="row bg-white rounded-4 shadow-lg overflow-hidden">

                    {{-- Left: Form --}}
                    <div class="col-md-7 p-5">
                        

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 shadow-sm">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{ route('user.login.post') }}" method="post" button-click="btn_close" class="" enctype="multipart/form-data" >
                             {{ csrf_field() }}
                               <div class="col-12">
                                    <label>Mobile No.</label>
                                    <input type="text" name="mobile" class="form-control" required>
                                </div>
                                <br>
                               <div class="form-group has-feedback">
                                 <div class="captcha d-flex align-items-center" style="gap: 10px;">
                                     <span>{!! captcha_img('math') !!}</span>
                                    

                                 </div>
                               </div>
                               <br>
                               <div class="form-group has-feedback">
                                  <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required> 
                                   <p class="text-danger">{{ $errors->first('captcha') }}</p>
                               </div>  
                                

                                <div class="col-12">
                                    <button type="submit" class="form-control text-success">
                                        Login
                                    </button>
                                </div>
                             </form>    
                            </div>
                       
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
 
<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'{{ route('admin.refresh.captcha') }}',
     success:function(data){
        $(".captcha span").html(data);
     }
  });
});
</script>
@endpush