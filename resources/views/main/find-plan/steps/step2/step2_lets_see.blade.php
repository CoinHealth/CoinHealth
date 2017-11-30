<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="eligible-checkpoint-container">
			<div class="col-md-10 col-md-push-1 left">
				<h4>{!! trans('quote.step2.step2_lets_see.lets_see') !!}</h4>
				<p>{!! trans('quote.step2.step2_lets_see.household_size_desc') !!}</p>
				<div class="row" style="margin-top:20px;">
					<div class="col-md-6 col-md-push-3 text-left">
						<div class="form-group" data-title="this is a required field">
							<label for="household-income">{!! trans('quote.step2.step2_lets_see.household_size') !!}</label>
							<select name="household_size" id="household_size" class="form-control"></select>

						</div>
						<div class="form-group" data-title="this is a required field">
							<label for="household-income">{!! trans('quote.step2.step2_lets_see.expected_income') !!} {{ date('Y') }}
								<i class="fa fa-question-circle text-info"  data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="{!! trans('quote.step2.step2_lets_see.gross_income') !!}"></i>
							</label>
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" name="household_income" class="monetary form-control" id="household-income">
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<div class="form-group text-center">
										<label class="text-cyan" id="open_calculator">{!! trans('quote.step2.step2_lets_see.need_help') !!}</label>
									</div>
								</div>
								<div class="calculators-container col-md-12" style="display:none;">
									<ul class="nav nav-tabs nav-justified" role="tablist" id= "cal_btn">
									  <li role="presentation" class="active"><a href="#basic_calculator" aria-controls="basic" role="tab" data-toggle="tab">{!! trans('quote.step2.step2_lets_see.basic') !!}</a></li>
									  <li role="presentation"><a href="#advanced_calculator" aria-controls="advanced" role="tab" data-toggle="tab">{!! trans('quote.step2.step2_lets_see.advanced') !!}</a></li>
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
						</div>
					</div>

					<div class="col-md-12 text-center">
						<button type="button" onclick="plan.scrollTop();" class="btnEligibility btn btn-success">{!! trans('quote.step2.step2_lets_see.cp_work') !!}</button>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-4 right"></div> -->
		</div>
		<div class="col-md-12 eligibility-status-container">
			{{-- eligibility status --}}
		</div>

	</div>
</div>

{{---------------- templates  ----------}}
{{-- assistance-people-template --}}
<div class="assistance-people-template" style="display:none;">
	@include('main.find-plan.templates.assistance-people')
</div>
{{-- disqualified-qualified-template --}}
<div class="disqualified-qualified-template" style="display:none;">
	@include('main.find-plan.templates.disqualified-qualified')
</div>
{{-- disqualified-template --}}
<div class="disqualified-template" style="display:none;">
	@include('.main.find-plan.templates.disqualified')
</div>
{{-- too-low-income --}}
<div class="too-low-template" style="display:none;">
	@include('main.find-plan.templates.too-low')
</div>
{{-- too-high-income --}}
<div class="too-high-template" style="display:none;">
	@include('main.find-plan.templates.too-high')
</div>
{{-- qualified-template --}}
<div class="qualified-template" style="display:none">
	@include('main.find-plan.templates.qualified')
</div>
{{-- state-not-supported --}}
<div class="state-not-supported-template" style="display:none">
	@include('main.find-plan.templates.state-not-supported')
</div>
