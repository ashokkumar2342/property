<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}} Banner</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.banner.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-12">                           
                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control" accept=".jpg">
                        </div>    
                    </div>
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control summernote" name="description">{!!@$rs_records->description!!}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Description Hindi</label>
                            <textarea class="form-control summernote" name="description_l">{!!@$rs_records->description_l!!}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Display Order</label>
                            <input type="text" name="display_order" class="form-control" value="{{@$rs_records->display_order}}" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                    </div>
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{@$rs_records->status==1?'selected':''}}>Activate</option>
                                <option value="0" {{@$rs_records->status==0?'selected':''}}>Deactivate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center"><br>
                            <input type="submit" class="btn btn-success" value="Save">  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
