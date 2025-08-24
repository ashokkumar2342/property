<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}} </b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.whos.who.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">                           
                        <div class="form-group">
                            <label>Image (Horizontal:300px, Vertical:300px)</label>
                            <input type="file" name="image" class="form-control" accept=".jpg">
                        </div>    
                    </div> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"maxlength="50" value="{{@$rs_records->name}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Name Hindi</label>
                            <input type="text" name="name_l" class="form-control"maxlength="50" value="{{@$rs_records->name_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control"maxlength="25" value="{{@$rs_records->designation}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Designation Hindi</label>
                            <input type="text" name="designation_l" class="form-control"maxlength="25" value="{{@$rs_records->designation_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control summernote" name="message">{!!@$rs_records->message!!}</textarea>
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Message Hindi</label>
                            <textarea class="form-control summernote" name="message_l">{!!@$rs_records->message_l!!}</textarea>
                        </div>    
                    </div>
                    
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Display Order</label>
                            <input type="text" name="display_order" class="form-control" value="{{@$rs_records->display_order}}" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
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
