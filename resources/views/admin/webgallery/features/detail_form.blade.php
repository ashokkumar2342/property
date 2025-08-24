<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$rs_records->id? 'Edit' : 'Add'}} Features Detail</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.web.gallery.features.detail.store',Crypt::encrypt(@$rs_records->id?@$rs_records->id:0)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="result_table" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Features</label>
                            <select name="features_id" class="form-control">
                                <option selected disabled>Select Features</option>
                                @foreach ($rs_features as $rs_features_val)
                                    <option value="{{$rs_features_val->id}}"{{$rs_features_val->id==@$rs_records->features_id?'selected':''}}>{{$rs_features_val->title}}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg">
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
