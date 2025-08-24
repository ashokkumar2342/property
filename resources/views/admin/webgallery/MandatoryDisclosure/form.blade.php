<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}}</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.MandatoryDisclosure.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Link Name</label>
                            <input type="text" name="link_name" class="form-control"maxlength="30" value="{{@$rs_records->link_name}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Link Name Hindi</label>
                            <input type="text" name="link_name_l" class="form-control"maxlength="30" value="{{@$rs_records->link_name_l}}">
                        </div>    
                    </div>  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>PDF File <a target="_blank" href="{{asset(@$rs_records->file_path)}}">{{@$rs_records->file_path?'Uploaded File View':''}}</a></label>
                            <input type="file" name="pdf_file" class="form-control" accept=".pdf">
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
