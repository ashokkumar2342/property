<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ @$id>0? 'Edit' : 'Add' }}</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.document.type.store', Crypt::encrypt(@$id)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="example" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Document code</label>
                            <input type="text" name="code" class="form-control" placeholder="Enter Document code" maxlength="5" required value="{{@$document->code}}">
                        </div>   
                    </div>
                    <div class="col-lg-12">                           
                        <div class="form-group">
                            <label>Document Type</label>
                            <input type="text" name="documentType" class="form-control" placeholder="Enter Document Type" maxlength="50" required value="{{@$document->name}}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center"><br>
                            <button type="submit" class="btn btn-success form-control">{{ @$id>0? 'Update' : 'Submit' }}</button>  
                            <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


