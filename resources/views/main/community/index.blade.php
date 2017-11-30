@extends('main.community.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/community.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection



@section('content.inner')
	@include('main.community.modal-community')
	<div class="main-header">
		<div class='main-cp-icon col-xs-12'>
			<a href="/">
				<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
			</a>
		</div>
	</div>
	@include('main.partials.sidebar')
	<div class="careconnect-container">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="agents-p">
						<span class="white">Stay informed.</span> <span class="agent">Be involved.</span>
					</p>
					<div class="btn-go btn-view btn-center" style="margin-top: 30px;">
						<a href="/community/public-chat">Lets Chat</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="carelist-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 nopadding">
					<div class="calculator">
						<a href="/community/carecommunity"><img src="/assets/icons/ccom1.png" alt="" class="icon-care"></a>
						<div class="title">
							Forums
						</div>
						<div class="desc">
							 A simple hello could lead to
							a million things.
							Lets stay connected.
						</div>
						<div class="btn-go">
							<a href="/community/forums">{!! trans('careconnect.go') !!}</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 nopadding">
					<div class="doctor">
						<a href="/news"><img src="/assets/icons/ccom2.png" alt="" class="icon-care"></a>
						<div class="title">
							News
						</div>
						<div class="desc">
							Reading is to the mind,
							what exercise is to the body.
						</div>
						<div class="btn-go">
							<a href="/community/news">News</a>
							&nbsp;
							<a href="/community/blogs">Blogs</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 nopadding">
					<div class="rx">
						<a href="#social-modal" data-toggle="modal">
							<img src="/assets/icons/ccom3.png" alt="" class="icon-care">
						</a>
						<div class="title">
							Social
						</div>
						<div class="desc">
							Healthcare isn't just about getting
							the right coverage. Its also getting
							connected with the right people.
						</div>
						<div class="btn-go">
							<a href="#social-modal" data-toggle="modal">{!! trans('careconnect.go') !!}</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 nopadding">
					<div class="help">
						<a href="/community/gameon"><img src="/assets/icons/ccom4.png" alt="" class="icon-care"></a>
						<div class="title">
							Points and badges
						</div>
						<div class="desc">
							Help us build the CareCommunity
							and be rewarded in more ways
							than one.
						</div>
						<div class="btn-go">
							<a href="/community/gameon">{!! trans('careconnect.go') !!}</a>
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
