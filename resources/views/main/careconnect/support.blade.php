@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/support.css">
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class="support-container">
	<div class="container">
		<div class="row facility-row">
			<div class="col-md-offset-7 col-md-5">
				<p class="title">
					<span class="title-span">It always seems impossible, until it is done.</span>
				</p>
				<p class="text">
					Careparrot provides you with excellent resource 
					to assist you in finding support groups in your area. 
					Whether you are seeking support or would like to 
					be part of the solution - you will feel right at home.
				</p>
				<ul>
					<li>Find help for yourself</li>
					<li>Find help for someone else</li>
					<li>Recovery and Support</li>
					<li>Working with a Provider</li>
				</ul>
				<div class="text-center mt-40">
					<a href="/careconnect/support-search" class="btn-blue">Sound good, Let's do it</a>
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
