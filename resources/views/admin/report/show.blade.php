<div class="col-lg-12">
	<fieldset class="fieldset_border">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dataTable_id">
				<thead class="thead-dark">
					<tr>
						<th>Sr.No.</th>
						<th>Name</th>
						<th>Mobile No.</th>
						<th>Email Id</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Date Time</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@php
					$srno = 1;
				@endphp
				<tbody>
					@foreach ($rs_result as $rs_result_val)
						<tr style="{{ $rs_result_val->status==1?'background-color: #28a745!important':'' }}">
							<td>{{$srno++}}</td>
							<td>{{$rs_result_val->name}}</td>
							<td>{{$rs_result_val->mobile_no}}</td>
							<td>{{$rs_result_val->email_id}}</td>
							<td>{{$rs_result_val->subject}}</td>
							<td>{{$rs_result_val->message}}</td>
							<td>{{date('d-M-Y', strtotime($rs_result_val->date_time))}}</td>
							<td>{{$rs_result_val->status==1?'Resolved':'Pending'}}</td>
							<td>
								@if ($rs_result_val->status!=1)
									
									<a type="button" href="{{ route('admin.report.status',Crypt::encrypt($rs_result_val->id)) }}" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to Resolves this Record?');">Resolved</a>
								@endif
							</td>
						</tr>	
					@endforeach
				</tbody>
			</table>
		</div>
	</fieldset>
</div>