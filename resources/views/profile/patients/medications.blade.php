@extends('profile.base')

@section('content.inner')
<div id="patient_medication">


	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category"><span>{{ $patient->name }}</span> Medications</p>
			<a href="/profile/patients" class="btn btn-default">
				<i class="fa fa-chevron-left"></i> Back
			</a>
			<button type="button"
				@click="menuNew = true"
				class="btn btn-primary pull-right">
				Add Medication <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="top-content">
		<div class="row information-container mt-30">
			<transition name="popup">
				<div class="col-md-12 new-medication-container" 
					v-if="menuNew || !patient.medications.length"
					v-cloak>
					@include('profile.patients.partials.medications.new')
				</div>
			</transition>
			<transition name="popup">
	            <div class="col-md-12 medication-container" v-if="!menuNew">
	                <editable-panel
						v-cloak
						key="medication.id"
						hidden-buttons="delete"
						model="medication"
						v-for="medication in patient.medications"
						@save="save"
						:data="medication">
	                    <span slot="panel-header">
	                        @{{ medication.medication_name }}
	                        <span :class="[medication.active ? 
	                        		'text-success' : 'text-warning']">
	                            <i class="fa fa-circle"></i>
	                        </span>
	                    </span>
	                    @include('profile.patients.partials.medications.info')
	                </editable-panel>
	            </div>
            </transition>
		</div>
	</div>

	<notifications :speed="200"
        position="left bottom"
        :duration="5000"/>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-medications.js"></script>
@endpush
