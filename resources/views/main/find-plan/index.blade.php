@extends('main.find-plan.base')
@section('styles')
<link rel="stylesheet" type="text/css" href="/assets/css/quote-new.css">
<link rel="stylesheet" href="/assets/css/plans.css">
<link rel="stylesheet" type="text/css" href="/assets/css/quote-responsive.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-datepicker3.standalone.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/jquery-bar-rating/bootstrap-heart.css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection


@section('content.inner')
@include('main.find-plan.partials.plan-compare')
@include('main.find-plan.partials.plan-details')
<div class="row wrapper">
	@include('main.find-plan.partials.steps')
	<div class="quote-step-container">
		<form action="/find-plans/create" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" value="{{ $open_enrollment_period->is_open_enrollment }}" id="is_open_enrollment">
			<!-- titles -->
			<input type="hidden" value='{!! trans("quote.title1") !!}' id="title1">
			<input type="hidden" value='{!! trans("quote.title2") !!}' id="title2">
			<input type="hidden" value='{!! trans("quote.title3") !!}' id="title3">
			<input type="hidden" value='{!! trans("quote.title4") !!}' id="title4">
			<input type="hidden" value='{!! trans("quote.title5") !!}' id="title5">
			<input type="hidden" value='{!! trans("quote.title6") !!}' id="title6">
			<input type="hidden" value='{!! trans("quote.my_savings") !!}' id="my_savings">
			<div id="step0" class="stepwiz col-md-12">
				@include('main.find-plan.step0')
			</div>
			<div id="step1" class="stepwiz col-md-12">
				@include('main.find-plan.step1')
			</div>
			<div id="step2" class="stepwiz col-md-12">
				@include('main.find-plan.step2')
			</div>
			<div id="step3" class="stepwiz col-md-12">
				@include('main.find-plan.step3')
			</div>
			<div id="step4" class="stepwiz col-md-12">
				@include('main.find-plan.step4')
			</div>
			<div id="step5" class="stepwiz col-md-12">
				@include('main.find-plan.step5')
			</div>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script>
var uid = (function(){var id=0;return function(){if(arguments[0]===0)id=0;return id++;}})();
</script>
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src='/assets/js/defiant.min.js'></script>
<script src="/assets/js/vendor/historyjs/history.adapter.jquery.min.js"></script>
<script src='http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js'></script>
<script src="/assets/js/datum/doctor.js"></script>
<script src="/assets/js/datum/locations.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script src="/assets/js/vendor/select2/select2.js"></script>
<script src="/assets/js/vendor/jquery.date-dropdowns.min.js"></script>
<script src="/assets/js/vendor/jquery.barrating.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
{{--
<script src="/assets/js/vendor/jquery.mixitup.min.js"></script>
--}}
<!-- <script src='/assets/js/quote-new.js'></script> -->
<!-- <script src="/assets/js/quote-engine.js"></script> -->
<script src='/assets/js/plans.js'></script>
<!-- <script src="/assets/js/vendor/typeahead/bootstrap.typeahead.min.js"></script> -->
<script src='/assets/js/calculate_income.js'></script>
<script>
	// alert(false);
	$(function() {
		income.init();
		plan.init();
	});
</script>	
<!-- <script type="text/javascript">
	var headertext = [];
	var headers = document.querySelectorAll("thead");
	var tablebody = document.querySelectorAll("tbody");
	for (var i = 0; i < headers.length; i++) {
		headertext[i]=[];
		for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
		  var current = headrow;
		  headertext[i].push(current.textContent);
		  }
	} 
	console.log(headertext);
	for (var h = 0, tbody; tbody = tablebody[h]; h++) {
		for (var i = 0, row; row = tbody.rows[i]; i++) {
		  for (var j = 0, col; col = row.cells[j]; j++) {
		    col.setAttribute("data-th", headertext[h][j]);
		  } 
		}
	}
</script> -->
@endsection
