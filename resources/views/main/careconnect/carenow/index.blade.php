@extends('main.careconnect.carenow.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carenow/lobby.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="row">
		<div class="lobby-container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left">
							<a href="/careconnect" class="home-back">
								<i class="fa fa-home fa-lg" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-md-offset-1">
						<p class="title">
							Hello there.<br>
							How can we help you?
						</p>

						<div class="row row-btn-blue">
							<div class="col-md-4">
								<a href="/triage" class="btn-blue">SEARCH</a>
							</div>
							<div class="col-md-4">
								<a href="/concierge" class="btn-blue">CONCIERGE</a>
							</div>
							<div class="col-md-4">
								<a href="/shop" class="btn-blue">SHOP</a>
							</div>
						</div>
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
