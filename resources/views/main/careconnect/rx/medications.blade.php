@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/medication.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="clear"></div>

	<a href="" class="first-a">
		<div class="first-row row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/med1.png" class="img-med" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<p class="title">
						Azitec 500mg 
					</p>
					<p class="subtitle">
						Azithtromycin
					</p>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="second-a">
		<div class="second-row row">
			<div class="col-md-6">
				<div class="text-center">
					<p class="title-dark">
						Xanax 2mg
					</p>
					<p class="subtitle-dark">
						Alprazolam
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/med2.png" class="img-med" alt="">
				</div>
			</div>
		</div>
	</a>

	<a href="" class="third-a">
		<div class="third-row row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/med3.png" class="img-med" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<p class="title">
						Atorvastatin
					</p>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="fourth-a">
		<div class="fourth-row row">
			<div class="col-md-6">
				<div class="text-center">
					<p class="title-dark">
						Clindamycin
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/med4.png" class="img-med" alt="">
				</div>
			</div>
		</div>
	</a>

	<div class="clear"></div>

	<div class="text-center">
		<a href="" class="view-more">View More</a>
	</div>


@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
