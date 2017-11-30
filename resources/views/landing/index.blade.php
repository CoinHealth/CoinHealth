@extends('partials.base')

@push('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel='stylesheet' href='/assets/css/newsidebar.css' />
    <link rel='stylesheet' href='/assets/css/modal.css' />
    <link rel="stylesheet" href="/css/app.css">
    <link rel='stylesheet' href='/css/landing.css' />
    <link rel='stylesheet' href='/assets/css/animate.css' />
    <link rel="stylesheet" href="/assets/css/vendor/jquery-fullPage/jquery.fullpage.min.css" />
@endpush


@section('content')
    @include('main.landing.partials.sidebar')
    @include('main.partials.zoom')

    <div class="slide-btn">
    	<i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
    </div>

   <!--  @include('modals.landing.welcome') -->
    @include('modals.landing.pricing')
    <div id="main">
    	<subscribe :type="type"></subscribe>
        <div class="section" id="section-1" data-anchor="section1">
            @include('main.landing.sections.1')
        </div>

        <div class="section" id="section-5" data-anchor="section5">
            @include('main.landing.sections.5')
        </div>

        <div class="section" id="section-3" data-anchor="section3">
            @include('main.landing.sections.3')
        </div>

        @if (auth()->check() && !auth()->user()->isEhrCapable())
            @include('main.landing.sections.4-crm')
        @else
            @include('main.landing.sections.4-ehr')
        @endif

        <div class="section" id="section-2" data-anchor="section2">
            @include('main.landing.sections.2')
        </div>
    </div>
@endsection

@push('scripts')
    <script src='/assets/js/vendor/jquery-fullPage/jquery.fullpage.js'></script>
    <script src="/assets/js/scrollreveal.min.js"></script>
    <script src="/js/landing.js"></script>
@endpush
