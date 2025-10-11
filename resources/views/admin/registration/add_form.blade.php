<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ $rec_id>0? 'Edit' : 'Add' }}</b>&nbsp;<i class="small text-muted"></i></h4> 
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.registration.store', Crypt::encrypt($rec_id)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="example" enctype="multipart/form-data">
             {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">                           
                        <div class="form-group">
                            <label>Project</label>
                            <select name="project_id" class="form-control">
                                <option selected disabled>Select Project</option>
                                @foreach ($rs_projects as $rs_value)
                                    <option value="{{$rs_value->id}}">{{$rs_value->name}}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Applicant Name</label>
                        <input type="text" name="applicant_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Father / Husband Name</label>
                        <input type="text" name="father_name_husband_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Reference By</label>
                        <input type="text" name="reference_code" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Aadhar Card Number</label>
                        <input type="text" name="aadhar_card_number" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">PAN Card Number</label>
                        <input type="text" name="pan_card_number" class="form-control" required>
                    </div>

                    <div class="col-lg-12 form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control rounded-3" rows="2" required></textarea>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label">State</label>
                        <input type="text" name="state" class="form-control" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label">Pincode</label>
                        <input type="text" name="pincode" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Quota</label>
                        <select name="quota" class="form-control" required>
                            <option value="" disabled {{ old('quota') ? '' : 'selected' }}>Select Quota</option>
                            <option value="Government Employee" {{ old('quota') == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
                            <option value="Female" {{ old('quota') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="General" {{ old('quota') == 'General' ? 'selected' : '' }}>General</option>
                            <option value="Management" {{ old('quota') == 'Management' ? 'selected' : '' }}>Management</option>
                        </select>
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-success form-control">{{ $rec_id>0? 'Update' : 'Submit' }}</button>
                    </div>  
                    <div class="col-lg-12 form-group">
                        <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


