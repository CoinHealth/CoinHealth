@extends('profile.base')

@section('content.inner')
<div id="patient_flags">
	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category"><span>{{ $patient->name }}</span> Flags</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
			<button type="button" @click="addFlag(true)" class="btn btn-primary pull-right">Add Flag <i class="fa fa-plus"></i></button>
		</div>
	</div>
	<div class="top-content">
		<div class="row flag-container mt-30">
			<div class="col-md-12">
				<add-flag v-on:flagadded="newFlag"></add-flag>
			</div>
			
			<div class="col-md-12">
				<flag @flag-save="save" enabled-buttons="edit.save.cancel.delete" v-for="flag in patient.flags" :key="flag.id" :data="flag"></flag>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-flags.js"></script>
@endpush
