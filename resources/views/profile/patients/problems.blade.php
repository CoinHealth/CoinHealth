@extends('profile.base')

@section('content.inner')
<div id="patient_problems">
	<div class="row">
		<div class="col-md-12">
            <input type="hidden" id="patient_id" value="{{ $patient->url_id }}">
			<p class="category">{{ $patient->name }} Problems</p>
			<a href="/profile/patients" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back</a>
            <button type="button"
                @click.prevent="addNew = true"
                class="btn btn-primary pull-right">
                Add Problem <i class="fa fa-plus"></i>
            </button>
		</div>
	</div>
	<div class="top-content">
		<div class="row information-container mt-30">
            <div class="col-md-12">
                <add :show="addNew" patient_id="{{ $patient->url_id }}" :med_conditions="{{ $med_conditions }}"></add>
                <edit-list v-for="problem in problems" :key="problems.id" :data="problem" :med_conditions="{{ $med_conditions }}" patient_id="{{ $patient->url_id }}"></edit-list>
            </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/patient-problem.js"></script>
@endpush
