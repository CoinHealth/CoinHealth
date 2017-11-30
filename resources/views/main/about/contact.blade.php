@extends('main.about.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/about.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.about.header')
	@include('main.partials.sidebar')

	<div class="about-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="title">
						{!! trans('about.title') !!}
					</p>
					<p class="subtitle">
						{!! trans('about.subtitle') !!}
					</p>
					<p class="fancy"><span>	{!! trans('about.contact-fancy') !!}</span></p>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<p class="center">
						<img src="/assets/icons/hi.png" alt="" class="hi">
					</p>
				</div>
				<div class="col-md-7">
					<div class="panel panel-primary">
						<div class="panel-heading center">
							<h3 class="panel-title">{!! trans('about.contact-drop') !!}</h3>
						</div>
						<div class="panel-body">
							@if (session()->has('success') )
							<div class="alert alert-success" role="alert">
								{{ session()->get('message') }}
							</div>
							@endif
							<form action="/about/contact" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label for="subject">{!! trans('about.subj-purp') !!} </label>
									<select id="subject" name="subject" required id="" class="form-control">
										<option value="General Inquiry">{!! trans('about.gen-inq') !!}</option>
										<option value="Technical Concerns">{!! trans('about.tech-concerns') !!}</option>
										<option value="Feedback">{!! trans('about.feedback') !!}</option>
										<option value="Partnership">{!! trans('about.partnership') !!}</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="name" required class="form-control" placeholder="NAME:">
								</div>
								<div class="form-group">
									<input type="email" name="email" required class="form-control" placeholder="EMAIL:">
								</div>
								<div class="form-group">
									<textarea name="message" id="" required rows="5" class="form-control" placeholder="MESSAGE:" style="resize: vertical;"></textarea>
								</div>
								<div class="col-md-12">
									<div class="pull-left">
										<a href="http://facebook.com/ilovecareparrot" target="_blank">
											<img src="/assets/icons/fb.png" alt="">
										</a>
									</div>
									<div class="pull-right">
										<button class="btn btn-success" type="post">SEND</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			<div class="back">
				<a href="/askparrot" class="a-back">
					<img src="/assets/icons/back.png" alt="">
				</a>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript" src="/assets/js/about.js"></script>
	<script src="/assets/js/sidebar.js"></script>
	<script type="text/javascript">
	sidebar.init();
	</script>
@endsection
