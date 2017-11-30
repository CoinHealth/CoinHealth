@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/clinic.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="clear"></div>

	<a href="" class="first-a">
		<div class="first-row row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/clinic1.png" class="img-med" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<p class="title">
						South Strand
					</p>
					<p class="subtitle">
						Medical Center
					</p>
					<p class="address">
						050 HIGHWAY 17 BYP S<br>
						MYRTLE BEACH, SOUTH CAROLINA 29588
					</p>
					<p class="miles">
						5.1 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="second-a">
		<div class="second-row row">
			<div class="col-md-12">
				<div class="text-center">
					<img src="/assets/icons/rx/clinic2.png" alt="" class="img-med">
					<p class="address-dark">
						300 SINGLETON RIDGE ROAD<br>
						CONWAY, SOUTH CAROLINA 29526
					</p>
					<p class="miles-dark">
						9.5 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="third-a">
		<div class="third-row row">
			<div class="col-md-12">
				<div class="text-center">
					<img src="/assets/icons/rx/clinic3.png" alt="" class="img-med">
					<p class="address">
						300 SINGLETON RIDGE ROAD<br>
						CONWAY, SOUTH CAROLINA 29526
					</p>
					<p class="miles">
						9.5 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="fourth-a">
		<div class="fourth-row row">
			<div class="text-center">
					<img src="/assets/icons/rx/clinic4.png" alt="" class="img-med">
					<p class="address-dark">
						2520 TROY DRIVE<br>
						WILMINGTON, NORTH CAROLINA 28401
					</p>
					<p class="miles-dark">
						65.2 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
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
