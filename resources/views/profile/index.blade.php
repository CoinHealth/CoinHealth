@extends('profile.base')
@push('styles')
	<link rel="stylesheet" href="/css/profile.css">
@endpush

@section('content.inner')
<div id="dashboard" v-cloak>
	<div class="row">
		<div class="col-md-12">
			<span class="subcategory mini-sub">
			Details
			</span>
			<span>
				{{-- @if (auth()->user()->role == 2 || auth()->user()->role == 4)
				<button
					disabled
					data-toggle="tooltip"
					title="Under Construction"
					class="btn btn-primary btn-xs">
					<i class="fa fa-pencil"></i> Update
				</button>
				@else --}}
				<a href="javascript:void(0);"
					@click.prevent="editMode = true"
					v-if="!editMode"
					v-cloak
					class="btn btn-primary btn-xs">
					<i class="fa fa-pencil"></i> Update
				</a>
				{{-- @endif --}}

				<a href="javascript:void(0);"
					@click.prevent="save"
					v-if="editMode"
					v-cloak
					class="btn btn-primary btn-xs">
					<i class="fa fa-floppy-o"></i> Save
				</a>
				<a href="javascript:void(0);"
					@click.prevent="editMode = false"
					v-if="editMode"
					v-cloak
					class="btn btn-primary btn-xs">
					<i class="fa fa-ban"></i> Cancel
				</a>
			</span>

		</div>
	</div>
	<div class="top-content" v-cloak id="settings">
		@include('profile.partials.settings')
	</div>

	<div class="signature-container" id="signature">
		<div class="row mt-10">
		    <div class="col-md-12">
		        <span class="subcategory">Signature</span>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">

				<signature v-if="!signature" 
					@save="saveSignature">
				</signature>

				<img v-else :src="signature.path" alt="">
		    </div>
		</div>

	</div>

	<p class="agreement" id="agreement">
		<i class="fa fa-check-circle-o color-blue" aria-hidden="true"></i> 
		You have agreed <a href="javascript:void(0);">Terms and Conditions</a>
	</p>

	<div class="bottom-content" id="activities">

		<div class="row" id="activities">
			<activity></activity>
		</div>
	</div>

	<notifications :speed="200"
        position="left bottom"
        :duration="5000"/>
</div>

@include('profile.modals.manage')
<!-- @include('profile.modals.appointment') -->
@endsection

@push('scripts')
    <script src="/js/dashboard.js"></script>
    <!-- <script src="/js/doctor-activity.js"></script> -->
@endpush
