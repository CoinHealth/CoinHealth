@extends('profile.base')

@section('content.inner')
<div id="patient_allergies">

	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category"><span>{{ $patient->name }}</span> Allergies</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
			<button type="button"
				@click.prevent="createAllergy(true)"
				class="btn btn-primary pull-right">
				Add Allergy <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="top-content">
		<div class="row flag-container mt-30">
			<div class="col-md-12">
				<add-allergy v-on:allergyadded="addAllergy"></add-allergy>
			</div>
			<div class="col-md-12">
				<allergy v-for="allergy in patient.allergies" :key="allergy.id" :data="allergy"></allergy>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-allergies.js"></script>
@endpush
