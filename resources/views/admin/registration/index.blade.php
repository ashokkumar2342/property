@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Registration</h1>
    <ol class="breadcrumb">
        <li>
            <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.registration.form',Crypt::encrypt(0)) }}')"><i class="fa fa-plus"></i> New Registration</button>
        </li>
    </ol>
</section>
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <fieldset class="fieldset_border">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="example">
                                <thead style="background: #808080;color: #fff;">
                                    <tr>
                                        <th>Sr. No.</th>                
                                        <th>Project</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email ID</th>
                                        <th>Aadhaar No.</th>
                                        <th>Pan No.</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $sr_no = 1; @endphp
                                @foreach($rs_records as $rs_value)
                                    <tr>
                                        <td>{{ $sr_no++ }}</td>
                                        <td><span class="label label-success">{{ $rs_value->name }}</span></td>
                                        <td>{{ $rs_value->applicant_name }}</td>
                                        <td>{{ $rs_value->father_name_husband_name }}</td>
                                        <td><span class="label label-success">{{ $rs_value->phone_number }}</span></td>
                                        <td><span class="label label-warning">{{ $rs_value->email }}</span></td>
                                        <td>{{ $rs_value->aadhar_card_number }}</td>
                                        <td>{{ $rs_value->pan_card_number }}</td>
                                        <td>{{ $rs_value->address }}, {{ $rs_value->city }}, {{ $rs_value->state }}, {{ $rs_value->pincode }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>                
        </div>
    </div> 
</section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable();
    }); 
</script>   
@endpush
