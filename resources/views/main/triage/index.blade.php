@extends('main.triage.base')

@section('styles')
    <link rel="stylesheet" href="/assets/css/sidebar.css">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <link rel="stylesheet" href="/assets/css/carenow/search.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
    <div class="col-md-12" id="triage">
        <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
        @include('modals.authenticate')
        @include('main.careconnect.carenow.modal.doctor-single')
        @include('main.careconnect.carenow.modal.medications-single')
        @include('main.careconnect.carenow.modal.facility-single')
        @include('main.careconnect.carenow.modal.conditions-modal')
        @include('main.careconnect.carenow.modal.causes-modal')

        <input type="hidden" v-model="searchCategory">
        <ul class="tab-view">
            <li></li>
            <li class="pull-right">
                <a href="https://algolia.com" target="_blank" class="powered-by-algolia">
                    <span>Powered by </span>
                    <img src="/assets/icons/powered-by-algolia/Algolia_logo_bg-white.png" alt="Powered by Algolia">
                </a>
            </li>
        </ul>
        <div class="form-input" id="affixed-search">
            <div class="input-group triage-search">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span v-text="searchCategory"></span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a @click.prevent="setCategory('Condition')" href="#">Condition</a>
                        </li>
                        <li>
                            <a @click.prevent="setCategory('Symptom')" href="#">Symptom</a>
                        </li>
                        <li>
                            <a @click.prevent="setCategory('Medication')" href="#">Medication</a>
                        </li>
                    </ul>
                </div>
                <a href="#" @click.prevent="clear()" type="button" class="clear">&times;</a>
                <input v-model="searchInput" v-on:input="input" placeholder="type {{ isset($category) ? $category : 'anything' }}" type="text" class="search-input form-control">
            </div>
        </div>

        @include('main.triage.partials.ul-list')

        <div role="tabpanel" class="fade in tab-pane active" id="tab-search">
            <div class="search-container">
                @include('main.triage.partials.search')
            </div>
        </div>
    </div>
@endsection

@push('scripts2')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearchLite.min.js"></script>
    <script src="/assets/js/vendor/vue/dist/vue.js"></script>
    <script src="/assets/js/vendor/vue-infinite-scroll/vue-infinite-scroll.js"></script>
    <script src="/assets/js/vue/triage/components.js"></script>
    <script src="/assets/js/jquery-scrollto.js"></script>
    <script src="/assets/js/triageSearch.js"></script>
    <script>
    $('.slide-btn').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
    </script>
@endpush
