@extends('admin.layout.base')
@section('body')
<style>
    /* Table styling */
    .data_table {
        border: 1px solid #e3e6f0;
        border-radius: 10px;
        overflow: hidden;
    }
    .data_table th {
        background: linear-gradient(45deg, #20c997, #17a2b8);
        color: #fff;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
        text-align: center;
    }
    .data_table td {
        vertical-align: middle;
        font-size: 14px;
    }
    .data_table tbody tr:hover {
        background: #f1f5f9;
        transition: 0.3s ease-in-out;
    }
    /* Badge customization */
    .badge {
        font-size: 12px;
        padding: 6px 10px;
    }
    /* Action button spacing */
    .action-btns a {
        margin: 0 2px;
    }
</style>

<section class="content-header d-flex justify-content-between align-items-center mb-3">
    <a type="button" class="btn btn-success btn-sm shadow-sm pull-right"  
       onclick="callPopupLarge(this,'{{ route('admin.projects.form', Crypt::encrypt(0)) }}')">
        <i class="fa fa-plus"></i> Add Projects
    </a>
    <h1 class="h3 text-primary"><i class="fa fa-file-alt"></i>Projects</h1>
</section>

<section class="content">
    <div class="box shadow-lg border-0 rounded-4">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center data_table" id="example">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>                
                            <th>Name</th>
                            <th>License No.</th>
                            <th>Email ID</th>
                            <th>Mobile No.</th>
                            <th>Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Document Type</th>
                            <th>File</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sr_no = 1; @endphp
                        @foreach($rs_records as $rs_value)
                        <tr>
                            <td><span class="badge bg-primary">{{ $sr_no++ }}</span></td>
                            <td>{{ $rs_value->name }}</td>
                            <td>{{ $rs_value->license_no }}</td>
                            <td>{{ $rs_value->email_id }}</td>
                            <td>{{ $rs_value->mobile_no }}</td>
                            <td>
                                @if(!empty($rs_value->latitude) && !empty($rs_value->longitude))
                                    <a href="https://www.google.com/maps?q={{ $rs_value->latitude }},{{ $rs_value->longitude }}" 
                                       class="btn btn-sm btn-outline-primary" target="_blank">
                                       <i class="fa fa-map-marker"></i> View Map
                                    </a>
                                @else
                                    <span class="text-muted fst-italic">No Location</span>
                                @endif
                            </td>
                            <td><span class="badge bg-success">{{ $rs_value->s_date }}</span></td>
                            <td><span class="badge bg-danger">{{ $rs_value->e_date }}</span></td>
                            <td>{{ $rs_value->d_name }}</td>
                            <td>
                                @if($rs_value->file_path != "")
                                    <a href="{{ route('admin.common.pdf.viewer',Crypt::encrypt('app/'.$rs_value->file_path)) }}" 
                                       class="btn btn-sm btn-outline-danger rounded-pill px-3" target="_blank">
                                       <i class="fa fa-file-pdf"></i> View
                                    </a>
                                @else
                                    <span class="text-muted fst-italic">No File</span>
                                @endif
                            </td>
                            <td class="action-btns">
                                <a type="button" class="btn btn-info btn-sm shadow-sm"
                                   onclick="callPopupLarge(this,'{{ route('admin.projects.form',Crypt::encrypt($rs_value->id)) }}')">
                                   <i class="fa fa-edit"></i> Edit
                                </a>
                                <a type="button" href="{{ route('admin.projects.delete',Crypt::encrypt($rs_value->id)) }}" 
                                   onclick="return confirm('Are you sure you want to delete this item?');" 
                                   class="btn btn-danger btn-sm shadow-sm">
                                   <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</section>
@endsection
@push('scripts')
    
@endpush

