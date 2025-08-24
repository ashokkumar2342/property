@php
  if ($l_lang_type == 1) {
    $include_page_extends = 'temp_1.include.main';
    $include_page_section = 'temp_1.include.main.container';
  }else{
    $include_page_extends = 'temp_1.include_hindi.main';
    $include_page_section = 'temp_1.include_hindi.main.container';
  }
  $rs_events = App\Helper\WebHelper::getEvents(0);
@endphp

@extends($include_page_extends)
@section($include_page_section)

<div class="main-wrapper blog-single-left-sidebar">
    <section class="breadcrumb-bg" style="background-image: url('{{ asset('temp_1/assets/img/background/page-title-bg-img.jpg') }}'); ">
        <div class="container">
            <div class="breadcrumb-holder">
                <div>
                    <h1 class="breadcrumb-title">{{$l_lang_type==1?'Events': 'आयोजन'}}</h1>
                    <ul class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a class="text-white" href="{{ route('template.index',[1,$l_lang_type]) }}">{{$l_lang_type==1?'Home':'होमे'}}</a>
                        </li>
                        <li class="breadcrumb-item text-white active" aria-current="page">
                            {{$l_lang_type==1?'Events': 'आयोजन'}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 py-md-10">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 col-xs-12 order-md-1">
                    <div class="card shadow-none bg-transparent">
                        <div class="position-relative">
                            <img class="w-100 rounded-top" src="{{ asset(@$rs_events_val->image) }}" alt="Card image cap">
                            <div class="card-img-overlay">
                                <span class="badge badge-rounded {{@$rs_events_val->text_color}}"> {{date('d', strtotime(@$rs_events_val->date))}} <br> {{date('M', strtotime(@$rs_events_val->date))}}</span>
                            </div>
                        </div>
                        <div class="card-body border-top-5 px-3 rounded-bottom border-primary">
                            <h3 class="text-primary font-weight-bold mb-4">{{$l_lang_type==1?@$rs_events_val->title:@$rs_events_val->title_l}}</h3>

                            <ul class="list-unstyled d-flex mb-6">
                                <li class="">
                                    <i class="far fa-clock me-2" aria-hidden="true"></i>{{@$rs_events_val->time}}
                                </li>
                                
                            </ul>

                            <p class="card-text text-justify mb-6">{{$l_lang_type==1?@$rs_events_val->sub_title:@$rs_events_val->sub_title_l}}</p>

                            <p class="card-text text-justify mb-6">{{$l_lang_type==1?@$rs_events_val->description:@$rs_events_val->description_l}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="mb-4">
                        <h3 class="bg-purple rounded-top font-weight-bold text-white mb-0 py-2 px-4">Events List</h3>
                        <div class="border border-top-0 rounded">
                            <ul class="list-unstyled mb-0" style="height: 600px;overflow-x: hidden;overflow-y: scroll;">
                                @foreach ($rs_events as $val_events)
                                   <li class="border-bottom p-3">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-1">
                                                    <a class="btn-link font-base text-hover-purple" href="{{ route('template.events.detail',[1,$l_lang_type,$val_events->id]) }}">{{$l_lang_type==1?@$val_events->title:@$val_events->title_l}}</a>
                                                </h5>
                                                <time class="text-muted">{{date('d-M-Y', strtotime(@$val_events->date))}}</time>
                                            </div>
                                        </div>
                                    </li> 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
