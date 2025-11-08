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
       onclick="callPopupLarge(this,'{{ route('admin.properties.form', Crypt::encrypt(0)) }}')">
        <i class="fa fa-plus"></i> Add Property
    </a>
    <h1 class="h3 text-primary"><i class="fa fa-file-alt"></i>Property</h1>
</section>

<section class="content">
    <div class="box shadow-lg border-0 rounded-4">
        <div class="box-body">
            <table class="table table-bordered text-center" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Base Price</th>
                        <th>Market Price</th>
                        <th>City</th>
                        <th>Auction Start</th>
                        <th>Auction End</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($rs_records as $r)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $r->title }}</td>
                        <td>{{ $r->type_name }}</td>
                        <td>{{ $r->status_name }}</td>
                        <td>{{ number_format($r->base_price, 2) }}</td>
                        <td>{{ number_format($r->market_price, 2) }}</td>
                        <td>{{ $r->city_name }}</td>
                        <td>{{ $r->auction_start_datetime }}</td>
                        <td>{{ $r->auction_end_datetime }}</td>
                        <td>
                            @if($r->latitude && $r->longitude)
                               <a href="https://www.google.com/maps?q={{ $r->latitude }},{{ $r->longitude }}" target="_blank" class="btn btn-sm btn-outline-primary">Map</a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        
                        <td class="action-btns">
                             <a type="button" class="btn btn-info btn-sm shadow-sm"
                                   onclick="callPopupLarge(this,'{{ route('admin.image.form',Crypt::encrypt($r->id)) }}')">
                                   <i class="fa fa-upload"></i> Attach
                                </a>
                            <a  class="btn btn-info btn-sm shadow-sm"
                               onclick="callPopupLarge(this,'{{ route('admin.properties.form',Crypt::encrypt($r->id)) }}')">
                               <i class="fa fa-edit"></i> Edit
                            </a>
                            <a  href="{{ route('admin.properties.delete',Crypt::encrypt($r->id)) }}" 
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
</section>
@endsection
