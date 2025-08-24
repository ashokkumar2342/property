@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h3>Gallery</h3> 
</section>
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.web.gallery.gallery.store') }}" method="post" class="add_form" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3">                           
                        <div class="form-group">
                            <label>Image (Horizontal:470px, Vertical:400px)</label>
                            <input type="file" name="image" class="form-control" accept=".jpg">
                        </div>    
                    </div> 
                    <div class="col-lg-3">                         
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{@$rs_records->title}}" maxlength="50">
                        </div>
                    </div>
                    <div class="col-lg-3">                         
                        <div class="form-group">
                            <label>Title Hindi</label>
                            <input type="text" name="title_l" class="form-control" value="{{@$rs_records->title_l}}" maxlength="50">
                        </div>
                    </div>
                    <div class="col-lg-3">                         
                        <div class="form-group">
                            <label>Display Order</label>
                            <input type="text" name="display_order" class="form-control" value="{{@$rs_records->display_order}}" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 24px;">
                        <div class="form-group">
                            <input type="submit" class="btn btn-success form-control" value="Save">  
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                                <td>
                                    <input type="text" name="title" id="title_id_{{ $rs_val->id }}" class="form-control" value="{{ $rs_val->title }}" maxlength="50">
                                </td>
                                <td>
                                    <input type="text" name="title_l" id="title_l_id_{{ $rs_val->id }}" class="form-control" value="{{ $rs_val->title_l }}" maxlength="50">
                                </td>
                                <td>
                                    <input type="text" name="display_order" id="display_order_id_{{ $rs_val->id }}" class="form-control" value="{{ $rs_val->display_order }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="2">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" button-click="btn_show" success-popup="true" onclick="callAjax(this, '{{ route('admin.web.gallery.gallery.update', Crypt::encrypt($rs_val->id)) }}'+'?display_order='+$('#display_order_id_{{ $rs_val->id }}').val()+'&title='+$('#title_id_{{ $rs_val->id }}').val()+'&title_l='+$('#title_l_id_{{ $rs_val->id }}').val())">Update</button>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.web.gallery.gallery.delete', Crypt::encrypt($rs_val->id)) }}">Delete</a>
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

