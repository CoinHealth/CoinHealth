@extends('main.news.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/news.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')

	@include('main.partials.sidebar')
	<div class="news-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="/" class="home pull-left"><i class="fa fa-home"></i></a>
					<a href="/community/news" class="newslogo">News</a>
					<a href="/community" class="carecommunity back pull-right">
						CareCommunity
					</a>
				</div>
			</div>
			<div class="row news-list">
				@if (isset($blowup) && $blowup)
					<div class="col-md-4 col-md-push-4 blowup-container">
						<div class="box">
							<div class="float-left">
								<div class="media">
									<div class="media-left">
										<a href="#">
											<img class="media-object" 
												src="{{ $current->avatar }}" 
												alt="{{ $current->name }}">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">
											<strong>{{ $current->name }}</strong>
										</h4>
										<p class="time">
											{{ $current->created_at->format('F d, Y') }}
										</p>
									</div>
								</div>
							</div>
							<div class="float-right arrow-ab">
								<span class="news-votes">
									{{ $current->total_votes }}
								</span>
								<a href="#" 
									data-value="-1" 
									data-id="{{ $current->id }}" 
									class="{{ !$current->hasVoted(-1) ?'':'voted' }} btn-vote arrow-down" 
									rel="nofollow">
									<i class="fa fa-arrow-down" aria-hidden="true"></i>
								</a>
								<a href="#" 
									data-value="1" 
									data-id="{{ $current->id }}" 
									class="{{ !$current->hasVoted(1) ?'':'voted' }} btn-vote arrow-up" 
									rel="nofollow">
									<i class="fa fa-arrow-up" aria-hidden="true"></i>
								</a>
							</div>
							<p class="title"><a href="/community/news/{{ $current->hashed_id }}">{{ $current->title }}</a></p>
							<div class="content">{!! $current->body_delta !!}</div>
							<div class="text-center">
								<p><a href="/community/news">Close</a></p>
							</div>
							<div class="socialicons">
								<span>Share</span>
								<a class="fb fb-sharer" data-href="/community/news/{{ $current->hashed_id }}" href="javascript: void(0);">
									<i class="fa fa-facebook-square" aria-hidden="true"></i>
								</a>
								<a href="javascript: void(0);" class="twit-sharer twit" data-text="{{ $current->title }}" data-href="/community/news/{{ $current->hashed_id }}">
									<i class="fa fa-twitter-square" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="text-center some-news-wrapper" id="scrollpos">
						<a href="#scrollpos" class="some-news">Here are some News you might like. <i class="fa fa-arrow-down"></i></a>
					</div>
				@endif
				<div class="clear"></div>
				<div class="news-wrapper" id="news-wrapper">
					<div class="col-md-4">
						@foreach($news as $_news)
							@if(!$_news->user)
							<div class="box">
								<div class="float-left">
									<div class="media">
										<div class="media-left">
											<a href="#"><img class="media-object" src="{{ $_news->avatar }}" alt="{{ $_news->name }}"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading"><strong>{{ $_news->name }}</strong></h4>
											<p class="time">{{ $_news->created_at->format('F d, Y') }}</p>
										</div>
									</div>
								</div>
								<div class="float-right arrow-ab">
									<span class="news-votes">{{ $_news->total_votes }}</span>
									<a href="#" data-value="-1" data-id="{{ $_news->id }}" class="{{ !$_news->hasVoted(-1) ?'':'voted' }} btn-vote arrow-down" rel="nofollow">
										<i class="fa fa-arrow-down" aria-hidden="true"></i>
									</a>
									<a href="#" data-value="1" data-id="{{ $_news->id }}" class="{{ !$_news->hasVoted(1) ?'':'voted' }} btn-vote arrow-up" rel="nofollow">
										<i class="fa fa-arrow-up" aria-hidden="true"></i>
									</a>
								</div>
								<p class="title"><a href="/community/news/{{ $_news->hashed_id }}">{{ $_news->title }}</a></p>
								<div class="content">{!! see_more($_news->body_delta, $_news->hashed_id) !!}</div>
								<div class="socialicons">
									<span>Share</span>
									<a class="fb fb-sharer" data-href="/community/news/{{ $_news->hashed_id }}" href="javascript: void(0);">
										<i class="fa fa-facebook-square" aria-hidden="true"></i>
									</a>
									<a href="javascript: void(0)" class="twit-sharer twit" data-text="{{ $_news->title }}" data-href="/community/news/{{ $_news->hashed_id }}">
										<i class="fa fa-twitter-square" aria-hidden="true"></i>
									</a>
								</div>
							</div>
							@endif
						@endforeach
						@include('main.partials.cp-news')
					</div>
					<div class="col-md-4">
						@include('main.partials.cp-news-top')
						<div class="clear"></div>
						@include('main.partials.cp-news-bottom')
					</div>
					<div class="col-md-4">
						@foreach($news as $_news)
							@if($_news->user)
							<div class="box">
								<div class="float-left">
									<div class="media">
										<div class="media-left">
											<a href="#"><img class="media-object" src="{{ $_news->avatar }}" alt="{{ $_news->name }}"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading"><strong>{{ $_news->name }}</strong></h4>
											<p class="time">{{ $_news->created_at->format('F d, Y') }}</p>
										</div>
									</div>
								</div>
								<div class="float-right arrow-ab">
									<span class="news-votes">{{ $_news->total_votes }}</span>
									<a href="#" data-value="-1" data-id="{{ $_news->id }}" class="{{ !$_news->hasVoted(-1) ?'':'voted' }} btn-vote arrow-down" rel="nofollow">
										<i class="fa fa-arrow-down" aria-hidden="true"></i>
									</a>
									<a href="#" data-value="1" data-id="{{ $_news->id }}" class="{{ !$_news->hasVoted(1) ?'':'voted' }} btn-vote arrow-up" rel="nofollow">
										<i class="fa fa-arrow-up" aria-hidden="true"></i>
									</a>
								</div>
								<p class="title"><a href="/community/news/{{ $_news->hashed_id }}">{{ $_news->title }}</a></p>
								<div class="content">{!! see_more($_news->body_delta, $_news->hashed_id) !!}</div>
								<div class="socialicons">
									<span>Share</span>
									<a class="fb fb-sharer" data-href="/community/news/{{ $_news->hashed_id }}" href="javascript: void(0);">
										<i class="fa fa-facebook-square" aria-hidden="true"></i>
									</a>
									<a href="javascript: void(0)" class="twit-sharer twit" data-text="{{ $_news->title }}" data-href="/community/news/{{ $_news->hashed_id }}">
										<i class="fa fa-twitter-square" aria-hidden="true"></i>
									</a>
								</div>
							</div>
							@endif
						@endforeach

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
	<script type="text/javascript" src="/assets/js/health.js"></script>
	<script type="text/javascript" src="/assets/js/vendor/quill-render/index.js"></script>
	<script type="text/javascript" src="/assets/js/news.js"></script>
	<script type="text/javascript" src="/assets/js/sharer.js"></script>
	<script type="text/javascript">
	$(function() {
		news.init();
		health.init();
		share.init();
	});
	</script>
@endsection
