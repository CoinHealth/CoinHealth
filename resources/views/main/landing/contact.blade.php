@extends('partials.base')

@push('styles')
	<link rel='stylesheet' href='/assets/css/newsidebar.css' />
	<link rel='stylesheet' href='/assets/css/contact.css' />
@endpush

@section('content')
<!-- @include('main.landing.partials.sidebar') -->
@include('main.partials.sidebar')

<div class="contact-container">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 col-centered">
				<!-- <div class="pull-right">
					<a href="/"><i class="fa fa-times" aria-hidden="true"></i></a>
				</div> -->
				<p class="title">Have a question? </p>
				<p class="subtext">Get in touch!</p>
				@if (session('message'))
	        <div class='alert alert-success'>
	          <p>{{ session('message') }}</p>
	        </div>
	      @endif
				<form action="/home/contact" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Name" name="name" >
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Phone" name="phone">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Subject" name="subject">
					</div>
					<div class="form-group">
						<textarea rows="4" class="form-control" placeholder="Message" name="message"></textarea>
					</div>

					<div class="reponse">
						<label class="radio-inline">
							<input type="radio" name="response_needed" value="Reply to my email">Reply to my email 
				    </label>
				    <label class="radio-inline">
							<input type="radio" name="response_needed" value="Give me a callback">Give me a callback 
				    </label>
				    <label class="radio-inline">
							<input type="radio" name="response_needed" value="No response needed">No response needed 
				    </label>
					</div>

					<div class="text-center">
						<!-- <a href="" class="btn-send">
							SEND
						</a>  -->
						<button type="submit" class="btn btn-send">SEND</button>
						<p></p>
						<a href="/">Cancel</a>
					<!-- 	<p class="call-txt">Call us: 888-988-5866</p>
						<a href="/" class="back-link">Go back to Home Page</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="/assets/js/sidebar_btn.js"></script>
@endpush