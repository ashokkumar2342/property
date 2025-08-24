@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h3>Popup Flash</h3> 
</section>
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.web.gallery.popup.flash.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from_date" class="form-control" required value="{{@$rs_records[0]->from_date}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="to_date" class="form-control" required value="{{@$rs_records[0]->to_date}}">
                        </div>    
                    </div>
                    <div class="col-lg-12">                         
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control summernote" name="content" >{{@$rs_records[0]->content}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1"{{@$rs_records[0]->status==1?'selected':''}}>Active</option>
                                <option value="0" {{@$rs_records[0]->status==0?'selected':''}}>Deactivate</option>
                            </select>
                        </div>    
                    </div>
                    <div class="col-lg-6 text-center" style="margin-top: 24px;">
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Save">  
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    
    $('.summernote').summernote({
        toolbar: [
             
             ['style', ['style']],
             ['font', ['bold', 'underline', 'clear']],
             ['fontname', ['fontname']],
             ['fontsize', ['fontsize']], 
             ['height', ['height']], 
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['table', ['table']],
             ['insert', ['link', 'picture', 'video']],
             ['view', ['fullscreen', 'codeview', 'help']]
          
           ],

         placeholder: 'write here...',
         height: 300
    }); 
                    
    
</script>
@endpush

