@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h3>Facts</h3> 
</section>
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.web.gallery.facts.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" maxlength="50" value="{{@$rs_records[0]->title}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Title Hindi</label>
                            <input type="text" name="title_l" class="form-control" maxlength="50" value="{{@$rs_records[0]->title_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" maxlength="100" value="{{@$rs_records[0]->sub_title}}">
                        </div>    
                    </div>
                    <div class="col-lg-6">                           
                        <div class="form-group">
                            <label>Sub Title Hindi</label>
                            <input type="text" name="sub_title_l" class="form-control" maxlength="100" value="{{@$rs_records[0]->sub_title_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 1</label>
                            <input type="text" name="caption_1" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_1}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 1 Hindi</label>
                            <input type="text" name="caption_1_l" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_1_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Values 1</label>
                            <input type="text" name="value_1" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$rs_records[0]->val_1}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 2</label>
                            <input type="text" name="caption_2" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_2}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 2 Hindi</label>
                            <input type="text" name="caption_2_l" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_2_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Values 2</label>
                            <input type="text" name="value_2" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$rs_records[0]->val_2}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 3</label>
                            <input type="text" name="caption_3" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_3}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 3 Hindi</label>
                            <input type="text" name="caption_3_l" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_3_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Values 3</label>
                            <input type="text" name="value_3" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$rs_records[0]->val_3}}">
                        </div>    
                    </div>  
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 4</label>
                            <input type="text" name="caption_4" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_4}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Caption 4 Hindi</label>
                            <input type="text" name="caption_4_l" class="form-control" maxlength="20" value="{{@$rs_records[0]->caption_4_l}}">
                        </div>    
                    </div>
                    <div class="col-lg-4">                           
                        <div class="form-group">
                            <label>Values 4</label>
                            <input type="text" name="value_4" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$rs_records[0]->val_4}}">
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
        
    
</script>
@endpush

