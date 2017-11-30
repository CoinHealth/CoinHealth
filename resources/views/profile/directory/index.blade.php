@extends('profile.base')
@section('content.inner')
<div id="profile">
	<div class="row">
		<div class="col-md-12">
			<p class="category">Directory</p>
		</div>
	</div>
	<div class="top-content">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered datatable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($directories as $directory)
							@if($directory->saveable_type == 'App\Models\Provider')
								<tr>
									<td>{{ $directory->saveable->name }}</td>
									<td>{{ $directory->saveable->type }}</td>
									<td>
									@if($directory->saveable->is_ehr_subscribed)
										<button type="button"
											class="btn btn-xs btn-primary btnSetAppointment"
											data-toggle="modal"
											data-target="#modal-set-appointment"
											data-provider-id="{{ $directory->saveable->provider_id }}">
											SET APPOINTMENT
										</button>
									@endif
									</td>
								</tr>
							@elseif($directory->saveable_type == 'App\Models\Medication')
								<tr>
									<td>{{ $directory->generic_name }}</td>
									<td>Medication</td>
									<td>
										<button type="button"
											class="btn btn-xs btn-primary"
											data-toggle="modal"
											data-target="#modal-set-appointment">
											BUY MEDICATION
										</button>
									</td>
								</tr>
							@elseif($directory->saveable_type == 'App\Models\Agent')
								<tr>
									<td>{{ $directory->name }}</td>
									<td>Agent</td>
									<td>
										<button type="button"
											class="btn btn-xs btn-primary" 
											data-toggle="modal"
											data-target="">
											MESSAGE
										</button>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>

				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
@include('profile.directory.modal.modal-appointment')
@endsection

@push('scripts')
	<script src="/js/patient-directory.js"></script>
@endpush
