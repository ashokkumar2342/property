@extends('admin.layout.base')
@section('body')
<section class="content-header">
    
    <a type="button" class="btn btn-info pull-right" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.banner.form', Crypt::encrypt(0)) }}')">Add Banner</a>
    <h3>Main Page Banner <br>{{@$rs_school_detail[0]->banner_size}}</h3>
 
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
                                <th>Description</th>
                                <th>Description (Hindi)</th>
                                <th>Display Order</th>
                                <th>Status</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rs_records as $gallery)
                            <tr>        
                                <td>{{$gallery->display_order}}</td>
                                <td>
                                    <img src="{!! url($gallery->image) !!}" style="height: 100px; width: 170px;" alt="image" class="img-rounded">
                                </td>
                                <td>{!! $gallery->description !!}</td>
                                <td>{!! $gallery->description_l !!}</td>
                                <td>{{ $gallery->display_order }}</td>
                                <td>{{$gallery->status==1?'Activate':'Deactivate'}}</td>
                                <td>
                                    <a type="button" class="btn btn-info" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.banner.form', Crypt::encrypt($gallery->id)) }}')">Edit</a>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.web.gallery.banner.delete', Crypt::encrypt($gallery->id)) }}">Delete</a>
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

