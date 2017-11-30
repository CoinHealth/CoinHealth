@extends('partials.base')

@push('styles')
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/gamification.css">
@endpush

@section('content')
	<div class="row" id="gamification">
		<div class="col-md-12 mt-100">
			<button class="btn btn-primary" data-toggle="modal" data-target="#modal-gamification">Open</button>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modal-questions">Open Question</button>
		</div>
	</div>
	@include('gamification.partials.modal')
	@include('gamification.partials.qa')
@endsection
