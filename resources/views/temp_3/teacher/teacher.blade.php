@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_teacher = App\Helper\WebHelper::getTeacher(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Our':'हमारे'}} <span class="text-theme-colored3">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</span></h2>
                        <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                            <div class="breadcrumbs">
                                <span class="trail-item trail-begin">
                                    <a href="{{ route('template.index',[3,$l_lang_type]) }}"><span>{{$l_lang_type==1?'Home':'होमे'}}</span></a>
                                </span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-img-cover bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/p2.jpg') }}">
        <div class="container pb-90">
            <div class="section-content">
                <div class="row">
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($rs_teacher as $rs_teacher_val)
                    @php
                        $counter ++;
                    @endphp
                    <div class="col-sm-6 col-xl-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="team-member">
                            <div class="team-thumb">
                                <img class="img-fullwidth" src="{{ asset($rs_teacher_val->image) }}" alt="">
                            </div>
                            <div class="team-details text-center bg-theme-colored{{$counter}}">
                                <div class="member-biography">
                                    <h3 class="mt-0 {{$rs_teacher_val->text_color}} mb-0 ">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</h3>
                                    <p><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></p>
                                </div>
                                <p class="mb-0 text-white">{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
                            </div>
                        </div>
                    </div>
                    @php
                        if ($counter == 4) {
                            $counter = 1;
                        }                        
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="tm-floating-objects">
            <span class="z-index-1 bg-img-cover" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/f2.png') }}" data-tm-width="100%" data-tm-height="143" data-tm-top="auto" data-tm-bottom="0" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
        </div>
    </section>

 

</div> 
@endsection