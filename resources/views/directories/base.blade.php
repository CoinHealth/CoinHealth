@extends('partials.base')

@push('styles')
    <link href="/css/app.css" rel="stylesheet">
@endpush

@section('content')
    @include('main.partials.sidebar')
    <div class='row'>
        @yield('content.inner')
    </div>
@endsection
