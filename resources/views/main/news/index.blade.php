@extends('main.news.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/news.css">
@endsection

@section('content.inner')
<div class="news-container">
	<div class="news-header text-center">
		<h1>News</h1>
	</div>
	<div class="col-sm-12 inner-wrapper">
			<div class="col-sm-7 left">
				<div class="text-container">
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
			</div>
			<div class="col-sm-5 col-xs-12 right">
				<div class="col-xs-6 col-sm-12 right-top">
					<div class="text-container">
						<h3>Lorem Ipsum</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
					</div>
				</div>
				<div class="col-xs-6 col-sm-12 right-bottom">
					<div class="text-container">
						<h3>Lorem Ipsum</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
					</div>
				</div>
			</div>
	</div>
	<div class="news-footer col-sm-12 text-center">
		<ul class="list-inline">
			<li><a href='#'>Next</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">Last</a></li>
		</ul>
		<div class="col-sm-8 col-sm-offset-2">
			<div class="col-xs-6">
				<input type="text" class="text-center form-control" placeholder="Enter Email here" name="email">
			</div>
			<div class="col-xs-6">
				<button type="button" class="btn-block btn btn-success">Submit</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection
