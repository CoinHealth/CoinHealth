@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carecommunity.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	<div class="main-header">
		<div class='main-cp-icon col-xs-12'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>
	@include('main.partials.sidebar')
	<div class="state-container">
		<div class="container-fluid">
			<div class="row">
				<p class="q-title">{!! trans('carecommunity.state-where') !!}</p>
				<div class="centered">
					<form action="" class="state-form">
						<div class="text-center">
							<div class="col-md-3 no-float center">
								<select class="form-control" id="state-select">
								  	<option disabled selected>{!! trans('carecommunity.state-select') !!}</option>
								  	@foreach($locations as $location)
										<option value="{{ $location->state_abbr }}">{{ $location->state_abbr }}</option>
										@endforeach
								</select>
							</div>
							@if(!auth()->check())
							<div class="form-2" id="form-2">
								<p class="q-title">{!! trans('carecommunity.created-account') !!}</p>
								<ul class="ca">
									<li>
										<div class="radio">
										  	<label>
										    	<input type="radio" name="has_account" value="yes" {{ auth()->check() ? 'checked' : ''}}>
										    	Yes
										  	</label>
										</div>
									</li>
									<li>
										<div class="radio">
										  	<label>
										    	<input type="radio" name="has_account" value="no">
										    	No
										  	</label>
										</div>
									</li>
								</ul>
							</div>
							@endif
						</div>
					</form>
				</div>
			</div>
			<div class="row text-center">
				<div class="back-a">
					<a href="/community/category"><img src="/assets/icons/next.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script src="/assets/js/activity.js"></script>
<script type="text/javascript">
	activity.initCommunity();
</script>
<script>
	$('[name="has_account"]').on('change', function() {
		if ($(this).val() == "yes")
			window.location.href = "/auth/login?continue="+window.location.pathname;
		else
			window.location.href = "/auth/register";
	});

	if ($('#form-2').length) {
		$('#state-select').on('change', function() {
			if ($(this).val() == "")
				$('#form-2').hide();
			else
				$('#form-2').fadeIn();
		})
	}

	// var elem = document.getElementById("state-select");
	// elem.onchange = function(){
	//     var hiddenDiv = document.getElementById("form-2");
	//     hiddenDiv.style.display = (this.value == "") ? "none":"block";
	// };
</script>
@endsection
