<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Image</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.propertiesImage.store', $id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="example" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row"> 
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Choose File (Accepted Image 2MB)</label>
                            <input type="file" name="attachment" class="form-control" accept="application/Image">
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center"><br>
                            <button type="submit" class="btn btn-success form-control">Upload</button>  
                            <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


