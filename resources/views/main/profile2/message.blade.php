@extends('main.profile2.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">
	<link rel="stylesheet" href="/assets/css/profile2.css">
	<link rel="stylesheet" href="/assets/css/messages.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
<div class="row">
  <div class="col-md-4 col-xs-3 messages-users-wrapper">
    <div class="message-new-wrapper">
      <p class="messages-header">Threads</p>
      <a href="/profile/messages/new" type="button" class="pull-right btn btn-sm new-thread-btn"><span class="fa fa-plus"></span> New</a>
    </div>
    <div class="message-list-container" id="message-list-container-desktop">
      @if ($threads->count())
      @foreach($threads as $_thread)
        @include('main.profile2.templates.message-list')
      @endforeach
      @endif
    </div>
  </div>
  <div class="col-md-8 col-xs-9 messages-body-wrapper">
    @if (isset($base) && $base == 'new')
      @include('main.newprofile.partials.new-message')
    @else
      @if ($thread)
        <div class="messages-container" id="messages-container-desktop">
        @foreach($thread->replies as $reply)
          @include('main.newprofile.partials.templates.message-bubble')
        @endforeach
        </div>
        @include('main.newprofile.partials.templates.new-reply')
      @endif
    @endif
  </div>
</div>

@endsection

@section('scripts')
@include('main.partials.scripts.sidebar')
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script>
	var pusher = new Pusher('{{ config("services.pusher.app_key") }}');
</script>
<script src="/assets/js/notify.js"></script>

@endsection
