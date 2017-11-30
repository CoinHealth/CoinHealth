@extends('main.forums.base')

@section('styles')
  <link rel="stylesheet" href="/assets/css/sidebar.css">
  <link rel="stylesheet" href="/assets/css/forums.css">
@endsection

@section('content.inner')
  @include('main.partials.sidebar')

  @if (session()->has('action'))
    @include('main.forums.thread')
  @endif
	<div class="col-md-9">
    <button type="button" class="btn btn-new-thread btn-green" data-toggle="modal" data-target="#new-thread">Create Thread</button>
	  <h4 class="topic-header">General Discussion</h4>
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
@endsection

@section('scripts')
  @include('main.partials.scripts.sidebar')
  <script src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/js/forums.js"></script>
  <script type="text/javascript">
  $(function() {
    forum.init();
    $('.pagination > li.disabled').remove();
  })
  </script>
@endsection
