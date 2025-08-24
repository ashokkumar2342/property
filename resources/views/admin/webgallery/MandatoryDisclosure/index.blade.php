@extends('admin.layout.base')
@section('body')
<section class="content-header">
    
    <a type="button" class="btn btn-info pull-right" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.MandatoryDisclosure.form', Crypt::encrypt(0)) }}')">Add Mandatory Disclosure</a>
    <h3>Mandatory Disclosuree</h3>
 
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
                                <th>Link Name</th>
                                <th>Link Hindi</th>
                                <th>PDF File</th>
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
                                <td>{{$rs_val->link_name }}</td>
                                <td>{{$rs_val->link_name_l }}</td>
                                <td>{{$rs_val->display_order }}</td>
                                <td>
                                    <a target="_blank" href="{{asset($rs_val->file_path)}}">{{$rs_val->file_path?'View File':''}}</a>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-info" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.web.gallery.MandatoryDisclosure.form', Crypt::encrypt($rs_val->id)) }}')">Edit</a>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.web.gallery.MandatoryDisclosure.status', Crypt::encrypt($rs_val->id)) }}">Delete</a>
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

