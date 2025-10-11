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
