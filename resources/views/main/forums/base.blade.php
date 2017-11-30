@extends('main.partials.base')

@section('content')

@include('main.forums.partials.header')
<div class='row wrapper'>
	<div class="" style="margin-top: 50px;">
		@yield('content.inner')
	</div>
</div>
@include('main.forums.new-thread')
@endsection
