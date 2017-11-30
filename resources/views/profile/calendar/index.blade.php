@extends('profile.base')
@section('content.inner')
<div id="calendar">
	<div class="row">
		<div class="col-md-12">
			<p class="category">Calendar</p>
		</div>
	</div>
	<div class="top-content">
        <div class="row">
            <div class="col-md-12">
                <full-calendar :events="cEvents" :header="cOptions.header" :default-view="cOptions.defaultView"></full-calendar>
            </div>
        </div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/calendar.js"></script>
@endpush
