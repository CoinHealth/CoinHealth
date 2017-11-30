@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/payment.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="payment-container">
	<div class="logo">
		<img src="/assets/icons/careparrot-small.png" alt="">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<div class="master">
						<img src="/assets/icons/master.png" alt="">
					</div>

					<div class="row">
						<p class="title">Choose Your Payment Method</p>
					</div>

					<div class="row bm">
						<div class="col-md-3">
							<p class="input-p">Name of Card</p>
						</div>
						<div class="col-md-9">
							<input type="text" class="form-control">
						</div>
					</div>

					<div class="row bm">
						<div class="col-md-3">
							<p class="input-p">Card Number</p>
						</div>
						<div class="col-md-9">
							<input type="text" class="form-control">
						</div>
					</div>

					<div class="row bm">
						<div class="col-md-3">
							<p class="input-p">DD/MM/YY</p>
						</div>
						<div class="col-md-9">
							<input type="text" class="form-control">
						</div>
					</div>

					<div class="row bm">
						<div class="col-md-3">
							<p class="input-p">CVC</p>
						</div>
						<div class="col-md-9">
							<input type="text" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class="orangebtn">
							<a href="">SUBMIT ORDER</a>
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
