@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_2.include.main';
    $include_page_section = 'temp_2.include.main.container';
  }else{
    $include_page_extends = 'temp_2.include_hindi.main';
    $include_page_section = 'temp_2.include_hindi.main.container';
  }
  $rs_teacher = App\Helper\WebHelper::getTeacher(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
  <!-- header End here -->


  <!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>{{$l_lang_type==1?'Teachers':'अध्यापक'}}</h3>
        <ul>
          <li><a href="{{ route('template.index',[2,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होम'}}</a></li>
          <li>-</li>
          <li>{{$l_lang_type==1?'Teachers':'अध्यापक'}}</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <!-- Teachers Start here -->
  <section class="teachers teachers-page padding-120">
    <div class="container">
      <div class="section-header">
        <h3>{{$l_lang_type==1?'Our Teachers':'हमारे अध्यापक'}}</h3>
      </div>
      <div class="row">
        @foreach ($rs_teacher as $rs_teacher_val)
          <div class="col-lg-6 col-xs-12">
            <div class="teacher-item">
              <div class="teacher-image">
                <img src="{{ asset($rs_teacher_val->image) }}" alt="teacher image" class="img-responsive">
              </div>
              <div class="teacher-content">
                <h4>{{$l_lang_type==1?$rs_teacher_val->name:$rs_teacher_val->name_l}}</h4>
                <span><strong>{{$l_lang_type==1?$rs_teacher_val->subject:$rs_teacher_val->subject_l}}</strong></span>
                <p>{{$l_lang_type==1?$rs_teacher_val->description:$rs_teacher_val->description_l}}</p>
              </div>
            </div><!-- teacher item -->
          </div>
        @endforeach
      </div><!-- row -->
    </div><!-- container -->
  </section><!-- teacher -->
  <!-- Teachers End here -->

  <!-- Footer Start here -->
@endsection