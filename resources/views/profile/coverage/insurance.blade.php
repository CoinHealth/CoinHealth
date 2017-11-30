@extends('profile.base')

@push('styles')
<link rel="stylesheet" href="/css/coverage.css">
@endpush

@section('content.inner')
    <div id="insurance-card" class="parent">
        <input id="cardFrontPath"
            type="hidden"
            value="{{ $coverage ? $coverage->cardFront->path : '' }}">
    	<div class="row">
    		<div class="col-md-12 top">
                <h2>
                    <a href="/profile/coverage">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    UPLOAD INSURANCE CARD
                </h2>
    		</div>
            <div class="col-md-12 middle">
                <card-picture
                    @card-uploaded="cardUploaded"
                    @card-removed="cardRemoved"
                    :prefill-path="cardFront">
                </card-picture>
            </div>
    	</div>
        <notifications :speed="200"
            position="left bottom"
            :duration="5000"/>
    </div>
@endsection

@push('scripts')
<script src="/js/coverage-insurance.js"></script>
@endpush
