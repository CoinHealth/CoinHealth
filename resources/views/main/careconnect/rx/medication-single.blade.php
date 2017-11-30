@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/medication-single.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="clear"></div>

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

	<div class="desc-row row">
		<div class="col-md-12">
			<p class="med-title">Description</p>
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
			<p class="med-title-dark">Description</p>

			<div class="row">
				<div class="col-md-6">
					<ul>
						<li><p class="med-desc-dark">Lorem ipsum dolor sit amet</p></li>
						<li><p class="med-desc-dark">cu eos possim eripuit</p></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li><p class="med-desc-dark">Lorem ipsum dolor sit amet</p></li>
						<li><p class="med-desc-dark">cu eos possim eripuit</p></li>
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
						<a href="" class="btn-yellow"><i class="fa fa-shopping-cart" aria-hidden="true"></i> BUY NOW</a>
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
