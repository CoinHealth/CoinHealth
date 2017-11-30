@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/clinic-single.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="clear"></div>

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

	<div class="desc-row row">
		<div class="col-md-12">
			<p class="med-title">About</p>
			<p class="med-desc">
				Lorem ipsum dolor sit amet, cu eos possim eripuit. Putent interpretaris ne pro, et dicit tollit consectetuer sed, ei pri bonorum mandamus signiferumque. Feugait gloriatur pro eu. Mandamus vituperata ei eos. Molestie maiestatis ne vim. His no sumo consequat.
			</p>
			<p class="med-desc">
				harum voluptaria interpretaris vis ea, ad aeque quaestio instructior sed. 
			</p>
		</div>
	</div>

	<div class="se-row row">
		<div class="col-md-12">
			<p class="med-title-dark">Similar facilities nearby</p>

			<div class="row">
				<div class="col-md-12">
					<ul>
						<li><p class="med-desc-blue">Conway Medical Center, Inc.</p></li>
						<li><p class="med-desc-blue">Carolina Bone and Joint Surgery, LLC</p></li>
						<li><p class="med-desc-blue">Wilmington Treatment Center</p></li>
					</ul>
				</div>
			</div>

			<div class="row">
				<hr>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<p class="disclaimer">
							<a href="">Click here for the American Society of Health-System Pharmacists, Inc</a>. Disclaimer. ASHP® Consumer Medication Information. © Copyright, 2014. <br>
							The American Society of Health-System Pharmacists, Inc., 7272 Wisconsin Avenue, Bethesda, Maryland. <br>
							All Rights Reserved. Duplication for commercial 
							use must be authorized by ASHP.
						</p>
						<div class="clear"></div>
						<a href="" class="btn-yellow">Contact</a>
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
