@extends('main.quote-engine.base')
@section('styles')
<link rel="stylesheet" type="text/css" href="/assets/css/quote-new.css">
<link rel="stylesheet" type="text/css" href="/assets/css/quote-responsive.css">

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css"> -->
@endsection

@section('content.inner')
<div class="row wrapper">
	@include('main.quote-engine.partials.steps')
	<div class="quote-step-container">
	<form action="/quote-engine/create" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_zip_code" value="{{ Input::get('zip_code') }}">		
		<div id="step1" class="col-md-12 stepwiz">
			@include('main.quote-engine.step1')
		</div>
		<div id="step2" class="col-md-12 stepwiz">
			@include('main.quote-engine.step2')
		</div>
		<div id="step3" class="col-md-12 stepwiz">
			@include('main.quote-engine.step3')
		</div>
		<div id="step4" class="col-md-12 stepwiz">
			@include('main.quote-engine.step4')
		</div>
		<div id="step5" class="col-md-12 stepwiz">
			@include('main.quote-engine.step5')
		</div>
		<div id="step6" class="col-md-12 stepwiz">
			@include('main.quote-engine.step6')
		</div>
		<div id="step7" class="col-md-12 stepwiz">
			@include('main.quote-engine.step7')
		</div>
		<div id="step8" class="col-md-12 stepwiz">
			@include('main.quote-engine.step8')
		</div>
		<div id="step9" class="col-md-12 stepwiz">
			@include('main.quote-engine.step9')
		</div>
		<div id="step10" class="col-md-12 stepwiz">
			@include('main.quote-engine.step10')
		</div>
		<div id="step11" class="col-md-12 stepwiz">
			@include('main.quote-engine.step11')
		</div>
	</form>
	</div>
</div>
@endsection

@section('scripts')
<!-- <script src="https://maps.google.com/maps/api/js?sensor=false"></script> -->
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src="/assets/js/vendor/historyjs/history.adapter.jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> -->
<script src="/assets/js/datum/doctor.js"></script>
<script src='/assets/js/quote-new.js'></script>
<script src='/assets/js/calculate_income.js'></script>
<script>
$(function() {
	quote.init();
	income.init();
});

</script>
@endsection