@extends('main.partials.base')

@section('content')
@include('main.partials.page-header2')
<div class='row'>
	@yield('content.inner')
</div>
@include('main.partials.page-footer')
@endsection