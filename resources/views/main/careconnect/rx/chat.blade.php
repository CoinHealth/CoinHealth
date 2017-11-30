@extends('main.careconnect.rx.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/chat.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="container">

		<div class="row chat-row">
			<div class="col-md-12">

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							It's a pleasure to meet you! I'm Carla, your smart health concierge. May I have your name please?
						</p>
						<div class="row row-name">
							<div class="col-md-12">
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									CONTINUE
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div class="user pull-right">
					<div class="box">
						<p>My Name is John Smith</p>
					</div>
				</div>

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							Hi John! What is your biological sex?
						</p>
						<ul class="carla-list">
							<li>
								<a href="">Female</a>
							</li>
							<li>
								<a href="">Male</a>
							</li>
							<li>
								<a href="">Intersex</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="clear"></div>

				<div class="user pull-right">
					<div class="box">
						<p>
							I am Male
						</p>
					</div>
				</div>

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							What is your date of birth?
						</p>
						<div class="row row-name">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<select class="form-control">
											<option value=""></option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-control">
											<option value=""></option>
										</select>
									</div>
									<div class="col-md-3">
										<select class="form-control">
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									CONTINUE
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div class="user pull-right">
					<div class="box">
						<p>
							November 14, 1986
						</p>
					</div>
				</div>

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:25am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							Thanks! Before I find you the health professional that's right for you, let’s fill out a few notes on your medical history. Rest-assured - all of the information we collect is secured and 100% HIPAA compliant.
						</p>

						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									BEGIN HISTORY
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="clear"></div>

				<div class="carla pull-left">
					<p class="status"><span class="name">Carla</span> <span class="time">10:33am</span></p>
					<div class="box">
						<img src="/assets/icons/modal-logo.png" alt="" class="carla-logo">
						<p>
							It seems that we may have met before, as
							an account is registered with this email.
							No worries! let’s  go back to the login page
							to continue your  conversation.
						</p>

						<div class="row">
							<div class="col-md-12">
								<a href="" class="continue">
									RETURN TO LOGIN
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
