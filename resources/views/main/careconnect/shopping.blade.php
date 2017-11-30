@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/shopping.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="container-fluid">
	
		<div class="shop-container">
			<div class="row">
			
				<div class="col-md-5 no-padding">
					<div class="shopping-icon">
						<img src="/assets/icons/shopping.png" alt="">
					</div>
				</div>
				<div class="col-md-7 no-padding">
					<div class="shopping-p">
						<p>
							<span>We are taking</span>
							<span class="gradient">Telemedicine</span>
							<span>to a whole</span>
							<span>new level.</span>
						</p>
						<div class="capsule">
							<a href="" class="btn-capsule">
								<img src="/assets/icons/capsule.png">
							</a>
							<a href="" class="not-now">Not now</a>
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
