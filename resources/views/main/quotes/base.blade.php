@extends('main.partials.base')

@section('content')
@include('main.quotes.partials.nav')
<div style="margin-top:50px;">
	@yield('content.inner')
</div>
@endsection