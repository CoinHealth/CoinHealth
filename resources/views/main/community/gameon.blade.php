@extends('main.marketplace.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/gameon.css">
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
	<div class="gameon-container">
		<div class="container">
			<div class="row">
				<div class="text-center">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-2 col-md-3 tablet-div">
					<img src="/assets/icons/gameon-tablet.png" class="tablet-game" alt="">
				</div>
				<div class="col-md-7">
					<p class="title">
						Game on
					</p>
					<div class="box-link">
						<div>
							<a href="/auth/login" class="btn-white">Enter</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="desc">Earn points by sharing, Getting involved, Completing tasks and more!</p>
					<div class="link-not">
						<a href="/community" class="not-now">Not now</a>
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