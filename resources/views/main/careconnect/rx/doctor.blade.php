@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/doctor.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="clear"></div>

	<a href="" class="first-a">
		<div class="first-row row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/dr1.png" class="img-med" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<p class="title">
						Dr. Jane Smith
					</p>
					<p class="subtitle">
						Internal Medicine
					</p>
					<p class="miles">
						1.5 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="second-a">
		<div class="second-row row">
			<div class="col-md-6">
				<div class="text-center">
					<p class="title-dark">
						Dr. Patrick Win
					</p>
					<p class="subtitle-dark">
						Cardiology
					</p>
					<p class="miles-dark">
						1.8 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/dr2.png" class="img-med" alt="">
				</div>
			</div>
		</div>
	</a>

	<a href="" class="third-a">
		<div class="third-row row">
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/dr3.png" class="img-med" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<p class="title">
						Dr. John Smith
					</p>
					<p class="subtitle">
						General Physician
					</p>
					<p class="miles">
						1.5 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</a>

	<a href="" class="fourth-a">
		<div class="fourth-row row">
			<div class="col-md-6">
				<div class="text-center">
					<p class="title-dark">
						Dr. Barry Francis
					</p>
					<p class="subtitle-dark">
						Internal Medicine
					</p>
					<p class="miles-dark">
						1.8 miles away
					</p>
					<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-6">
				<div class="text-center">
					<img src="/assets/icons/rx/dr4.png" class="img-med" alt="">
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
