@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/healthcare-providers.css">
{{-- badge --}}
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
<link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
{{-- badge --}}
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
<input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
<input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
<div class="income-container" style="margin-top: 150px;">
	<div class="container">
		<input type="hidden" id="userLog" value="{{ isset($user->id) ? $user->id : '' }}">

		<div class="pull-right">
			<a class="btn btn-primary"  data-toggle="modal" data-target="#pl" role="button" href="">Premium Listing</a>
			<a class="btn btn-primary btn-submit" role="button" href="/careconnect/create-doctor"><i class="fa fa-fw  fa-plus-square" aria-hidden="true"></i> Add Healthcare Provider</a>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h1 class="provider-header">Doctor Search</h1>
			</div>

			<div class="provider-search-container col-md-12">
				<div class="form-group">
					<input type="text" placeholder="Search.." class="form-control scrollable-dropdown-menu" id="provider_input">
				</div>
			</div>
			<div class="selected-provider-container col-md-12">
				<div class="col-md-8">
					<input type="hidden" class="provider-id">
					<input type="hidden" class="totalRatings">
					<h2 class="provider-name"></h2>
					<p class="specialization"></p>
					<p class="address"></p>
					<p class="contact-no"></p>
					<p class="affiliations"></p>
					<a href="/triage" class="btn btn-primary btn-appoint" style="display:none">Set an Appointment</a>
				</div>
				@if( auth()->user() )
				<div class="form-group col-md-4 pull-right rate-div">
					<div class="star-rate stars">
					  <ul>
					    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
					  </ul>
					</div>
					<div class="ratingsButton pull-right">
						<button class="btn btn-primary btn-sm btn-rate"><i class="fa fa-fw  fa-star-o" aria-hidden="true"></i> Rate</button>
						<button class="btn btn-default btn-sm btn-cancel">Cancel</button>
					</div>
					<div class="thank-you-div" align="center">
						<p>Thank you for the ratings!</p>
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="row text-center">
			<div class="back-a">
				<a href="/careconnect"><img src="/assets/icons/back.png" alt=""></a>
			</div>
		</div>

	</div>
	@include('main.partials.badge')
</div>
<form action="/careconnect/create-doctor">
@include('main.careconnect.partials.doctor-pl-modal')
</form>
@include('main.careconnect.partials.thank-you-rate')
@endsection

@section('scripts')
{{-- badge --}}
<script type="text/javascript" src="/assets/js/vendor/badge/confetti.js"></script>
<script type="text/javascript" src="/assets/js/vendor/badge/modernizr.custom.js"></script>
<script type="text/javascript" src="/assets/js/vendor/badge/snap.svg-min.js"></script>
<script type="text/javascript" src="/assets/js/vendor/badge/classie.js"></script>
<script type="text/javascript" src="/assets/js/vendor/badge/dialogFx.js"></script>
<script type="text/javascript" src="/assets/js/badge.js"></script>
<script type="text/javascript">
	badge.init();
</script>
{{-- badge --}}
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src="/assets/js/datum/doctor.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script src="/assets/js/healthcare-providers.js"></script>
<script type="text/javascript">
	sidebar.init();
	providers.init();
</script>
@endsection
