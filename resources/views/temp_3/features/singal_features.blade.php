@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_3.include.main';
    $include_page_section = 'temp_3.include.main.container';
  }else{
    $include_page_extends = 'temp_3.include_hindi.main';
    $include_page_section = 'temp_3.include_hindi.main.container';
  }
  $rs_features = App\Helper\WebHelper::getFeatures(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)

<div class="main-content-area">

    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('temp_3/assets/images/bg/bg1.jpg') }}">
        <div class="container pt-50 pb-50">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{$l_lang_type==1?'Our': 'हमारी'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Features': 'विशेषताएं'}}</span></h2>
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
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="section-title">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="tm-sc-section-title section-title text-center">
                            <div class="title-wrapper">
                                <h2 class="title"><span class="text-theme-colored3"> {{$l_lang_type==1?$rs_features_tile[0]->title:$rs_features_tile[0]->title_l}}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 order-lg-2">
                    @foreach ($result_rs as $result_rs_val)
                        <div class="blog-posts single-post">
                            <article class="post clearfix mb-0">
                                <div class="entry-header mb-30">
                                    <div class="post-thumb thumb"> <img src="{{ asset($result_rs_val->image) }}" alt="images" class="img-responsive img-fullwidth"> </div>
                                </div>
                                <div class="entry-content">
                                    <p>{!!$l_lang_type==1?$result_rs_val->description:$result_rs_val->description_l!!}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h4 class="title">{{$l_lang_type==1?'Our': 'हमारी'}}<span class="text-theme-colored3"> {{$l_lang_type==1?'Features': 'विशेषताएं'}}</span>
                            </h4>
                            @foreach ($rs_features as $rs_val)
                                <div class="latest-posts">
                                    <article class="post clearfix pb-0 mb-20">
                                        <a class="post-thumb" href="{{ route('template.singal.features',[3,$l_lang_type, $rs_val->id]) }}"><i class="{{$rs_val->icon}}" aria-hidden="true"></i></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="{{ route('template.singal.features',[3,$l_lang_type, $rs_val->id]) }}">{{$l_lang_type==1?$rs_val->title:$rs_val->title_l}}</a></h5>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection