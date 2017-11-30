@extends('main.profile2.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/visitor.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
<div class="new-profile-container container">
	<div class="row">
		<div class="col-md-12">
			<ul class="menu">
				<li><a href="">Forums</a></li>
				<li><a href="">Agent Portal</a></li>
				<li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-cog" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 profile-sidebar">
			<div class="text-center">
				<a href="" class="img-profile">
					<img src="/assets/icons/upload-photo.png" alt="">
				</a>
			</div>
			<p class="name">
				John Smith
			</p>
			<p class="status">
				<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="joined">Joined on</span> <span class="date">June 06, 2016</span> 
			</p>

			<div class="prof-btn">
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="btn-blue">Chat</a>
					</div>
					<div class="col-md-6">
						<a href="#" class="btn-yellow">Follow</a>
					</div>
				</div>
			</div>

			<div class="row rating">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<p class="rate">
						<span class="num">112</span>
						<span class="cat">Followers</span>
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<p class="rate">
						<span class="num">173</span>
						<span class="cat">Following</span>
					</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<p class="rate">
						<span class="num">79</span>
						<span class="cat">CP Points</span>
					</p>
				</div>
			</div>

			<div class="text-center">
				<div class="circle-level">
					<p>
						<span class="num">3</span>
						<span class="lev">Level</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="badges-container">
				<p class="title">
					Badges
				</p>

				<div class="row badges-row">
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/100 lead.png" alt="">
							<p>100 Leads Club</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/300 lead.png" alt="">
							<p>300 Leads Club</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/500 lead.png" alt="">
							<p>500 Leads Club</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/account.png" alt="">
							<p>Account</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_contact.png" alt="">
							<p>Badge Contact</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_daily_routine.png" alt="">
							<p>Badge Daily Routine</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_eyes_on_you.png" alt="">
							<p>Badge Eyes On You</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_file_wizard.png" alt="">
							<p>Badge File Wizard</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_give_ratings.png" alt="">
							<p>Badge Give Ratings</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_happy_anniversary.png" alt="">
							<p>Badge Happy Anniversary</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_network_provider.png" alt="">
							<p>Badge Network Provider</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-2">
						<div class="text-center">
							<img src="/assets/icons/badges/badge_night_crusader.png" alt="">
							<p>Badge Night Crusader</p>
						</div>
					</div>
				</div>
			</div>

			<div class="comment-container">
				<div class="row comment-row">
					<div class="col-md-12">
						<div class="media">
						  	<div class="media-left">
						    	<a href="#">
						      		<img class="media-object" src="/assets/icons/upload-photo.png">
						    	</a>
						  	</div>
						  	<div class="media-body">
						    	<a href="" class="media-heading">John Smith</a>
						    	<div class="row">
						    		<div class="col-md-10">
						    			<p>
						    				Lorem ipsum dolor sit amet, cu eos possim eripuit. Putent interpretaris ne pro
						    			</p>
						    		</div>
						    		<div class="col-md-2 com-rep">
						    			<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
						    		</div>
						    	</div>

						    	<div class="media media-reply">
								  	<div class="media-left">
								    	<a href="#">
								      		<img class="media-object" src="/assets/icons/upload-photo.png">
								    	</a>
								  	</div>
								  	<div class="media-body">
								    	<a href="" class="media-heading">Lily Parker</a>
								    	<div class="row">
								    		<div class="col-md-10">
								    			<p>
								    				Lorem ipsum dolor sit amet, cu eos possim eripuit. Putent interpretaris ne pro et dicit tollit consectetuer sed, ei pri bonorum mandamus signiferumque.
								    			</p>
								    		</div>
								    	</div>
								  	</div>
								</div>

								<div class="media media-reply">
								  	<div class="media-left">
								    	<a href="#">
								      		<img class="media-object" src="/assets/icons/upload-photo.png">
								    	</a>
								  	</div>
								  	<div class="media-body">
								    	<a href="" class="media-heading">John Smith</a>
								    	<div class="row">
								    		<div class="col-md-10">
								    			<p>
								    				Lorem ipsum dolor sit amet, cu eos possim eripuit. 
								    			</p>
								    		</div>
								    	</div>
								  	</div>
								</div>

								<div class="reply">
									<div class="row">
										<div class="col-md-10">
											<div class="form-inline">
												<div class="form-group">
													<input type="text" class="form-control">
													<a href=""><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
												</div>
											</div>
										    
										</div>
									</div>
								</div>

						  	</div>

						  	<div class="pull-right reply-ab">
						  		<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
						  	</div>
						</div>
					</div>
				</div>

				<div class="row comment-row">
					<div class="col-md-12">
						<div class="media">
						  	<div class="media-left">
						    	<a href="#">
						      		<img class="media-object" src="/assets/icons/upload-photo.png">
						    	</a>
						  	</div>
						  	<div class="media-body">
						    	<a href="" class="media-heading">John Smith</a>
						    	<div class="row">
						    		<div class="col-md-10">
						    			<p>
						    				Lorem ipsum dolor sit amet, cu eos possim eripuit. Putent interpretaris ne pro
						    			</p>
						    		</div>
						    		<div class="col-md-2 com-rep">
						    			<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
						    		</div>
						    	</div>
						    </div>
						</div>
						<div class="pull-right reply-ab">
					  		<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
					  	</div>
					</div>
				</div>

				<div class="row comment-row">
					<div class="col-md-12">
						<div class="media">
						  	<div class="media-left">
						    	<a href="#">
						      		<img class="media-object" src="/assets/icons/upload-photo.png">
						    	</a>
						  	</div>
						  	<div class="media-body">
						    	<a href="" class="media-heading">John Smith</a>
						    	<div class="row">
						    		<div class="col-md-10">
						    			<p>
						    				Lorem ipsum dolor sit amet, cu eos possim eripuit. Putent interpretaris ne pro
						    			</p>
						    		</div>
						    		<div class="col-md-2 com-rep">
						    			<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
						    		</div>
						    	</div>
						    </div>
						</div>
						<div class="pull-right reply-ab">
					  		<a class="a-reply"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="#" class="arrow-down"><i class="fa fa-arrow-down" aria-hidden="true"></i></a><a href="#" class="arrow-up"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid fixed-button">
	<div class="row">
		<div class="col-xs-6 no-padding">
			<a href="#" class="btn-yellow">Chat</a>
		</div>
		<div class="col-xs-6 no-padding">
			<a href="#" class="btn-blue">Follow</a>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@include('main.partials.scripts.sidebar')

 
@endsection