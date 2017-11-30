@extends('main.profile2.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/profile2.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')

<div class="timeline-post-template" style="display:none">
	@include('main.profile2.templates.timeline')
</div>
<div class="timeline-reply-template" style="display:none">
	@include('main.profile2.templates.timeline-reply')
</div>

@include('main.profile2.partials.edit-modal')

<div class="badges-container">
	<p class="title">Badges</p>
	<div class="row badges-row">
		@if (!$user->badges()->count())
			<p>No Badge</p>
		@endif
		@foreach($user->badges as $badge)
			@include('main.profile2.templates.badge')
		@endforeach
	</div>
</div>
{{-- 
<div class="new-post-container">
	<form action="/timeline" method="post">
		<div class="form-group post-input">
			<textarea name="description" required id="" rows="4" class="noresize-v form-control" placeholder="Write a post.."></textarea>
		</div>
		<div class="form-group text-right">
			<button type="button" class="btn-post btn btn-info btn-sm">Post</button>
		</div>
	</form>
</div> --}}



@endsection

@section('scripts')
@include('main.partials.scripts.sidebar')
@endsection
