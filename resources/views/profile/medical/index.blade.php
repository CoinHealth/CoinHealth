@extends('profile.base')

@section('content.inner')
<div id="medical">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">
                <span>Medical History</span>
            </h4>
            <div class="form-horizontal medical-form">
                <vitals :data="{}"></vitals>
                <problems :data="{}"></problems>
                <injuries :data="{}"></injuries>
                <allergies :data="{}"></allergies>
                <!-- <medications :data="{}"></medications> -->
                <family-history :data="{}"></family-history>
                <habits :data="{}"></habits>
                <diet :data="{}"></diet>
                <tobacco :data="{}"></tobacco>
                <caffeine :data="{}"></caffeine>
                <alcohol-drug :data="{}"></alcohol-drug>
                <abuse :data="{}"></abuse>
                <stress :data="{}"></stress>
                {{-- <surgeries :data="{}"></surgeries> --}}
                <questionnaire :data="{}"></questionnaire>
                <!-- person with disablities?? -->
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="/js/medical.js"></script>
@endpush
