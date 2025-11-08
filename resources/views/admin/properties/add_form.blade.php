<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>{{ $rec_id>0? 'Edit' : 'Add' }} Property</b></h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.properties.store', Crypt::encrypt($rec_id)) }}" method="post" class="add_form" button-click="btn_close" content-refresh="example">
                {{ csrf_field() }}
                <div class="row">

                    <!-- Basic Info -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Basic & Type Information</h5>
                    </div>

                    <div class="col-lg-6"><label>Title</label><input name="title" class="form-control" required value="{{@$rs_records->title}}"></div>
                    <div class="col-lg-6"><label>Property System ID</label><input name="property_system_id" class="form-control" value="{{@$rs_records->property_system_id}}"></div>

                    <div class="col-lg-6">
                        <label>Property Type</label>
                        <select name="property_type_id" class="form-control">
                            <option disabled selected>Select</option>
                            @foreach($rs_types as $t)
                                <option value="{{ $t->id }}" {{ $t->id==@$rs_records->property_type_id?'selected':'' }}>{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label>Status</label>
                        <select name="status_id" class="form-control">
                            <option disabled selected>Select</option>
                            {{-- Renamed property_status_id to status_id in name attribute --}}
                            @foreach($rs_statuses as $s)
                                <option value="{{ $s->id }}" {{ $s->id==@$rs_records->status_id?'selected':'' }}>{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6"><label>Ownership Type</label><input name="ownership_type" class="form-control" value="{{@$rs_records->ownership_type}}"></div>
                    <div class="col-lg-6"><label>Developer Name</label><input name="developer_name" class="form-control" value="{{@$rs_records->developer_name}}"></div>

                    <div class="col-lg-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{@$rs_records->description}}</textarea>
                    </div>
                    
                    <!-- Pricing & Auction -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Pricing & Auction Details</h5>
                    </div>

                    <div class="col-lg-4"><label>Base Price</label><input name="base_price" type="number" step="0.01" class="form-control" value="{{@$rs_records->base_price}}"></div>
                    <div class="col-lg-4"><label>Market Price</label><input name="market_price" type="number" step="0.01" class="form-control" value="{{@$rs_records->market_price}}"></div>
                    <div class="col-lg-4"><label>EMD End Date/Time</label><input name="emd_end_datetime" type="datetime-local" class="form-control" value="{{@$rs_records->emd_end_datetime}}"></div>
                    
                    <div class="col-lg-6"><label>Auction Start Date/Time</label><input name="auction_start_datetime" type="datetime-local" class="form-control" value="{{@$rs_records->auction_start_datetime}}"></div>
                    <div class="col-lg-6"><label>Auction End Date/Time</label><input name="auction_end_datetime" type="datetime-local" class="form-control" value="{{@$rs_records->auction_end_datetime}}"></div>


                    <!-- Location & Mapping -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Location</h5>
                    </div>

                    <div class="col-lg-4">
                        <label>State</label>
                        <select name="state_id" class="form-control">
                            <option disabled selected>Select</option>
                            @foreach($rs_states as $st)
                                <option value="{{ $st->id }}" {{ $st->id==@$rs_records->state_id?'selected':'' }}>{{ $st->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>District</label>
                        <select name="district_id" class="form-control">
                            <option disabled selected>Select</option>
                            @foreach($rs_districts as $d)
                                <option value="{{ $d->id }}" {{ $d->id==@$rs_records->district_id?'selected':'' }}>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>City</label>
                        <select name="city_id" class="form-control">
                            <option disabled selected>Select</option>
                            @foreach($rs_cities as $c)
                                <option value="{{ $c->id }}" {{ $c->id==@$rs_records->city_id?'selected':'' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6"><label>Pincode</label><input name="pincode" type="number" class="form-control" value="{{@$rs_records->pincode}}"></div>
                    <div class="col-lg-6"><label>CERSAI ID</label><input name="cersai_id" class="form-control" value="{{@$rs_records->cersai_id}}"></div>

                    <div class="col-lg-12">
                        <label>Address Line</label>
                        <textarea name="address_line" class="form-control" rows="3">{{@$rs_records->address_line}}</textarea>
                    </div>

                    <div class="col-lg-6"><label>Latitude</label><input name="latitude" class="form-control" value="{{@$rs_records->latitude}}"></div>
                    <div class="col-lg-6"><label>Longitude</label><input name="longitude" class="form-control" value="{{@$rs_records->longitude}}"></div>


                    <!-- Dimensions & Features -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Dimensions & Features</h5>
                    </div>

                    <div class="col-lg-3"><label>Carpet Area</label><input name="carpet_area" type="number" step="0.01" class="form-control" value="{{@$rs_records->carpet_area}}"></div>
                    <div class="col-lg-3"><label>Built-up Area</label><input name="built_up_area" type="number" step="0.01" class="form-control" value="{{@$rs_records->built_up_area}}"></div>
                    <div class="col-lg-3"><label>Land Area</label><input name="land_area" type="number" step="0.01" class="form-control" value="{{@$rs_records->land_area}}"></div>
                    <div class="col-lg-3"><label>Unit (Sq Ft/Sq M)</label><input name="unit" class="form-control" value="{{@$rs_records->unit}}"></div>
                    
                    <div class="col-lg-4"><label>Number of Rooms</label><input name="num_of_rooms" type="number" class="form-control" value="{{@$rs_records->num_of_rooms}}"></div>
                    <div class="col-lg-4"><label>Floor Number</label><input name="floor_no" type="number" class="form-control" value="{{@$rs_records->floor_no}}"></div>
                    <div class="col-lg-4"><label>Units on Floor</label><input name="unit_on_floor" type="number" class="form-control" value="{{@$rs_records->unit_on_floor}}"></div>

                    <div class="col-lg-4"><label>Number of Car Parking</label><input name="num_of_car_parking" type="number" class="form-control" value="{{@$rs_records->num_of_car_parking}}"></div>
                    <div class="col-lg-4"><label>Num of Floors (Project)</label><input name="num_of_floors_project" type="number" class="form-control" value="{{@$rs_records->num_of_floors_project}}"></div>
                    <div class="col-lg-4"><label>Age of Construction (Yrs)</label><input name="age_of_construction" type="number" class="form-control" value="{{@$rs_records->age_of_construction}}"></div>

                    <div class="col-lg-6"><label>Facing (Direction)</label><input name="facing" class="form-control" value="{{@$rs_records->facing}}"></div>
                    <div class="col-lg-6"><label>Water Availability</label><input name="water_availability" class="form-control" value="{{@$rs_records->water_availability}}"></div>
                    
                    <!-- Legal & Documentation -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Legal & Documentation</h5>
                    </div>

                    <div class="col-lg-4"><label>Registration Number</label><input name="registration_number" class="form-control" value="{{@$rs_records->registration_number}}"></div>
                    <div class="col-lg-4"><label>Registration Date</label><input name="registration_date" type="date" class="form-control" value="{{@$rs_records->registration_date}}"></div>
                    <div class="col-lg-4"><label>Legal Clearance</label><input name="legal_clearance" class="form-control" value="{{@$rs_records->legal_clearance}}"></div>
                    
                    <div class="col-lg-6"><label>Title Deed Type</label><input name="title_deed_type" class="form-control" value="{{@$rs_records->title_deed_type}}"></div>
                    <div class="col-lg-6"><label>Type of Action</label><input name="type_of_action" class="form-control" value="{{@$rs_records->type_of_action}}"></div>
                    <div class="col-lg-12"><label>Possession Status</label><input name="possession_status" class="form-control" value="{{@$rs_records->possession_status}}"></div>


                    <!-- Borrower/Bank Info -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Borrower & Bank Information</h5>
                    </div>

                    <div class="col-lg-6"><label>Bank Name</label><input name="bank_name" class="form-control" value="{{@$rs_records->bank_name}}"></div>
                    <div class="col-lg-6"><label>Borrower Name</label><input name="borrower_name" class="form-control" value="{{@$rs_records->borrower_name}}"></div>
                    
                    <div class="col-lg-6">
                        <label>Co-Borrower Names</label>
                        <textarea name="co_borrower_names" class="form-control" rows="2">{{@$rs_records->co_borrower_names}}</textarea>
                    </div>
                    <div class="col-lg-6">
                        <label>Borrower Registered Address</label>
                        <textarea name="borrower_registered_address" class="form-control" rows="2">{{@$rs_records->borrower_registered_address}}</textarea>
                    </div>

                    <!-- Miscellaneous -->
                    <div class="col-lg-12">
                        <h5 class="text-primary mt-3 border-bottom pb-1">Other Details</h5>
                    </div>

                    <div class="col-lg-4">
                        <label>Nearby Localities</label>
                        <textarea name="nearby_localities" class="form-control" rows="3">{{@$rs_records->nearby_localities}}</textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>USPs (Unique Selling Points)</label>
                        <textarea name="usps" class="form-control" rows="3">{{@$rs_records->usps}}</textarea>
                    </div>
                    <div class="col-lg-4">
                        <label>Other Detail</label>
                        <textarea name="other_detail" class="form-control" rows="3">{{@$rs_records->other_detail}}</textarea>
                    </div>


                    <div class="col-lg-12 text-center mt-3">
                        <button class="btn btn-success">{{ $rec_id>0? 'Update' : 'Submit' }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
