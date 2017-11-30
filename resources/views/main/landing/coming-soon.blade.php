@extends('main.partials.base')

@section('styles')
	<link rel='stylesheet' href='/assets/css/landing.css' />
	<style>
	html,body, body>div {
		height: 100%;
	}
	</style>
@endsection

@section('content')
<div class="row" style="height: 100%;">
<div class='coming-container col-md-12'>
	<div class='coming-header col-md-12 col-xs-12'>
		<img src="/assets/icons/careparrot-icon-trans.png" class="img-responsive">
	</div>
	<div class='coming-content text-center col-md-12 col-xs-12'>
		<h1>COMING SOON TO A BROWSER NEAR YOU</h1>
		<h4>Unfortunately we're not quite ready yet, but you can see our progress below.</h4>
	</div>

	<div class='col-xs-10 col-md-8 col-md-push-2 col-xs-push-1 coming-progress'>
		<div class='progress-text'>
			<div class="text text-warning text-right" style="width: 75%;">75%</div>
		</div>
		<div class="progress">
			<!-- <div class='progress-text text-warning'>75%</div> -->
			<div class="progress-bar progress-bar-warning" style="width: 75%">
				<span class='sr-only'>75% Complete (warning)</span>
			</div>
		</div>
	</div>
	<div class='coming-form col-md-6 col-md-offset-3 col-xs-12'>
		<form class='' onsubmit="return false;" method="post" action="/coming-email">
			<div class="input-group">
				<input type='text' placeholder='Enter your Email' class='form-control' id="email" />
				<span class="input-group-addon" style="padding: 0 5px;">
	                <button type="button" class='btn-notify btn btn-primary'>Notify Me!</button>
	            </span>
			</div>
		</form>
	</div>
	<div class='coming-text col-xs-12 col-md-12 text-center'>
		<p>Subscribe to find out how CareParrot will empower</p>
		<p>the individual in their health care choices.</p>
	</div>

</div>
</div>
@endsection

@section('scripts')
	<script>
	$(function() {
		$('.btn-notify').on('click' , function() {
			if ($('#email').val())
				$(this).text('Thank you for Subscribing!');
		});
	});
	</script>
@endsection