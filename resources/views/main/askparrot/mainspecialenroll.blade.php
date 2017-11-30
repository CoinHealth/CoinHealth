@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/specialenroll.css">
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
	<div class="mainspecial-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<p class="title">
						{!! trans('askparrot.special_enrollment') !!}
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<div class="button-container">
						<div class="col-md-6">
							<a href="/find-plans" class="btn-yes">{!! trans('askparrot.yes') !!}</a>
						</div>
						<div class="col-md-6 btn-row-grey">
							<a href="/resource-center/residence" class="btn-grey">{!! trans('askparrot.not_sure') !!}</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row apply-row">
				<div class="apply-container">
					<a href="/find-plans" class="btn-grey">{!! trans('askparrot.apply_now') !!}</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<img src="/assets/icons/special-quote.png" class="quote" alt="">
				</div>
			</div>
			<div class="div-back">
				<a href="/askparrot" class="btn-back"><img src="/assets/icons/back.png" alt=""></a>
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
