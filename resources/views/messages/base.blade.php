@extends('partials.base')
@push('styles')
	<link rel="stylesheet" href="/css/profile.css">
@endpush
@section('content')
	<div class="new-profile-container container">

		<div class="row content-row">
			<div class="clear"></div>
			<div class="col-md-3 sidebar-column">
				@include('profile.partials.sidebar')
			</div>

			<div class="col-md-9 content-column">
				@yield('content.inner')
			</div>
		</div>
	</div>
@endsection
