@extends('main.askparrot.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/aboutus.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="container-fluid panel-container">
		<div>
		  	<!-- Nav tabs -->
		  	<ul class="nav nav-tabs" role="tablist">
			    <li><a href="/askparrot" aria-controls="home" role="tab" ><img src="/assets/icons/mini-care.png" alt="">back</a></li>
			    <li role="presentation" class="active"><a href="#carecommunity" aria-controls="carecommunity" role="tab" data-toggle="tab">CARECOMMUNITY</a></li>
			    <li role="presentation"><a href="#knowmore" aria-controls="knowmore" role="tab" data-toggle="tab">KNOW MORE ABOUT CAREPARROT</a></li>
			    <li role="presentation"><a href="#quote" aria-controls="quote" role="tab" data-toggle="tab">QUOTE ENGINE</a></li>
		  	</ul>

		  	<!-- Tab panes -->
		  	<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="carecommunity">
			    	<div class="title-container">
			    		<img src="/assets/icons/carecommunity.png" alt="">
			    	</div>
			    	<div class="tab-community">
				    	<div class="tab-text">
				    		<div class="col-md-12">
				    			<p>
				    				Join a Community and meet other local CareParrot Members.
				    			</p>
				    			<p>
				    				Never stress again. We've created an online <span>CareCommunity</span> where we collaborate with other Corporate Partners and use direct feedback from our members to help improve Care and lower out-of-pocket expenses. Being healthy is a right and should be accessible to all. 
				    			</p>
				    			<p>
				    				You will be able to <span>connect</span> with friends, family and CareParrot to share ideas, photos, create your own meet up groups (for healthy and fun activities) all with the purpose of making Health Care FUN.
				    			</p>
				    		</div>
				    	</div>
				    </div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="knowmore">
			    	<div class="first">
				    	<div class="title-container">
				    		<img src="/assets/icons/parrottype.png" class="parrottype" alt="">
				    	</div>
				    	<div class="tab-text text-center">
				    		<div class="col-md-12">
				    			<p>
				    				The logo is a custom parrot styled after a Macaw. It does not resemble any specific Macaw, and instead represents all the different and colorful identities of our members and their ideas.
				    			</p>
				    			<p>
				    				<img src="/assets/icons/tabcare.png" class="typecare" alt="">
				    			</p>
				    			<p>
				    				<a href="javascript:void(0);" class="learn">Learn more</a>
				    			</p>
				    		</div>
				    	</div>
				    </div>
				    <div class="second">
				    	<div class="title-container">
				    		<img src="/assets/icons/macaw.png" alt="">
				    	</div>
				    	<div class="tab-text">
				    		<div class="col-md-7">
				    			<p class="title">
				    				Your Assistant is a Scarlet Macaw.
				    			</p>
				    			<p>
				    				Macaws are beautiful, brilliantly colored members of the parrot 
									family.Macaws are intelligent, social birds that often gather in
									flocks of 10 to 30 individuals. Their loud calls, squawks, and screams 
									echo through the forest canopy. Macaws vocalize to communicate 
									within the flock, mark territory, and identify one another. Some species can 
									even mimic human speech. Macaws typically mate for life. They not only breed 
									with their mates, but also share food with their mates and enjoy mutual grooming.
				    			</p>
				    			<p>
				    				<span class="small-text">~Sourced via nationalgeographic.com</span>
				    			</p>
				    		</div>
				    		<div class="col-md-5 text-center">
				    			<img src="/assets/icons/carla.png" class="carla" alt="">
				    		</div>
				    	</div>
				    </div>
			    </div>
		    	<div role="tabpanel" class="tab-pane" id="quote">
		    		<div class="title-container">
			    		<img src="/assets/icons/quote.png" alt="">
			    	</div>
			    	<div class="tab-text text-center">
			    		<div class="col-md-12">
			    			<p class="title">
			    				It's Absolutely Free
			    			</p>
			    			<p>
			    				Our quote engine is dedicated to finding plans fast, allowing users to 
								comment and rate plans and insurance carriers service quality. We will keep you up to date with new plans that may benefit you better as your life changes, and we'll do most of the heavy lifting for you. We will continue to improve the way we help deliver quality Health Care.

			    			</p>
			    			<p class="text-center">
			    				<a href="#">www.health.careparrot.com</a>
			    			</p>
			    		</div>
			    	</div>
		    	</div>
		  	</div>
		</div>
	</div>
  @include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script>
	$(".learn").click(function () {
		$(".first").fadeOut();
		$(".second").fadeIn();
	});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection


