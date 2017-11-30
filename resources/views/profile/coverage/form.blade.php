@extends('profile.base')

@push('styles')
<link rel="stylesheet" href="/css/coverage.css">
@endpush

@section('content.inner')
    <div id="coverage-form" class="parent">
    	<div class="row">
    		<div class="col-md-12 top" v-cloak>
                <h2>
                    <a href="/profile/coverage" v-if="step == 1">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a href="#" @click.prevent.stop="step = 1"
                        v-else-if="step == 2">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a href="#" @click.prevent.stop="step = 2"
                        v-else-if="step == 3">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a href="#" @click.prevent.stop="step = 3"
                        v-else-if="step == 4">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a href="#" @click.prevent.stop="step = 4"
                        v-else-if="step == 5">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <span v-text="title"></span>
                </h2>
    		</div>
            <div class="col-md-12 middle" v-cloak>
                <transition name="popup" v-if="step == 1">
                    @include('profile.coverage.forms.step-1')
                </transition>
                <transition name="popup" v-else-if="step == 2">
                    @include('profile.coverage.forms.step-2')
                </transition>
                <transition name="popup" v-else-if="step == 3">
                    @include('profile.coverage.forms.step-3')
                </transition>
                <transition name="popup" v-else-if="step == 4">
                    @include('profile.coverage.forms.step-4')
                </transition>
                <transition name="popup" v-else-if="step == 5">
                    @include('profile.coverage.forms.step-5')
                </transition>

            </div>
    	</div>
        <notifications :speed="200"
            position="left bottom"
            :duration="5000"/>
    </div>
@endsection

@push('scripts')
<script src="/js/coverage-form.js"></script>
@endpush
