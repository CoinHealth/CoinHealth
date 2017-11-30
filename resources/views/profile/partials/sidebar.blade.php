<div class="text-center" id="sidebar">

	<!-- <img src="/assets/icons/loading.svg"> -->

	<upload-photo image-src="{{ auth()->user()->avatar_path }}"></upload-photo>

	<h1 class="name">
		{{ auth()->user()->full_name }}
	</h1>
	@if (auth()->user()->subscribed('crm') && !auth()->user()->subscription('crm')->cancelled())
	<div class="plan">{{ auth()->user()->subscription('crm')->stripe_plan }}</div>
	@endif

	<p class="status">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
		<span class="joined">Joined</span>
		<span class="date">{{ auth()->user()->created_at->format("F j, Y") }}</span>
    </p>

	<div class="row">
		<div class="col-md-10 col-centered div-buttons">
			<a href="/profile" class="btn-orange">Dashboard</a>
			<a href="/team-builder" class="btn-orange">Team Builder</a>

			@if(auth()->user()->purpose == 1)
				<a href="/profile/medical" class="btn-orange">Medical</a>
				<a href="/profile/coverage" class="btn-orange">Coverage</a>
				<a href="/profile/directory" class="btn-orange">Directories</a>
			@elseif(auth()->user()->purpose == 2 || auth()->user()->purpose == 4)
				@if (auth()->user()->subscribed('ehr') && !auth()->user()->subscription('ehr')->cancelled())
				<a href="/profile/patients" class="btn-orange">Patients</a>
				<a href="/profile/appointments" class="btn-orange">Appointments</a>
				<a href="/profile/staff" class="btn-orange">Staff</a>
				<a href="/profile/leads" class="btn-orange">Leads</a>
				<a href="/profile/payments" class="btn-orange">Billing</a>
				@else
				<a href="/profile/leads" class="btn-orange">Leads</a>
				@endif
			@elseif(auth()->user()->purpose == 3)
				@if (auth()->user()->subscribed('crm') && !auth()->user()->subscription('crm')->cancelled())
					<a href="/profile" class="btn-orange">Leads</a>
					<a href="/profile" class="btn-orange">Clients</a>
					<a href="/profile" class="btn-orange">Task</a>
					<a href="/profile" class="btn-orange">Calendar</a>
				@endif
			@endif
			<a href="/home/contact" target="_blank" class="btn-orange">CareParrot Help</a>
			<a href="/profile/leaderboards" class="btn-orange">Leaderboard</a>
		</div>
	</div>

	<div class="row rating">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">0</span>
                <span class="cat">Followers</span>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">0</span>
                <span class="cat">Following</span>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <p class="rate">
                <span class="num">{{ auth()->user()->points->sum('point') }}</span>
                <span class="cat">CP Points</span>
            </p>
        </div>
    </div>
</div>

@push('scripts')
	<script src="/js/sidebar.js"></script>
@endpush
