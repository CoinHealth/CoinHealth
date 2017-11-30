@extends('main.news.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/news-blog.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
	<div class="news-container">
		<a href="/news">
			<div class="div-yellow">
				<div class="container">
					<div class="col-md-12">
						<div class="media">
							<div class="media-left media-middle">
								<p class="title-media">News | Blog</p>
							</div>
							<div class="media-body">
								<p>
									BE INFORMED WITH THE <br>LATEST HEALTH NEWS.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="container">
			@foreach(array_chunk($news, 3, true) as $column)
				<div class="row">
					@foreach($column as $_news)

						<div class="col-md-4">
							<div class="user-blog">
								<a href="/news/view/?url={{ $_news->url }}">
									<div class="media">
										<div class="media-body">
											<h4 class="media-heading">
												{{ $_news->title }}
											</h4>
											<p class="date">2 days ago</p>
										</div>
									</div>
									<p class="desc">
										{{ $_news->description }}
									</p>
								</a>
								<p>
									<a href="/news/news-single" class="read">Read</a>
								</p>
								<p class="social pull-right">
									<a href="javascript:void(0);" class="comment" data-toggle="modal" data-target="#myModal">
										comment
									</a>
									 | share:
									<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</p>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach

			<div class="row">
				<div class="next">
					<a href="">
						Next
					</a>
				</div>
				<div class="back-a">
					<a href="/news">
						<img src="/assets/icons/back.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<img src="/assets/icons/user-news.png" alt="">
					<span>JOHN SMITH</span>
				</div>
				<div class="modal-body">
					<textarea name="" id="" rows="10" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Post</button>
				</div>
			</div>
		</div>
	</div>
  @include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
