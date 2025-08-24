@php
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_4.include.main';
    $include_page_section = 'temp_4.include.main.container';
}else{
    $include_page_extends = 'temp_4.include_hindi.main';
    $include_page_section = 'temp_4.include_hindi.main.container';
}
$rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<section class="page-title-section bg-img cover-background bg-yellow" data-overlay-dark="0" data-background="{{ asset('temp_4/assets/img/bg/bg1.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1>{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</h1>
            <div class="page-link">
                <ul>
                    <li><a href="{{ route('template.index',[4,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="divider">
    <div class="container pt-100 pb-100">
        <div class="row">
            <div class="col-sm-12 col-xs-12 table-responsive">
                {!!$l_lang_type==1?@$result_rs[0]->page_content: @$result_rs[0]->page_content_l!!}
            </div>
            @if (!empty($result_rs[0]->file_path))
            <div class="col-sm-12 col-xs-12" style="margin-top: 20px;">
                <iframe src="{{ asset(@$result_rs[0]->file_path) }}"  width="100%" height="800px"></iframe>
            </div>

            @endif
        </div>
    </div>
</section>

</div> 
@endsection