@extends('main.blogs.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/news.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
	<link rel="stylesheet" href="/assets/css/blogs.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	@include('main.blogs.new-blog')
	@include('main.blogs.edit-blog')
  <div class="news-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
					<a href="/" class="home pull-left"><i class="fa fa-home"></i></a>
          <a href="/community/blogs" class="newslogo">Blogs</a>
					<span class="news-divider">|</span>
					<a href="#new-blog" data-toggle="modal" class="new-blog">Post a new blog</a>
					<a href="/community" class="carecommunity back pull-right">CareCommunity</a>
        </div>
      </div>
      <div class="row news-list">
				@if (isset($blowup) && $blowup)
				<div class="col-md-4 col-md-push-4 blowup-container">
					<div class="box">
            <div class="float-left">
              <div class="media">
                  <div class="media-left">
                    <a href="#"><img class="media-object" src="{{ $current->user->avatar_path }}" alt="{{ $current->user->full_name }}"></a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><strong>{{ $current->user->full_name }}</strong></h4>
                    <p class="time">{{ $current->created_at->format('F d, Y') }}</p>
                  </div>
              </div>
            </div>
            <div class="float-right arrow-ab">
							<span class="news-votes">{{ $current->total_votes }}</span>
							<a href="#" data-value="-1" data-id="{{ $current->id }}" class="{{ !$current->hasVoted(-1) ?'':'voted' }} btn-vote arrow-down" rel="nofollow">
								<i class="fa fa-arrow-down" aria-hidden="true"></i>
							</a>
							<a href="#" data-value="1" data-id="{{ $current->id }}" class="{{ !$current->hasVoted(1) ?'':'voted' }} btn-vote arrow-up" rel="nofollow">
								<i class="fa fa-arrow-up" aria-hidden="true"></i>
							</a>
            </div>
            <p class="title"><a href="/community/blogs/{{ $current->hashed_id }}">{{ $current->title }}</a></p>
						<div class="content">{!! $current->content !!}</div>
						<div class="text-center">
							<p><a href="/community/blogs">Close</a></p>
						</div>
            <div class="socialicons">
              <span>Share</span>
							<a class="fb fb-sharer" data-href="/community/blogs/{{ $current->hashed_id }}" href="javascript: void(0);">
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
							</a>
							<a href="javascript: void(0);" class="twit-sharer twit" data-text="{{ $current->title }}" data-href="/community/blogs/{{ $current->hashed_id }}">
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
							</a>
							@if ( auth()->check() && auth()->user()->id == $current->user_id )
							<div class="pull-right">
								<a href="#edit-blog" data-id="{{ $current->id }}" data-toggle="modal" title="Edit" class="btn btn-xs btn-success">
									<i class="fa fa-pencil"></i>
								</a>
								<form action="/community/blogs/{{ $current->id }}"  method="post" style="display: inline-block">
									<button type="button" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-times"></i></button>
								</form>
							</div>
							@endif
            </div>
          </div>
				</div>
				<div class="clear"></div>
				<div class="text-center some-news-wrapper" id="scrollpos">
					<a href="#scrollpos" class="some-news">Here are some Blogs you might like. <i class="fa fa-arrow-down"></i></a>
				</div>
				@endif
				<div class="clear"></div>
				<div class="news-wrapper" id="news-wrapper">
					<div class="col-md-4">
	          @include('main.partials.cp-news')
	        </div>
	        <div class="col-md-4">
						@include('main.partials.cp-news-top')
	          <div class="clear"></div>
	          @include('main.partials.cp-news-bottom')
	        </div>
					<div class="col-md-4">
						@foreach($blogs as $blog)
	          <div class="box">
	            <div class="float-left">
	              <div class="media">
	                  <div class="media-left">
	                    <a href="#"><img class="media-object" src="{{ $blog->user->avatar_path }}" alt="{{ $blog->user->full_name }}"></a>
	                  </div>
	                  <div class="media-body">
	                    <h4 class="media-heading"><strong>{{ $blog->user->full_name }}</strong></h4>
	                    <p class="time">{{ $blog->created_at->format('F d, Y') }}</p>
	                  </div>
	              </div>
	            </div>
							<div class="float-right arrow-ab">
								<span class="news-votes">{{ $blog->total_votes }}</span>
								<a href="#" data-value="-1" data-id="{{ $blog->id }}" class="{{ !$blog->hasVoted(-1) ?'':'voted' }} btn-vote arrow-down" rel="nofollow">
									<i class="fa fa-arrow-down" aria-hidden="true"></i>
								</a>
								<a href="#" data-value="1" data-id="{{ $blog->id }}" class="{{ !$blog->hasVoted(1) ?'':'voted' }} btn-vote arrow-up" rel="nofollow">
									<i class="fa fa-arrow-up" aria-hidden="true"></i>
								</a>
	            </div>
	            <p class="title"><a href="/community/blogs/{{ $blog->hashed_id }}">{{ $blog->title }}</a></p>
	            <div class="content">{!! see_more($blog->content, $blog->hashed_id, 'blogs') !!}</div>
	            <div class="socialicons">
	              <span>Share</span>
								<a class="fb fb-sharer" data-href="/community/blogs/{{ $blog->hashed_id }}" href="javascript: void(0);">
									<i class="fa fa-facebook-square" aria-hidden="true"></i>
								</a>
								<a href="javascript: void(0)" class="twit-sharer twit" data-text="{{ $blog->title }}" data-href="/community/blogs/{{ $blog->hashed_id }}">
									<i class="fa fa-twitter-square" aria-hidden="true"></i>
								</a>
								@if ( auth()->check() && auth()->user()->id == $blog->user_id )
								<div class="pull-right">
									<a href="#edit-blog" data-toggle="modal" data-id="{{ $blog->id }}" title="Edit" class="btn btn-xs btn-success">
										<i class="fa fa-pencil"></i>
									</a>
									<form action="/community/blogs/{{ $blog->id }}" method="post" style="display: inline-block">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="_method" value="delete">
										<button type="submit" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-times"></i></button>
									</form>
								</div>
								@endif
	            </div>
	          </div>
						@endforeach

	        </div>
				</div>
			</div>

    </div>
  </div>
@endsection

@section('scripts')
@include('main.partials.scripts.sidebar')
<script type="text/javascript" src="/assets/js/sharer.js"></script>
<script type="text/javascript" src="/assets/js/blogs.js"></script>
<script type="text/javascript">
$(function() {
	blog.init();
	share.init();
});
</script>
@endsection
