@extends('main.partials.base')

@section('content')
    @include('main.partials.sidebar')

    <div class="main-header row">
        <div class='main-cp-icon col-xs-12'>
            <a href="/">
                <img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
            </a>
        </div>
    </div>
    <div class='row'>
        @yield('content.inner')
    </div>
@endsection

@push('scripts2')
<script src="/assets/js/apis/login.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script>
	sidebar.init();
</script>
@endpush
