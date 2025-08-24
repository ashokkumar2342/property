@php
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
}else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
}
$rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)
<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title"><span class="text-theme-colored3">{{$l_lang_type==1?@$result_rs[0]->page_heading: @$result_rs[0]->page_heading_l}}</span></h2>
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