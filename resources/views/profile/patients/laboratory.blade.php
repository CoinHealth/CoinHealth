@extends('profile.base')

@section('content.inner')
<div id="patient_laboratory">
	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category">{{ $patient->name }} Laboratory</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
            <button type="button"
                @click.prevent="addNew = true"
                class="btn btn-primary pull-right">
                Add Lab Result <i class="fa fa-plus"></i>
            </button>
		</div>
	</div>
	<div class="top-content">
		<div class="row information-container mt-30">
            <div class="col-md-12">
                <add :show="addNew" :states="{{ $states }}" patient_id="{{ $patient->url_id }}"></add>
                <edit-list v-for="laboratory in laboratories" :key="laboratory.id" :data="laboratory" :states="{{ $states }}" patient_id="{{ $patient->url_id }}" :lab_procedures="{{ $procedures }}"></edit-list>
            </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-laboratory.js"></script>
@endpush
