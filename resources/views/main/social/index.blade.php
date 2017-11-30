@extends('main.social.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/social.css">
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class='social-container'>
	<div class='social-fallback'>
		<div class='menu-container text-center'>
			<div class='col-md-3 col-sm-3 col-xs-6 social-menu'>

				<a href='#'>
					<img class='img-responsive' src='/assets/icons/social-message-board.png' />
					<p>Message Board</p>
				</a>
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6 social-menu'>

				<a href='/blogs'>
					<img class='img-responsive' src='/assets/icons/social-blog.png' />
					<p>Blog</p>
				</a>
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6 social-menu'>

				<a href='/news'>
					<img class='img-responsive' src='/assets/icons/social-news.png' />
					<p>News</p>
				</a>
			</div>
			<div class='col-md-3 col-sm-3 col-xs-6 social-menu'>

				<a href='#'>
					<img class='img-responsive' src='/assets/icons/social-facebook.png' />
					<p>Connect to your Social Media</p>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
$(function(e) {
	var height = 0;
	$('.social-menu').each(function(i,v) {
		height = height <= $(v).innerHeight() ? $(v).innerHeight() : height;
		console.log(height)
		$('.social-menu').height(height);
	});
});
</script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
