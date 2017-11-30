@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/income.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="income-container" style="margin-top: 120px">
	<div class="container">
		<div class="row">
			<div class="calculators-container col-md-12" style="display:none;">
				<ul class="nav nav-tabs nav-justified" role="tablist" id= "cal_btn">
				  <li role="presentation" class="active"><a href="#basic_calculator" aria-controls="basic" role="tab" data-toggle="tab">{!! trans('income-calculator.basic') !!}</a></li>
				  <li role="presentation"><a href="#advanced_calculator" aria-controls="advanced" role="tab" data-toggle="tab">{!! trans('income-calculator.advanced') !!}</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="basic_calculator">
						@include('main.quote-engine.partials.step1.partials.basic')
					</div>
					<div role="tabpanel" class="tab-pane" id="advanced_calculator">
						@include('main.quote-engine.partials.step1.partials.advanced')
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="back-a">
				<a href="/careconnect"><img src="/assets/icons/back.png" alt=""></a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src='/assets/js/calculate_income.js'></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
	income.init();
	income.openBasicCalculator();

</script>
@endsection
