@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/chat2.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="chat-container container">

		<div class="row chat-row">
			<div class="col-md-12">

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							To match you with the best personal
							doctor possible. I’d like to get a sense of
							what your interests are. Any of the below
							health goals interest you? We’ll work
							together to achieve them!
						</p>
						<ul class="carla-list">
							<li>
								<a href="">Physical Therapy</a>
							</li>
							<li>	
								<a href="">Sleep Medicine</a>
							</li>
							<li>
								<a href="">Stress Management</a>
							</li>
							<li>
								<a href="">Family Medicine</a>
							</li>
							<li>
								<a href="">Sports Medicine</a>
							</li>
						</ul>
					</div>
				</div>


				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							Got it. I’m going to sync with our 
							physicians to find the best for you.
						</p>

						<div class="media">
						  <div class="media-left">
						    <a href="#">
						      <img class="media-object" src="/assets/icons/pf-sm.png" alt="...">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading">Victoria Beckinsale, F.M.</h4>
						    <h6>Family Medicine</h6>
						  </div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									VIEW DOCTOR
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="clear"></div>
				
				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							Jei, I’d like to introduce to you 
							Dr. Beckinsale, your remedy primary care 
							doctor.
						</p>
					</div>
				</div>	

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Dr. Victoria Beckinsale</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/pf-sm.png" alt="" class="carla-logo">
						<p>
							Hi Jei! It’s pleasure to meet you! I’m excited
							about being your concierge doctor going 
							forward and am happy to help you with 
							your health needs. If you’re feeling unwell
							today, feel free to start an appointment, 
							otherwise I’m happy to answer any 
							question you have about your health.
						</p>
					</div>
				</div>

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							Now that we’re all connected, feel free to
							directly message myself or Dr. Beckinsale
							at any time. We’ve yet to register your 
							account though, so let’s complete some of
							that busywork first so we can start chatting
							right away!

						</p>

						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									REGISTER
								</a>
							</div>
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
