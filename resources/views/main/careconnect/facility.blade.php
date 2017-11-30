@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/facility.css">
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class="facility-container">
	<div class="container">
		<div class="row facility-row">
			<div class="col-md-offset-7 col-md-5">
				<p class="title">
					<span class="fa-stack color-red fa-2x">
					  	<i class="fa fa-circle-o fa-stack-2x"></i>
					  	<i class="fa fa-plus fa-stack-1x"></i>
					</span>
					<span class="title-span">Facility Finder</span>
				</p>
				<p class="text">
					From small clinics, doctor's offices to urgent care 
					centers and large hospitals, we make sure that 
					you are presented with the most extensive list of 
					providers across the country.
				</p>
				<div class="text-center mt-40">
					<a href="/careconnect/facility-search" class="btn-blue">Sound good, Let's do it</a>
					<a href="/" class="not-now">Not now</a>
				</div>
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
@endsection
