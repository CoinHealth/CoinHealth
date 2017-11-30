<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Name:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p>{{ auth()->user()->full_name }}</p>
    </div>
</div>
{{-- settings information --}}
@if(auth()->user()->purpose == 1 )
    @include('profile.partials.types.patient2')
@elseif(auth()->user()->purpose == 2 || auth()->user()->purpose == 4)
    @include('profile.partials.types.provider')
@elseif(auth()->user()->purpose == 3)
    @include('profile.partials.types.agents')
@endif

{{-- billing card info --}}
@if ( auth()->user()->is_subscriber && !$user->isPatient())
    @include('profile.partials.subscription')
@endif
