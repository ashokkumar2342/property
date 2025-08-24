<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}} Features</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.features.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"maxlength="25" value="{{@$rs_records->title}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Title Hindi</label>
                            <input type="text" name="title_l" class="form-control"maxlength="25" value="{{@$rs_records->title_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Sub Title</label>
                            <input type="text" name="sub_title" class="form-control"maxlength="100" value="{{@$rs_records->sub_title}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Sub Title Hindi</label>
                            <input type="text" name="sub_title_l" class="form-control"maxlength="100" value="{{@$rs_records->sub_title_l}}">
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
                            <label>Icon</label>
                            <select name="icon" class="form-control">
                                <option value="0">Select Icon</option>
                                @foreach ($rs_icon_type as $rs_icon_val)
                                    <option value="{{$rs_icon_val->id}}"{{$rs_icon_val->id==@$rs_records->icon_id?'selected':''}}>{{$rs_icon_val->icon}}</option>
                                @endforeach
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
