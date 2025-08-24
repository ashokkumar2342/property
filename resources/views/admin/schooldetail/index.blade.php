@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>School Details</h1>
</section>  
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.school.details.store') }}" method="post" class="add_form" no-reset="true">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group  col-lg-4">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{@$rs_records[0]->name}}" maxlength="60"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Name Hindi</label>
                    <input type="text" name="name_l" class="form-control" value="{{@$rs_records[0]->name_l}}" maxlength="60"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Mobile No.</label>
                    <input type="text" name="mobile_no" class="form-control" value="{{@$rs_records[0]->mobile}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Contact No.</label>
                    <input type="text" name="contact_no" class="form-control" value="{{@$rs_records[0]->contact}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{@$rs_records[0]->email}}" maxlength="50"> 
                </div>
                <div class="form-group  col-lg-2">
                    <label>Opening Time</label>
                    <input type="text" name="opening_time" class="form-control" value="{{@$rs_records[0]->opening_time}}" maxlength="35"> 
                </div>
                <div class="form-group  col-lg-2">
                    <label>Opening Time Hindi</label>
                    <input type="text" name="opening_time_l" class="form-control" value="{{@$rs_records[0]->opening_time_l}}" maxlength="35"> 
                </div>
                <div class="form-group  col-lg-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{@$rs_records[0]->address}}" maxlength="250"> 
                </div>
                <div class="form-group  col-lg-6">
                    <label>Address Hindi</label>
                    <input type="text" name="address_l" class="form-control" value="{{@$rs_records[0]->address_l}}" maxlength="250"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Logo (Horizontal:332px, Vertical:102px)</label>
                    <input type="file" name="logo" class="form-control"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>URL Icon (Horizontal:64px, Vertical:64px)</label>
                    <input type="file" name="url_icon" class="form-control"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Uploaded Image</label><br>
                    <img src="{{asset(@$rs_records[0]->image)}}" alt="" height="80px" width="180px"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Uploaded Logo</label><br>
                    <img src="{{asset(@$rs_records[0]->logo)}}" alt="" height="80px" width="180px"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Uploaded URL Icon</label><br>
                    <img src="{{asset(@$rs_records[0]->url_icon)}}" alt="" height="80px" width="180px"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Facebook Link</label>
                    <input type="text" name="facebook_link" class="form-control" value="{{@$rs_records[0]->facebook_link}}" maxlength="100"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Twitter Link</label>
                    <input type="text" name="twitter_link" class="form-control" value="{{@$rs_records[0]->twitter}}" maxlength="100"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>Youtube Link</label>
                    <input type="text" name="youtube_link" class="form-control" value="{{@$rs_records[0]->youtube_link}}" maxlength="100"> 
                </div>
                <div class="form-group  col-lg-6">
                    <label>Footer Description</label>
                    <textarea name="footer_description" class="form-control" id="summernote">{!!@$rs_records[0]->footer_description!!}</textarea>
                </div>
                <div class="form-group  col-lg-6">
                    <label>Footer Description Hindi</label>
                    <textarea name="footer_description_l" class="form-control" id="summernote_l">{!!@$rs_records[0]->footer_description_l!!}</textarea>
                </div>
                <div class="form-group  col-lg-12">
                    <input type="submit" class="form-control btn btn-success" value="Save"> 
                </div>
            </div>
            </form> 
        </div>
    </div>
</section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $("#summernote").summernote({
            toolbar: [
                 
                 ['font', ['bold', 'italic', 'underline']], 
                 ['fontsize', ['fontsize']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
                 ['height', ['height']],              
                 ['insert', ['link', 'picture','video']],
              
               ],

             placeholder: 'write here...',
             height: 100
        });
    });
     $(document).ready(function(){
        $("#summernote_l").summernote({
            toolbar: [
                 
                 ['font', ['bold', 'italic', 'underline']], 
                 ['fontsize', ['fontsize']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
                 ['height', ['height']],              
                 ['insert', ['link', 'picture','video']],
              
               ],

             placeholder: 'write here...',
             height: 100
        });
    });
  </script>
  @endpush


