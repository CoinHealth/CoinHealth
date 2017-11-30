@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/history.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')



	<div class="row notes">
		<div class="container">
			<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
			<div class="box">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<p class="mini-title">PHYSICIAN NOTES</p>
							<p class="title">MEDICAL HISTORY</p>
						</div>
						<p class="content">
							Let’s begin by collecting your medical history. We want to be as accurate as possible, so feel free to hit that add additional information button at the end to include more details.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<p class="question">I was first diagnosed asthma <span class="color-blue">4 months</span> ago.</p>

			<div class="row">
				<div class="col-md-12">
					<div class="box-selector">
						<div class="div-slider">
							<div class="row">
								<div class="col-md-12">
									<div class="text-center">
										<span class="range-slider__value">0</span> <span class="range-month">months</span>
									</div>
								</div>
							</div>
							<div class="row row-range">
								<div class="col-md-10">
									<div class="range-slider">
										  <input class="range-slider__range" type="range" value="0" min="0" max="500">
									</div>
								</div>
								<div class="col-md-2">
									<a href="" class="cal-btn-yellow">Month</a>
									<a href="" class="cal-btn-dark">Year</a>
								</div>
							</div>
						</div>

						<div class="clear"></div>

						<div class="div-none">
							<div class="row">
								<div class="col-md-12">
									<div class="pull-right ns">
										<a href="">
											<i class="fa fa-minus-circle" aria-hidden="true"></i> <span>Not sure</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="continue">
						<a href="" class="btn-yellow">
							CONTINUE
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript" src="/assets/js/rangeslider.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
