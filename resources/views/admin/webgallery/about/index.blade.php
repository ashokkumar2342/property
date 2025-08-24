@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h3>About Us</h3> 
</section>
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.web.gallery.about.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg">
                        </div>    
                    </div> 
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <img src="{{asset(@$rs_records[0]->image)}}" alt="" height="200px" width="200px">
                        </div>    
                    </div> 
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control summernote" name="description" >{{@$rs_records[0]->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">                         
                        <div class="form-group">
                            <label>Description Hindi</label>
                            <textarea class="form-control summernote" name="description_l" >{{@$rs_records[0]->description_l}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center" style="margin-top: 24px;">
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
         height: 400
    }); 
                    
    
</script>
@endpush

