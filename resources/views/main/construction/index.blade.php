@extends('main.construction.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/construction.css">
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

	<div class="underconstruction-container">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="text-center first-col">
						<img src="/assets/icons/careparrot-small.png" alt="">
						<p>
							Pardon our dust. This page is under construction.
						</p>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<button type="button" class="btn btn-warning form-control">Notify me when you guys are done!</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-center second-col">
						<img src="/assets/icons/carp.png" alt="">
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