@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
  }else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
  }
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?"Who's Who": 'कौन कौन है'}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                    <li>{{$l_lang_type==1?"Message": 'संदेश'}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class=team-single>
            @foreach ($result_rs as $result_val)
                <div class="row">
                    <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                        <div class="team-single-img">
                            <img src="{{ asset(@$result_val->image) }}" class="border-radius-5" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="padding-20px-left xs-no-padding-left">
                            <h3 class="text-pink">{{$l_lang_type==1?@$result_val->name : @$result_val->name_l}}</h3>
                            <h6 class="font-weight-400 font-size16 opacity7 margin-25px-bottom">{{$l_lang_type==1?@$result_val->designation : @$result_val->designation_l}}</h6>
                            <p class="margin-25px-bottom">{!!$l_lang_type==1?@$result_val->message : @$result_val->message_l!!}</p>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</section>
    

    
@endsection