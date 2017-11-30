@extends('main.quotes.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/quote.css">
<!-- <link rel="stylesheet" href="/assets/css/quote-new.css"> -->
<link rel="stylesheet" href="/assets/css/vendor/select2/select2.min.css">
@endsection

@section('content.inner')

<div class="row wrapper">
	@include('main.quotes.partials.steps')
	<div class='quote-sub-header'>
		@include('main.quotes.partials.subsidy')
		@include('main.quotes.partials.plan-chosen')
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-12 text-center quote-step-container" style="padding:30px 50px 10px;">
				<form method="post" action="/quotes/create">
					<input type='hidden' name='_token' value='{{ csrf_token() }}' />
					<div id="step1" class="active col-md-12 stepwiz">
						@include('main.quotes.step1')
					</div>
					<div id="step2" class="col-md-12 stepwiz">
						@include('main.quotes.step2')
					</div>
					<div id="step3" class="col-md-12 stepwiz">
						@include('main.quotes.step3')
					</div>
					<div id="step4" class="col-md-12 stepwiz">
						@include('main.quotes.step4')
					</div>
					<div id="step5" class="col-md-12 stepwiz">
						@include('main.quotes.step5')
					</div>
					<div id="step6" class="col-md-12 stepwiz">
						@include('main.quotes.step6')
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>
@include('main.quotes.partials.disclaimer')
<div class="modal fade" id="modal-plan" data-backdrop='static' data-keyboard='false' role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">       
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4>Compare Plans</h4>
			</div>
			<div class="modal-body">
				<div class="row">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<div class='hidden' id="template-plan-chosen">
	<div data-bg='' data-plan='' class="text-center col-md-12 col-xs-12 plan-chosen-template">
		<p class='plan-chosen-label'>Plan Chosen</p>
		<div class='col-md-10 col-xs-12 col-xs-md-offset-1 col-md-offset-1'>
			<div class='plan-chosen-specs'>
				<div class='assistance'>
					$300<br>
					Monthly Assistance
				</div>
			</div>
			<div class='plan-chosen-specs'>
				<div class='insurer'>
					<img class='img-responsive' src='/assets/icons/insurer1.png'/>
				</div>
			</div>
			<div class='plan-chosen-specs'>
				<div class='portion'>
					$33<br>
					Your Portion
				</div>
			</div>
			<div class='plan-chosen-specs'>
				<div class='star'>
					A+<br>
					<span class='stars'>
						<i class='fa fa-star'></i>
						<i class='fa fa-star'></i>
						<i class='fa fa-star'></i>
						<i class='fa fa-star'></i>
						<i class='fa fa-star'></i>
					</span>
				</div>
			</div>
			<div class='plan-chosen-specs'>
				<div class='eligible'>
					<h4>Eligible <i class='fa fa-check'></i></h4>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<button type='button' class='btn-xs btn btn-success plan-enroll'>Enroll</button>
		</div>
	</div> 	
</div>


@endsection

@section('scripts')
<script src="/assets/js/quote.js"></script>
<!-- <script src="/assets/js/quote-new.js"></script> -->
<script src="/assets/js/vendor/select2/select2.min.js"></script>
<script>
	$(function() {
		quote.init();
	});
</script>
@endsection