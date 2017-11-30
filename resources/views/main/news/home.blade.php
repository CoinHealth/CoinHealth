@extends('main.news.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/news-home.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class="news-container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 nopadding">
				<a href="#">
					<div class="div-yellow">
						<div class="media">
						  	<div class="media-left media-middle">
							    <p class="title-media">News</p>
						  	</div>
						  	<div class="media-body">
						    	<p>
						    		BE INFORMED WITH THE <br>LATEST HEALTH NEWS.
						    	</p>
						  	</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 nopadding">
				<a href="#">
					<div class="div-grey">
						<div class="media">
						  	<div class="media-left media-middle">
							    <p class="title-media">Blogs</p>
						  	</div>
						  	<div class="media-body">
						    	<p>
						    		READ STUFF <br>THAT MATTERS.
						    	</p>
						  	</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="div-topics">
					<div class="month">
						<p>
							<a href="/news/news-blog">
								<span class="s-month">{{ date('F') }}</span>
							</a>
						</p>
					</div>
					@foreach($news as $_news)
					<div class="new-topic">
						<a href="/news/view/?url={{ $_news->url }}">
							{{-- <div class="channel">
								<p>
									<span class="name">NY TIMES</span> <span class="days">2 days ago</span>
								</p>
							</div> --}}
							<div class="title-news">
								<p>
									{{ $_news->title }}
								</p>
							</div>
							<p class="desc">
								{{ $_news->description }}
							</p>
						</a>
						<p class="social">
							share:
							<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode('careparrot.com/news/view/?url='. $_news->url) }}&display=popup" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://twitter.com/intent/tweet?text=Great Article! {{ urlencode('careparrot.com/news/view/?url='. $_news->url) }}&via=ilovecareparrot" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</p>
					</div>
					@endforeach
					{{-- <div class="new-topic">
						<a href="/news/news-blog">
							<div class="channel">
								<p>
									<span class="name">NY TIMES</span> <span class="days">2 days ago</span>
								</p>
							</div>
							<div class="title-news">
								<p>
									TIMES TOPICS:  OBAMACARE
								</p>
							</div>
							<p class="desc">
								NEWS ABOUT OBAMACARE, COMMENTARIES...
							</p>
						</a>
						<p class="social">
							share: <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</p>
					</div>
					<div class="new-topic">
						<a href="/news/news-blog">
							<div class="channel">
								<p>
									<span class="name">NY TIMES</span> <span class="days">2 days ago</span>
								</p>
							</div>
							<div class="title-news">
								<p>
									TIMES TOPICS:  OBAMACARE
								</p>
							</div>
							<p class="desc">
								NEWS ABOUT OBAMACARE, COMMENTARIES...
							</p>
						</a>
						<p class="social">
							share: <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</p>
					</div> --}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="next">
				<a href="">
					Next
				</a>
				<div class="back-a">
					<a href="/community">
						<img src="/assets/icons/back.png" alt="">
					</a>
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
