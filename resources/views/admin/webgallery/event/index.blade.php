@extends('admin.layout.base')
@section('body')
<section class="content-header">
    
    <a type="button" class="btn btn-info pull-right" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.event.form', Crypt::encrypt(0)) }}')">Add Event</a>
    <h3>Events</h3>
 
</section>
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <div class="row"> 
                <div class="col-lg-12 table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="result_table">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Title Hindi</th>
                                <th>Sub Title</th>
                                <th>Sub Title Hindi</th>
                                <th>Description</th>
                                <th>Description Hindi</th>
                                <th>Date Time</th>
                                <th>Display Order</th>
                                <th>Text Color</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $srno = 1;
                            @endphp
                            @foreach ($rs_records as $rs_val)
                            <tr>        
                                <td>{{$srno++}}</td>
                                <td>
                                    <img src="{!! url($rs_val->image) !!}" style="height: 100px; width: 170px;" alt="image" class="img-rounded">
                                </td>
                                <td>{{$rs_val->title }}</td>
                                <td>{{$rs_val->title_l }}</td>
                                <td>{{$rs_val->sub_title }}</td>
                                <td>{{$rs_val->sub_title_l }}</td>
                                <td>{{$rs_val->description }}</td>
                                <td>{{$rs_val->description_l }}</td>
                                <td>{{$rs_val->date }}  {{$rs_val->time }}</td>
                                <td>{{$rs_val->display_order }}</td>
                                <td>{{$rs_val->text_color }}</td>
                                <td>
                                    <a type="button" class="btn btn-info" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.event.form', Crypt::encrypt($rs_val->id)) }}')">Edit</a>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.web.gallery.event.delete', Crypt::encrypt($rs_val->id)) }}">Delete</a>
                                </td> 
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

