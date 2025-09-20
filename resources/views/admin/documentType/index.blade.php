@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Document Type</h1>
    <ol class="breadcrumb">
        <li>
            <a type="button" class="btn btn-info btn-sm pull-right"  onclick="callPopupLarge(this,'{{ route('admin.document.type.edit', Crypt::encrypt(0)) }}')">Add Document Type</a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <fieldset class="fieldset_border">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="example">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr. No.</th>                
                                        <th>Document Type Name</th>
                                        <th>Document Type Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sr_no = 1;
                                    @endphp
                                    @foreach($rs_records as $document)
                                    <tr>
                                        <td>{{ $sr_no++ }}</td>
                                        <td>{{ $document->code }}</td>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-sm"onclick="callPopupLarge(this,'{{ route('admin.document.type.edit',Crypt::encrypt($document->id)) }}')"><i class="fa fa-edit"></i> Edit</a>
                                            <a type="button" href="{{ route('admin.document.type.delete',Crypt::encrypt($document->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                                        </td>

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

@endpush
