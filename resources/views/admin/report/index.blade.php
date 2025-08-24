@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>School Details</h1>
</section>  
<section class="content">
    <div class="box"> 
        <div class="box-body">
            <form action="{{ route('admin.report.show') }}" method="post" class="add_form" no-reset="true" success-content-id="result_table">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group  col-lg-4">
                    <label>From Date</label>
                    <input type="date" name="from_date" class="form-control" value="{{date('Y-m-d')}}"> 
                </div>
                <div class="form-group  col-lg-4">
                    <label>To Date</label>
                    <input type="date" name="to_date" class="form-control" value="{{date('Y-m-d')}}"> 
                </div>
                <div class="form-group  col-lg-4" style="margin-top:24px;">
                    <input type="submit" class="form-control btn btn-success" value="Show"> 
                </div>
            </div>
            </form> 
        </div>
    </div>
    <div class="box"> 
        <div class="box-body">
            <div class="row" id="result_table"></div>
        </div>
    </div>
</section>
@endsection
