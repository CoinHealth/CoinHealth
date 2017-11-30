@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/agent-finder.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="income-container">
	<div class="container">
		<input type="hidden" id="userLog" value="{{ isset($user->id) ? $user->id : '' }}">

		<div class="row">
			<div class="col-md-12">
				<ul class="ds-ul">
					<li>
						<a href="/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
					</li>
					<li>
						<h1 class="provider-header">Agent Search</h1>
					</li>
					<li>
						<a class="btn btn-primary btn-submit" role="button" href="/careconnect/create-agent"><i class="fa fa-fw  fa-plus-square" aria-hidden="true"></i> Add Agent</a>
					</li>
					<li>
						<a class="btn btn-warning" id="btnPremium" role="button" href="javascript:void(0);">Premium Listing</a>
					</li>
				</ul>
			</div>

			<div class="provider-search-container">
				<div class="container">
					<div class="row">
						<form action="">
							<div class="col-md-5">
								<input type="text" class="form-control" placeholder="Name">
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" placeholder="City">
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" placeholder="State">
							</div>
							<div class="col-md-1">
								<a href="" class="btn btn-primary form-control"><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="container">

				<div class="row search-header">
					<div class="col-md-7">
						<ul>
							<li>
								<h3>Search Results</h3> 
							</li>
							<li>
								<span>Page 1 of 36</span>
							</li>
							<li>
								<a href="">More</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="row listing">
					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/premium-listing.jpg" alt="">
								<div class="ribbon-wrapper-yellow">
									<div class="ribbon-yellow">SUGGESTED</div>
								</div>
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/premium-listing.jpg" alt="">
								<div class="ribbon-wrapper-yellow">
									<div class="ribbon-yellow">SUGGESTED</div>
								</div>
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/premium-listing.jpg" alt="">
								<div class="ribbon-wrapper-yellow">
									<div class="ribbon-yellow">SUGGESTED</div>
								</div>
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>

					<div class="clearfix visible-md-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/blanklist.jpg" alt="">
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/blanklist.jpg" alt="">
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-6">
						<a href="">
							<div class="wrapper">
								<img src="/assets/icons/blanklist.jpg" alt="">
							</div>
							<div class="list-info">
								<p>
									<span><strong>LOREM IPSUM</strong></span>
									<span>
										800 West Meeting Street, Lancaster, SC 29720
									</span>
									<span>19.6 miles away</span>
									<span>803-286-1214</span>
								</p>
							</div>
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@include('main.careconnect.partials.agent-pl-modal')
@include('main.careconnect.partials.agent-pl-payment')
@endsection

@section('scripts')
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src="/assets/js/sidebar.js"></script>
<script src="/assets/js/datum/agents.js"></script>
<script src="/assets/js/agent-finder.js"></script>
<script type="text/javascript">
	sidebar.init();
	agent.init();
  agent.initPremiumListing();
</script>
@endsection
