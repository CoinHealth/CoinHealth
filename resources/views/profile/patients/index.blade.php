@extends('profile.base')

@section('content.inner')
<div id="patient">
	{{-- <modal-add-payment v-on:paymentadded="addPayment"></modal-add-payment> --}}

	<modal-add-patient @add="patientAdded"></modal-add-patient>
	<modal-new-appointment></modal-new-appointment>
	<div class="row">
		<div class="col-md-12">
			<span class="category">Patients</span>
			<button type="button"
				data-toggle="modal"
				data-target="#modal-add-patient"
				class="btn btn-primary pull-right">
				Add Patients <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="top-content">
		<div class="row is-flex patients-container mt-30">
            <patient-list
				v-on:opened="closeOther"
            	:key="patient.id"
            	:patient="patient"
            	v-for="patient in patients">
            </patient-list>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patients.js"></script>
@endpush
