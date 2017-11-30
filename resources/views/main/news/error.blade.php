@extends('main.news.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/single.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class="container">
	<div class="pagestatus">
		<div class="back">
			<a href="/news/news-blog">Back</a>
		</div>
	</div>
</div>
<div class="news-container"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="title">
			</div>
			<div class="content">

			</div>
		</div>
		<div class="col-md-12" style="margin: 20px;">
      <div class="alert alert-danger">
        <h4>Sorry, the page that you were trying to access is currently not available.</h4>
        <p>Please click <a href="/news/news-blog">here</a> to go back.</p>
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
