@extends('profile.base')

@section('content.inner')
<!-- <div id="patient"> -->
<div id="patient_view">
	<modal-vitals :patient-id="patient_id" :age="{{ $patient->age }}"></modal-vitals>
	<permission-request :provider="providerInfo" 
		:patient-id="patient_id">
	</permission-request>
	<input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
	<div class="row">
		<div class="col-md-12">
			<a href="" @click="back" class="btn btn-default">
				<i class="fa fa-chevron-left"></i> Back
			</a>
			<div class="patient-header">
				<div class="row">
					<img src="/images/profile-default.png">	
					<h4>{{ $patient->name }}</h4>
					<h5>{{ $patient->address }}</h5>
					<button class="btn btn-primary btn-xs" 
						@click="openPermission">
						Request Permissions
					</button>
					<button class="btn btn-primary btn-xs" 
						@click="openVitals">
						Vitals
					</button>
					<div class="btn-group" role="group">
						<div class="btn-group" role="group">
							<button type="button" 
								class="btn btn-primary btn-xs dropdown-toggle" 
								data-toggle="dropdown" 
								aria-haspopup="true" 
								aria-expanded="false">
								Actions
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a :href="urlify('appointments')">
										 AppointmentList
									</a>
								</li>
								<li>
									<a :href="urlify('informations')">
										Patient Information
									</a>
								</li>
								<li>
									<a :href="urlify('history')" 
										data-toggle="tooltip" 
										data-placement="bottom" 
										title="Coming Soon" 
										@click.prevent.stop="">
										Patient History
									</a>
								</li>
								<li>
									<a :href="urlify('problems')"
										data-toggle="tooltip" 
										data-placement="bottom" 
										title="Coming Soon" 
										@click.prevent.stop="">
										Problems
									</a>
								</li>
								<li>
									<a :href="urlify('medications')">
										Medications
									</a>
								</li>
								<li>
									<a :href="urlify('allergies')">
										Allergies
									</a>
								</li>
								<li>
									<a :href="urlify('laboratories')">
										Laboratory
									</a>
								</li>
								<li>
									<a :href="urlify('flags')">
										Flags
									</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
			<div class="clear"></div>
			<div class="patient-body">
				@if (!$permission)
					<p class="text-muted">Data Unavailable</p>
				@else
					@foreach($permission->permissibles as $permissible)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="text-capitalize">
								{{ proper_case($permissible->permissible_type) }}
							</h5>
						</div>
						
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									@if (!$permissible->permissible()->count())
										<p class="text-muted">No Data Available</p>
									@endif

									@foreach($permissible->permissible as $data)
										<div class="table-responsive">
										@include('profile.patients.templates.'. snake_case(class_basename($permissible->permissible_type)), $data)
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<notifications :speed="200"
        position="left bottom"
        :duration="5000"/>
</div>

<!-- </div> -->
@endsection

@push('scripts')
<script src="/js/patient-view.js"></script>
@endpush
