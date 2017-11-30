@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/shop-item.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="item-container">
	<div class="logo">
		<img src="/assets/icons/careparrot-small.png" alt="">
	</div>

	<div class="container">
		<div class="row">
			<input type="hidden" id="userLog" value="{{ isset($user->username) ? $user->username : '' }}">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<div class="pull-right">
						<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star star-grey"></i><i class="fa fa-star star-grey"></i>
					</div>
					<div class="item">
						<img src="/assets/icons/prod.png" alt="">
					</div>
					<div class="clear"></div>
					<div class="info">
						<div class="pull-left">
							<p class="prod-title">Lorem Ipsum</p>
							<p class="prod-price">$ 59.99</p>
						</div>
						<div class="pull-right">
							<p class="colors">Available Colors</p>
							<ul class="colorlist">
								<li>
									<div class="color1"></div>
								</li>
								<li>
									<div class="color2"></div>
								</li>
								<li>
									<div class="color3"></div>
								</li>
								<li>
									<div class="color4"></div>
								</li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<p class="desc">
						Lorem ipsum dolor sit amet, cu eos possim eripuit. 
						Putent interpretaris ne pro, et dicit tollit consectetuer sed,
						ei pri bonorum mandamus signiferumque
					</p>
					<div class="orangebtn">
						<a href="#" id="addtocartBtn">ADD TO CART</a>
					</div>
					<div class="checkout">
						<a href="/careconnect/checkout" class="checkoutBtn">CHECKOUT</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('main.careconnect.partials.log-first-modal')
	@include('main.careconnect.partials.cart-modal')
</div>
@endsection

@section('scripts')

<script src="/assets/js/shop.js"></script>
<script type="text/javascript">
	shop.checkoutItem();
	shop.addToCartItem();
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
