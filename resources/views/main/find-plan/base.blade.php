@extends('main.partials.base')

@section('content')
@include('main.quotes.partials.nav')
<div style="margin-top:50px;" class="page-wrapper">
	@yield('content.inner')
</div>
<div class="col-md-12 disclaimer-row text-justify">
	<div class="disclaimer">
		<p dir="{{ session('locale') === 'ar' ? 'rtl' : 'ltr' }}">
			{!! trans('quote.disclaimer.attention') !!} <a target="_blank" href="/">Careparrot</a> {!! trans('quote.disclaimer.not_insurance') !!}
			{!! trans('quote.disclaimer.offer') !!} <a target="_blank" href="/">Careparrot</a> {!! trans('quote.disclaimer.comply_law') !!}
			{!! trans('quote.disclaimer.may_not_display') !!}
			{!! trans('quote.disclaimer.see_available') !!} <a target="_blank" href="http://www.healthcare.gov">HealthCare.gov</a>.
			Joseph Lowe NPN: 10411723 Ritchie-McIntosh Agency NPN 18106168, {!! trans('quote.disclaimer.read') !!} <a href="/about/privacy" target="_blank">{!! trans('quote.disclaimer.privacy') !!}</a>.
		</p>

	</div>
</div>
@include('partials.loader')
@endsection
