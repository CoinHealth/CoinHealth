@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/marketplace.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	<div class="main-header row">
		<div class='main-cp-icon col-xs-12'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>

	@include('main.partials.sidebar')
	<div class="loss-health-container">
		<div class="container">
			<div class="row">
				
			</div>
			<div class="row">
				<div class="loss-title">
					<div class="col-md-12">
						<div class="p-subtitle">
							<p>{!! trans('askparrot.p_subtitle') !!}</p>
						</div>
						<div class="p-title">
							<p>{!! trans('askparrot.p_title') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-market row-2">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('askparrot.sentence_1') !!}
					</p>
					<p>
						{!! trans('askparrot.sentence_2') !!}
					</p>
					<p>
						{!! trans('askparrot.sentence_3') !!}
					</p>
				</div>
				<div class="row-nav row-nav-1">
					<div class="slider-nav">
					    <a href="/askparrot" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-3">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('askparrot.pay') !!}
					</p>
					<ul>
						<li>
							<p>
								{!! trans('askparrot.premium') !!}
							</p>
						</li>
						<li>
							<p>
								{!! trans('askparrot.save') !!}
							</p>
						</li>
					</ul>
					<p>
						{!! trans('askparrot.offered') !!}
					</p>
					<ul>
						<li>
							<p>{!! trans('askparrot.essential') !!}</p>
						</li>
						<li>
							<p>{!! trans('askparrot.condition') !!}</p>
						</li>
						<li>
							<p>{!! trans('askparrot.care') !!}</p>
						</li>
						<li>
							<p>{!! trans('askparrot.dental') !!}</p>
						</li>
					</ul>
				</div>
				<div class="row-nav row-nav-2">
					<div class="slider-nav">
					    <a href="javascript:void(0);" class="back"><img src="/assets/icons/back.png" alt=""></a> <a href="javascript:void(0);" class="next"><img src="/assets/icons/next.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row row-market row-4">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('askparrot.free') !!}
					</p>
					<p>
						{!! trans('askparrot.states') !!}
					</p>
					<p>
						{!! trans('askparrot.children') !!}
					</p>
				</div>
				<div class="row-nav row-nav-3">
					<div class="slider-nav">
					    <a href="/askparrot" class="back"><img src="/assets/icons/back.png" alt=""></a>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(".row-nav-1 .next").click(function () {
		$(".row-2").fadeOut();
		$(".row-3").fadeIn();
	});

	$(".row-nav-2 .next").click(function () {
		$(".row-3").fadeOut();
		$(".row-4").fadeIn();
	});

	$(".row-nav-2 .back").click(function () {
		$(".row-3").fadeOut();
		$(".row-2").fadeIn();
	});


</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
