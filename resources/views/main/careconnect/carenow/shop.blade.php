@extends('main.careconnect.carenow.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/owl.theme.css">
<link rel="stylesheet" href="/assets/css/carenow/shop.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="row">
		<div class="shop-container">
			<div class="col-md-12">
				<div class="orange-title">
					<p>Picks of the Week</p>
				</div>
				<div class="week-slide col-md-12">
					<div id="week-slide" class="owl-carousel">
						<a class="item link">
							<img src="/assets/icons/week1.png" alt="">
						</a>
						<a class="item link">
							<img src="/assets/icons/week2.png" alt="">
						</a>
						<a class="item link">
							<img src="/assets/icons/week3.png" alt="">
						</a>
						<a class="item link">
							<img src="/assets/icons/week4.png" alt="">
						</a>
						<a class="item link">
							<img src="/assets/icons/week1.png" alt="">
						</a>
					</div>

					<p class="category">
						Top Brands
					</p>

					<div id="brand-slide" class="owl-carousel">
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med1.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med2.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med3.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med4.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med5.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
						<div class="item">
							<div class="med">
								<img src="/assets/icons/med6.png" alt="">
							</div>
							<p class="med-title">
								used to treat herpes
							</p>
							<a href="" class="btn-sm-yellow">
								BUY
							</a>
						</div>
					</div>

					<p class="category">
						Directory
					</p>

					<div id="doctor-slide" class="owl-carousel">
						<a class="item link">
							<div class="media">
							  	<div class="media-left">
							      	<img class="media-object" src="/assets/icons/dr.png">

							  	</div>
							  	<div class="media-body">
							    	<h4 class="media-heading">Dr. John Smith</h4>
							    	<p>
							    		Internal Medicine<br>
							    		General Physician<br>
							    		123 S Wilson st. Rock Hill, SC 29730<br>
							    		803-370-0000
							    	</p>
							    	<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
							  	</div>
							</div>
						</a>
						<a class="item link">
							<div class="media">
							  	<div class="media-left">
							      	<img class="media-object" src="/assets/icons/nurse.png">

							  	</div>
							  	<div class="media-body">
							    	<h4 class="media-heading">Jane Smith</h4>
							    	<p>
							    		Nurse<br>
							    		St. Lukes<br>
							    		123 S Wilson st. Rock Hill, SC 29730<br>
							    		803-370-0000
							    	</p>
							    	<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
							  	</div>
							</div>
						</a>
						<a class="item link">
							<div class="media">
							  	<div class="media-left">
							      	<img class="media-object" src="/assets/icons/dr.png">

							  	</div>
							  	<div class="media-body">
							    	<h4 class="media-heading">Dr. John Smith</h4>
							    	<p>
							    		Internal Medicine<br>
							    		General Physician<br>
							    		123 S Wilson st. Rock Hill, SC 29730<br>
							    		803-370-0000
							    	</p>
							    	<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
							  	</div>
							</div>
						</a>
						<a class="item link">
							<div class="media">
							  	<div class="media-left">
							      	<img class="media-object" src="/assets/icons/nurse.png">

							  	</div>
							  	<div class="media-body">
							    	<h4 class="media-heading">Jane Smith</h4>
							    	<p>
							    		Nurse<br>
							    		St. Lukes<br>
							    		123 S Wilson st. Rock Hill, SC 29730<br>
							    		803-370-0000
							    	</p>
							    	<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i>
							  	</div>
							</div>
						</a>
						<a class="item link">
							<div class="media">
							  	<div class="media-left">
							      	<img class="media-object" src="/assets/icons/dr.png">

							  	</div>
							  	<div class="media-body">
							    	<h4 class="media-heading">Dr. John Smith</h4>
							    	<p>
							    		Internal Medicine<br>
							    		General Physician<br>
							    		123 S Wilson st. Rock Hill, SC 29730<br>
							    		803-370-0000
							    	</p>
							    	<i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star yellow" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
							  	</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script>
$(document).ready(function() {

  $("#week-slide").owlCarousel({
    items : 4,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-left fa-3x' aria-hidden='true'></i>",
      "<i class='fa fa-chevron-right fa-3x' aria-hidden='true'></i>"
      ],
  });

  $('.link').on('click', function(event){


  });

  $("#brand-slide").owlCarousel({
    items : 5,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-left fa-3x' aria-hidden='true'></i>",
      "<i class='fa fa-chevron-right fa-3x' aria-hidden='true'></i>"
      ],
  });

  $("#doctor-slide").owlCarousel({
    items : 4,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-left fa-3x' aria-hidden='true'></i>",
      "<i class='fa fa-chevron-right fa-3x' aria-hidden='true'></i>"
      ],
  });

});
</script>
@endsection
