@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/american.css">
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
							<p>Frequently asked questions about Health Insurance</p>
						</div>
						<div class="p-title">
							<p>{!! trans('other.disabilities.title') !!}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-market row-2">
				<div class="col-md-offset-5 col-md-7">
					<p>
						{!! trans('other.disabilities.part_1.people') !!}
					</p>
					<p>
						{!! trans('other.disabilities.part_1.considered') !!}
					</p>
					<p>
						{!! trans('other.disabilities.part_1.coverage') !!}
					</p>
					<p>
						{!! trans('other.disabilities.part_1.annual') !!}
					</p>
				</div>
				<div class="row-nav row-nav-1">
					<div class="slider-nav">
					    <a href="/other-topics" class="back"><img src="/assets/icons/back.png" alt=""></a> <!-- <span class="divider">|</span>
					    <a href="javascript:void(0);" class="next">Next</a> -->
					</div>
				</div>
			</div>
			<!-- <div class="row row-market row-3">
				<div class="col-md-offset-5 col-md-7">
					<p>
						Visit these pages to find information on the following topics.
					</p>
					<ul>
						<li>SSDI & Medicare coverage</li>
						<li>SSI Disability & Medicaid coverage</li>
						<li>Waiting for a decision on disability status</li>
						<li>No disability benefits or health coverage</li>
						<li>More information about health care for people with disabilities</li>
						<li>Under the health care law, plans must cover treatment for pre-existing conditions from the first day of coverage. This applies to coverage through private health plans in the Marketplace, Medicaid, and Medicare. Marketplace plans can’t put annual or lifetime limits on your coverage.</li>
					</ul>
				</div>
				<div class="row-nav row-nav-2">
					<div class="slider-nav">
					    <a href="/other-topics" class="back">Back</a>
					</div>
				</div>
			</div> -->

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

	$(".row-nav-3 .next").click(function () {
		$(".row-4").fadeOut();
		$(".row-5").fadeIn();
	});

	$(".row-nav-3 .back").click(function () {
		$(".row-4").fadeOut();
		$(".row-3").fadeIn();
	});

	$(".row-nav-4 .next").click(function () {
		$(".row-5").fadeOut();
		$(".row-6").fadeIn();
	});

	$(".row-nav-4 .back").click(function () {
		$(".row-5").fadeOut();
		$(".row-4").fadeIn();
	});

	// $(".row-nav-2 .back").click(function () {
	// 	$(".row-3").fadeOut();
	// 	$(".row-2").fadeIn();
	// });


</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
