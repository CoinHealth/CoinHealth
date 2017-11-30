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
			<p class="question">To date, I have had  complications with my asthma: <span class="color-blue">No</span></p>

			<div class="row">
				<div class="col-md-12">
					<div class="box-selector">
						<ul>
							<li>
								<a href="">Yes</a>
							</li>
							<li class="active">
								<a href="">No</a>
							</li>
						</ul>

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
