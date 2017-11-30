@extends('profile.base')
@section('content.inner')
<div id="profile">
	<div class="row">
		<div class="col-md-12">
			<p class="category">Appointments</p>
		</div>
	</div>
	<div class="top-content">
		<div class="row">
			@if(count($appointments) > 0)
				@foreach($appointments as $appointment)

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="pull-right buttons">
								<div class="btn-group">
							        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							          <span class="caret"></span>
							        </a>
							        <ul class="dropdown-menu">
							          <li><a href="/profile/patients/{{ $appointment->patient->url_id }}">View Patient</a></li>
							          <li><a href="#" data-toggle="modal" data-target="#modal-update-appointment" class="openStatus" data-id="{{ $appointment->id }}">Change Status</a></li>
							        </ul>
							    </div>
							</div> 
							<h3 class="panel-title">{{ date('F d, Y h:i a', strtotime($appointment->scheduled_on))  }}</h3>
						</div> 
						<div class="panel-body"><!---->
							<ul class="list-unstyled">
								<li><span>Patient: {{ $appointment->patient->name }}</span><span></span> </li> 
								<li><span>Reason for Visit: </span><span>{{ $appointment->reason }}</span> </li>
								<li><span>Gender: </span><span>{{ $appointment->patient->gender }}</span> </li>
								<li><span>Email: </span><span>{{ $appointment->patient->email }}</span> </li>
								<li><span>Date of Birth: </span><span>{{ date('F d, Y', strtotime($appointment->patient->dob)) }}</span> </li>
								<!-- <li><span>Contact: </span><span>{{ $appointment->phone }}</span> </li>  -->
								<li><span>Status: </span><span>{{ $appointment->appointment_status }}</span> </li> 
							</ul>
						</div>
					</div>
				
				@endforeach
			@else
				No appointment to show.
			@endif
			
		</div>
	</div>
</div>
@include('profile.appointments.partials.modal-status')
@endsection

@push('scripts')
	<script src="/js/appointments.js"></script>
@endpush
