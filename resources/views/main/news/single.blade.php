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
		{{-- <p>
			Page 1 of 4
		</p> --}}
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
				<p>{{ $header->text() }}</p>
			</div>
			<div class="content">
				<?php echo $body ?>
			</div>
		</div>
		<div class="col-md-12">
			<p class="source">Source: <a href="{{ $source }}" target="_blank" class="btn btn-link">{{ $source }}</a></p>
		</div>
	</div>

	{{-- <div class="row">
		<div class="helpful">
			<p class="title-help">
				Was this article helpful?
			</p>
			<div class="col-md-offset-4 col-md-2">
				<a href="" class="btn btn-success form-control">Yes</a>
			</div>
			<div class="col-md-2">
				<a href="" class="btn btn-danger form-control">No</a>
			</div>
		</div>
	</div> --}}

</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
