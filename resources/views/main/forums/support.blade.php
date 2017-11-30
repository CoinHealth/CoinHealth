@extends('main.forums.base')

@section('styles')
  <link rel="stylesheet" href="/assets/css/sidebar.css">

  {{-- badge --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor/badge/dialog-jim.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/badge.css">
  {{-- badge --}}
  <link rel="stylesheet" href="/assets/css/forums.css">
@endsection

@section('content.inner')
  @include('main.partials.sidebar')

  @if (session()->has('action'))
    @include('main.forums.thread')
  @endif
  <input type="hidden" class="badge" value="{{ session()->get('Badge') }}" id="Badge">
  <input type="hidden" class="badge" value="{{ session()->get('LeveledUp') }}" id="LeveledUp">
  <input type="hidden" class="badge" value="{{ session()->get('BadgeIcon') }}" id="badgeIcon">
	<div class="col-md-9">
    <button type="button" class="btn btn-new-thread btn-green" data-toggle="modal" data-target="#new-thread">Create Thread</button>
	  <h4 class="topic-header">Support</h4>
    <div class="col-md-12">
      @if ($topics->hasMorePages())
      <div class="pages-wrapper">
        <span>Pages</span> {!! $topics->render() !!}
      </div>
      @endif
      <div class="row">
        @foreach ($topics as $topic)
        @include('main.forums.partials.topic-list')
        @endforeach
      </div>
    </div>
	</div>
  @if ($leaderboards->count())
  <div class="col-md-3">
    @include('main.forums.leaderboard')
  </div>
  @endif
  @include('main.partials.badge')
@endsection

@section('scripts')
  @include('main.partials.scripts.sidebar')
  
  @include('partials.badges')
  <script src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/js/forums.js"></script>
  <script type="text/javascript">
    forum.init();
  </script>
@endsection
