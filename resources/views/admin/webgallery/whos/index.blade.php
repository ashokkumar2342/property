@extends('admin.layout.base')
@section('body')
<section class="content-header">
    
    <a type="button" class="btn btn-info pull-right" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.whos.who.form', Crypt::encrypt(0)) }}')">Add Who's Who</a>
    <h3>Who's Who (Note: Minimum 4 Records)</h3>
 
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
                                <th>Name</th>
                                <th>Name Hindi</th>
                                <th>Designation</th>
                                <th>Designation Hindi</th>
                                <th>Message</th>
                                <th>Message Hindi</th>
                                <th>Display Order</th>
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
                                <td>{{$rs_val->name }}</td>
                                <td>{{$rs_val->name_l }}</td>
                                <td>{{$rs_val->designation }}</td>
                                <td>{{$rs_val->designation_l }}</td>
                                <td>{!!$rs_val->message !!}</td>
                                <td>{!!$rs_val->message_l !!}</td>
                                <td>{{$rs_val->display_order }}</td>
                                <td>
                                    <a type="button" class="btn btn-info" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.whos.who.form', Crypt::encrypt($rs_val->id)) }}')">Edit</a>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.web.gallery.whos.who.delete', Crypt::encrypt($rs_val->id)) }}">Delete</a>
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

