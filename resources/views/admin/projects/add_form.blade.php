<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ $rec_id>0? 'Edit' : 'Add' }}</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.projects.store', Crypt::encrypt($rec_id)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="example" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Project Name</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="name" class="form-control" placeholder="Enter Project Name" maxlength="50" required value="{{@$rs_records->name}}">
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>License No.</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="license_no" class="form-control" placeholder="Enter License No." maxlength="30" required value="{{@$rs_records->license_no}}">
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="email" name="email_id" class="form-control" placeholder="Enter Email ID" maxlength="50" value="{{@$rs_records->email_id}}">
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." maxlength="10" value="{{@$rs_records->mobile_no}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Location (Latitude)</label>
                            <input type="text" name="latitude" class="form-control" placeholder="Enter Latitude" value="{{@$rs_records->latitude}}" maxlength="50">
                        </div>   
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Location (Longitude)</label>
                            <input type="text" name="longitude" class="form-control" placeholder="Enter longitude" value="{{@$rs_records->longitude}}" maxlength="50">
                        </div>   
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="{{@$rs_records->start_date}}">
                        </div>    
                    </div> 
                    <div class="col-lg-6">                           
                         <div class="form-group">
                          <label>End Date</label>
                           <input type="date" name="end_date" class="form-control" value="{{@$rs_records->end_date}}">
                         </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Document Type</label>
                            <select name="document_id" class="form-control">
                                <option selected disabled>Select Document Type</option>
                                @foreach ($rs_documents as $rs_value)
                                    <option value="{{$rs_value->id}}"{{$rs_value->id==@$rs_records->document_id?'selected':''}}>{{$rs_value->name}}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Choose File (Accepted PDF 2MB)</label>
                            <input type="file" name="attachment" class="form-control" accept="application/pdf">
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center"><br>
                            <button type="submit" class="btn btn-success form-control">{{ $rec_id>0? 'Update' : 'Submit' }}</button>  
                            <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


