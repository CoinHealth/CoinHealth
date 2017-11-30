@extends('main.partials.base')

@section('content')

@include('main.partials.transparent-navbar')

<div class="new-profile-container container">
  @include('main.profile2.partials.header')
  <div class="row">

    <div class="col-md-3 profile-sidebar">
      @include('main.profile2.partials.sidebar')
    </div>

    <div class="col-md-9">
      @yield('content.inner')
    </div>

  </div>
</div>

@include('main.profile2.partials.footer-fixed')

@endsection
