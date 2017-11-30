@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/checkout.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="checkout-container">
	<div class="logo">
		<img src="/assets/icons/careparrot-small.png" alt="">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<div class="row">
						<div class="col-md-4">
							<p>Item 1</p>
							<p>Item 2</p>
							<p>Item 3</p>
						</div>
						<div class="col-md-4">
							<p class="text-center">1x</p>
							<p class="text-center">1x</p>
							<p class="text-center">1x</p>
						</div>
						<div class="col-md-4">
							<p class="text-right">$ 59.99</p>
							<p class="text-right">$ 59.99</p>
							<p class="text-right">$ 59.99</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p>Shipping Fee</p>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<p class="text-right">
								$ 10.00
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p>Delivery Address</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="row">
						<p class="small">Estimated delivery time is 5-7 business days</p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p>Subtotal</p>
						</div>	
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<p class="text-right">$ 179.97</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p>Use CP Points</p>
						</div>	
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<p class="text-right">200($ 5.00)</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p>Grand Total</p>
						</div>	
						<div class="col-md-4">
							<p class="text-center">3 Items</p>
						</div>
						<div class="col-md-4">
							<p class="text-right">$ 174.97</p>
						</div>
					</div>
					<div class="row">
						<div class="orangebtn">
							<a href="/careconnect/payment">PAYMENT</a>
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
