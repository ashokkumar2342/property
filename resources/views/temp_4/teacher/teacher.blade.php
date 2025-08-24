@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
  $rs_teacher = App\Helper\WebHelper::getTeacher(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?'Our Teachers':'हमारे अध्यापक'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container lg-container">
        <div class="section-heading">
            <h3>{{$l_lang_type==1?'Our':'हमारे'}} <span class="text-theme-colored3">{{$l_lang_type==1?'Teachers':'अध्यापक'}}</span></h3>
            <span class="title-separator"></span>
        </div>
        <div class="row justify-content-center">
            @foreach ($rs_teacher as $rs_teacher_val)
                <div class="col-10 col-sm-11 col-lg-6 margin-30px-bottom">

                    <div class="row no-gutters team-block">
                        <div class="col-sm-5"><img src="{{ asset($rs_teacher_val->image) }}" alt="" /></div>
                        <div class="col-sm-7">
                            <div class="padding-35px-all sm-padding-25px-all xs-padding-20px-all">
                                <h4><a href="teacher-details.html" class="{{$rs_teacher_val->text_color}}">{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</a></h4>
                                <span class="display-block margin-15px-bottom"><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
                                <p class="margin-35px-bottom">{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    
   
@endsection