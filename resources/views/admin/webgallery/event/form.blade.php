<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}} Event</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.event.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">                           
                        <div class="form-group">
                            <label>Image (Horizontal:345px, Vertical:345px)</label>
                            <input type="file" name="image" class="form-control" accept=".jpg" required>
                        </div>    
                    </div> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"maxlength="25" value="{{@$rs_records->title}}" required>
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
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{@$rs_records->description}}</textarea>
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Description Hindi</label>
                            <textarea name="description_l" class="form-control">{{@$rs_records->description_l}}</textarea>
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" value="{{@$rs_records->date}}" required>
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Time</label>
                            <input type="text" name="time" class="form-control" maxlength="20" value="{{@$rs_records->time}}">
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
                            <label>Text Color</label>
                            <select name="text_color" class="form-control">
                                <option value="0">Select Color</option>
                                @foreach ($rs_icon_type as $rs_icon_val)
                                    <option value="{{$rs_icon_val->id}}"{{$rs_icon_val->id==@$rs_records->text_color?'selected':''}}>{{$rs_icon_val->text_color}}</option>
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
