@extends('profile.base')

@section('content.inner')
<div id="patient_appointments">
	<new-appointment-modal @create-appointment="createAppointment" :doctor="doctor" ref="new-appointment-modal"></new-appointment-modal>
	<edit-appointment-modal @update-appointment="updateAppointment" :doctor="doctor" ref="edit-appointment-modal"></edit-appointment-modal>

	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category">{{ $patient->name }} Appointments</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
			<button type="button"
				@click="newAppointment"
				class="btn btn-primary">
				New Appointment <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="top-content">
		<div class="row appointments-container mt-30">
			<div class="col-md-12" v-show="!appointments.length"  v-cloak>
				<div class="alert alert-info alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4>Empty List</h4>
					<p>Would you like to set new Appointment for {{ $patient->name }} ?</p>
					<p>
						<button type="button"
							@click="newAppointment"
							class="btn btn-primary">
							New Appointment <i class="fa fa-plus"></i>
						</button>
					</p>
				</div>
			</div>
            <div class="col-md-12">
				<transition-group name="fade-out">
					<appointment
						@ondeleted="removeAppointment"
						@onedit="editAppointment"
						:key="appointment.id"
						:appointment="appointment"
						v-for="appointment in appointments">
					</appointment>
				</transition-group>
            </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-appointments.js"></script>
@endpush
