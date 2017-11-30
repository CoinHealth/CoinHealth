@extends('profile.base')

@section('content.inner')
<div id="patient_information">

	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category">{{ $patient->name }} Information</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
		</div>
	</div>
	<div class="top-content">
		<div class="row information-container mt-30">
            <div class="col-md-12">
                <editable-panel :data="data.backgroundData" v-cloak model="background-data"  @save:background-data="saveBackgroundData($event, 'background-data')" >
                <!-- hidden-buttons="edit.save.cancel" -->
                    <span slot="panel-header">Background Information</span>
                    @include('profile.patients.partials.information.background')
                </editable-panel>

				<editable-panel :data="data.contactInfo" v-cloak  model="contact-info" @save:contact-info="save($event, 'contact-info')" >
                <!-- hidden-buttons="edit.save.cancel" -->
                    <span slot="panel-header">Contact Information</span>
                    @include('profile.patients.partials.information.contact')
                </editable-panel>

				<h3 v-if="data.insurances.length">Insurance</h3>
				<editable-panel key="index" v-for="(insurance, index) in data.insurances" v-cloak model="insurance" >
                <!-- hidden-buttons="edit.save.cancel" -->
                    <span slot="panel-header">Contact Information</span>
                    @include('profile.patients.partials.information.insurance')
                </editable-panel>
            </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-information.js"></script>
@endpush
