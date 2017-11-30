@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/history.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection
{{-- change this url to summary --}}
@section('content.inner')
	@include('main.partials.sidebar')

	

	<div class="histories-container">

		<div class="row notes">
			<div class="container">
				<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
				<div class="box">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<p class="mini-title">ACCOUNT REGISTRATION</p>
								<p class="title">Let’s make it official!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container">

				<div class="row row-summary">
					<div class="col-md-12 col-summary">
						<p class="sum-content">
							You’ve match with the perfect doctor, now let’s go all the way!
							With registration to remedy, never co-pay again. Gain accesss 
							to your personal concierge doctor: ask any question, get 
							referrals to specialists, and direct prescriptions, all from the 
							convenience of your phone.
						</p>
						<br><br>
						<p class="mid-title"><span class="color-blue">Free</span> first month</p>
						
						<strong>CREDIT CARD NUMBER</strong>
						<input type="text" name="" class="form-control" placeholder="xxxx-xxxx-xxxx">
						<br><br>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<strong>EXPIRATION</strong>
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="Month">
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="Year">
									</div>
								</div>
							</div>
							<div class="col-md-3 col-md-offset-3">
								<strong>CSV</strong><br>
								<input type="text" class="form-control" placeholder="CSV">
							</div>
						</div>

						<p class="concierge">
							<span class="color-blue"><strong>Try Remedy Concierge for free:</strong></span> Don’t pay for a product you don’t absolutely 
							love. You will be charge until after your first month, at which point the recurring 
							$30/month subscription will begin. If you are not 100% satisfied with the 
							concierge service, cancel anytime. No questions askesd.
						</p>
					</div>

					<div class="col-md-12">
						<div class="continue">
							<a href="" class="btn-yellow">
								REGISTER
							</a>
						</div>
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
