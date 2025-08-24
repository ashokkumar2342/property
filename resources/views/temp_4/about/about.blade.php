@php
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
}else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
}
$rs_about = App\Helper\WebHelper::getAbout();
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'About Us':'हमारे बारे में'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="parallax no-padding-bottom background-position-center-center" data-background="{{ asset(@$rs_about[0]->image) }}">
    <div class="container padding-90px-top md-padding-70px-top sm-padding-50px-top xs-padding-15px-top">

        <div class="row">
            <div class="col-md-9 col-lg-8 col-xl-7">
                <div class="about-detail">
                    <div class="section-heading left">
                        <h2>{{$l_lang_type==1?'About':'हमारे'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Us':'बारे में'}}</span></h2>
                        <span class="title-separator"></span>
                    </div>
                    <p>{!!$l_lang_type==1?@$rs_about[0]->description:@$rs_about[0]->description_l!!}</p>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection