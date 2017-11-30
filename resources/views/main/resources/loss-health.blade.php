@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/resources.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="loss-health-container">
		<div class="container">
			<div class="row">
				<div class="cp-logo">
					<img src="/assets/icons/careparrot-small.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="loss-title">
					<div class="col-md-12">
						<div class="p-subtitle">
							<p>Changes that qualify for a Special Enrollment Period</p>
						</div>
						<div class="p-title">
							<p>Loss of Health Coverage</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row btn-row">
				<div class="btn-div-loss">
					<div class="btn-loss btn-loss-1">
						<a href="javascript:void(0);" class="a-loss-1">Losing job-based coverage ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-2">
						<a href="javascript:void(0);" class="a-loss-2">Losing individual health coverage for a plan or policy you bought yourself ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-3">
						<a href="javascript:void(0);" class="a-loss-3">Losing eligibility for Medicaid or CHIP ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-4">
						<a href="javascript:void(0);" class="a-loss-4">Losing eligibility for Medicare ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="btn-loss btn-loss-5">
						<a href="javascript:void(0);" class="a-loss-5">Losing coverage through a family member ></a><a href="javascript:void(0);" class="btn-close">x</a>
					</div>
					<div class="back-a">
						<a href="/askparrot">< Back</a>
					</div>

				</div>
			</div>
			<div class="row btn-row-2">
				<div class="col-md-offset-6 col-md-6">
					<div class="btn-div-loss">
						<div class="btn-loss btn-loss-1">
							<a href="javascript:void(0);" class="a-loss-1">Losing job-based coverage ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-2">
							<a href="javascript:void(0);" class="a-loss-2">Losing individual health coverage for a plan or policy you bought yourself ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-3">
							<a href="javascript:void(0);" class="a-loss-3">Losing eligibility for Medicaid or CHIP ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-4">
							<a href="javascript:void(0);" class="a-loss-4">Losing eligibility for Medicare ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="btn-loss btn-loss-5">
							<a href="javascript:void(0);" class="a-loss-5">Losing coverage through a family member ></a><a href="javascript:void(0);" class="btn-close">x</a>
						</div>
						<div class="back-a">
							<a href="/askparrot">< Back</a>
						</div>
						
					</div>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-1">
				<div class="col-md-offset-4 col-md-8">
					<ul>
						<li>Employer stops offering coverage</li>
						<li>Left Job by choice or we’re fired</li>
						<li>Reduction in work hours</li>
						<li>COBRA coverage runs out</li>
					</ul>
					<p>
						<span>Note:</span> If you drop coverage or if you lose coverage because you didn’t pay your premiums, or if you lose Marketplace coverage because you didn’t provide sufficient documentation for the Marketplace to resolve a data-matching issue-does not allow you to qualify for a Special Enrollment Period.
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-2">
				<div class="col-md-offset-4 col-md-8">
					<ul>
						<li>Individual plan or your Marketplace plan no longer exists</li>
						<li>Lose eligibility for a student health plan</li>
						<li>Lose eligibility for a plan because you no longer live in the plan’s service area</li>
						<li>Individual or group health plan coverage year is ending in the middle of the calendar year and you choose not to renew it</li>
					</ul>
					<p>
						<span>Note:</span> If you drop coverage or if you lose coverage because you didn’t pay your premiums, or if you lose Marketplace coverage because you didn’t provide sufficient documentation for the Marketplace to resolve a data-matching issue-does not allow you to qualify for a Special Enrollment Period.
					</p>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-3">
				<div class="col-md-offset-4 col-md-8">
					<ul>
						<li>Change in household income that makes you ineligible for Medicaid</li>
						<li>Become ineligible for pregnancy-related or medically needy Medicaid</li>
						<li>You lose health coverage through a spouse due to a divorce or legal separation</li>
						<li>Your child ages off CHIP</li>
					</ul>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-4">
				<div class="col-md-offset-4 col-md-8">
					<p class="p-loss">
						You <span>may</span> qualify for a Special Enrollment Period if you become no longer eligible for premium-free Medicare Part A.
					</p>
					<p class="p-loss">
						You <span>don’t</span> qualify for a Special Enrollment Period if:
					</p>
					<ul>
						<li>You’ve reached the maximum dependent age allowed in your state</li>
						<li>You lose job-based health coverage through a family member’s employer</li>
						<li>You lose health coverage through a spouse due to a divorce or legal separation</li>
						<li>Death of a family member</li>
					</ul>
				</div>
			</div>
			<div class="row btn-row-loss btn-row-loss-5">
				<div class="col-md-offset-4 col-md-8">
					<ul>
						<li>You’ve reached the maximum dependent age allowed in your state</li>
						<li>You lose job-based health coverage through a family member’s employer</li>
						<li>You lose health coverage through a spouse due to a divorce or legal separation</li>
						<li>Death of a family member</li>
					</ul>
					<p>
						<span>Note:</span> Losing coverage you have as a dependent doesn’t allow you to qualify for a 
						Special Enrollment Period if you voluntarily drop the coverage or you or your family 
						member lose coverage due to non-payment.
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(".a-loss-5").click(function () {
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-5").fadeIn();
		$(".btn-loss-5 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-4").click(function () {
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-4").fadeIn();
		$(".btn-loss-4 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-3").click(function () {
		$(".loss-health-container").attr({

			'style': "background-size: cover;background: url('/assets/icons/kid.jpg')",
		});

		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-3").fadeIn();
		$(".btn-loss-3 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
		
	});

	$(".a-loss-2").click(function () {
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-1").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-2").fadeIn();
		$(".btn-loss-2 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".a-loss-1").click(function () {
		$(".btn-loss-5").fadeOut();
		$(".btn-loss-4").fadeOut();
		$(".btn-loss-3").fadeOut();
		$(".btn-loss-2").fadeOut();
		$(".back-a").fadeOut();
		$(".btn-row-loss-1").fadeIn();
		$(".btn-loss-1 .btn-close").fadeIn();
		$(this).addClass("bg-yellow");
	});

	$(".btn-loss-5 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-5").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-5").removeClass("bg-yellow");
	});

	$(".btn-loss-4 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-4").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-4").removeClass("bg-yellow");
	});

	$(".btn-loss-3 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-3").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-3").removeClass("bg-yellow");
		$(".loss-health-container").attr({

			'style': "background-size: cover;background: url('/assets/icons/loss-health.jpg')",
		});
	});

	$(".btn-loss-2 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-2").fadeOut();
		$(".btn-loss-1").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-2").removeClass("bg-yellow");
	});

	$(".btn-loss-1 .btn-close").click(function () {
		$(this).fadeOut();
		$(".btn-row-loss-1").fadeOut();
		$(".btn-loss-2").fadeIn();
		$(".btn-loss-3").fadeIn();
		$(".btn-loss-4").fadeIn();
		$(".btn-loss-5").fadeIn();
		$(".back-a").fadeIn();
		$(".a-loss-1").removeClass("bg-yellow");
	});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
