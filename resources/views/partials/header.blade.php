<!doctype html>
<html>
<head>
	<!-- Begin DigiCert site seal JavaScript code -->
	@include('partials.includes.digicert')
    <!-- End DigiCert site seal JavaScript code -->
	<meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logo-colored.png">
    <link rel='stylesheet' href='/assets/css/modal.css' />
    <link rel="stylesheet" href="/css/gamification.css">

    @stack('og')
    @stack('styles')

    {{-- Laravel configurations --}}
    @include('partials.includes.laravel')
</head>
<body>
	@stack('modals')
	<div class="container-fluid">
		@include('main.partials.transparent-navbar')
        @include('gamification.partials.modal')
