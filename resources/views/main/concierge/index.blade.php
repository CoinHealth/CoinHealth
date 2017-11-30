@extends('main.concierge.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/rx/chat.css">
<link rel="stylesheet" href="/assets/css/rx/history.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div id="concierge">
	<div class="container chat-container">

		<div class="row chat-row">
			<div class="col-md-12">

				<div class="steps step-1">
				    @include('main.concierge.partials.chat.1')
				</div>

				<div class="clear"></div>

                <div class="answers answer-1">
                    @include('main.concierge.templates.chat.1')
                </div>

				<div class="clear"></div>

                <div class="steps step-2">
				    @include('main.concierge.partials.chat.2')
				</div>

				<div class="clear"></div>

                <div class="answers answer-2">
                    @include('main.concierge.templates.chat.2')
                </div>

				<div class="clear"></div>

                <div class="steps step-3">
				    @include('main.concierge.partials.chat.3')
				</div>

				<div class="clear"></div>

                <div class="answers answer-3">
                    @include('main.concierge.templates.chat.3')
                </div>

				<div class="clear"></div>

                <div class="steps step-4">
				    @include('main.concierge.partials.chat.4')
				</div>

			</div>
		</div>
	</div>

	<div class="histories-container" style="display:none;">
		<div class="histories history-1">
			@include('main.concierge.partials.histories.1')
		</div>
		<div class="histories history-2" style="display: none;">
			@include('main.concierge.partials.histories.2')
		</div>
		<div class="histories history-3" style="display: none;">
			@include('main.concierge.partials.histories.3')
		</div>
		<div class="histories history-4" style="display: none;">
			@include('main.concierge.partials.histories.4')
		</div>
		<div class="histories history-5" style="display: none;">
			@include('main.concierge.partials.histories.5')
		</div>
		<div class="histories history-6" style="display: none;">
			@include('main.concierge.partials.histories.6')
		</div>
		<div class="histories history-7" style="display: none;">
			@include('main.concierge.partials.histories.7')
		</div>
		<div class="histories history-8" style="display: none;">
			@include('main.concierge.partials.histories.8')
		</div>
		<div class="histories history-9" style="display: none;">
			@include('main.concierge.partials.histories.9')
		</div>
		<div class="histories history-10" style="display: none;">
			@include('main.concierge.partials.histories.10') {{-- it should be a summary --}}
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="/assets/js/vendor/vue/dist/vue.js"></script>
<script src="/assets/js/concierge.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript" src="/assets/js/rangeslider.js"></script>
<script src="/assets/js/triage.js"></script>
<script type="text/javascript">
	sidebar.init();
    triage.init();
</script>
@endsection
