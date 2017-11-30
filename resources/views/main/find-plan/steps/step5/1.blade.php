<div class="col-md-12 step-parent">
	<div class="row">
		<div class="col-md-10 col-md-push-1">
			<div class="panel-group" id="applicants-panel">
			</div>
		</div>
	</div>
</div>

<div class="applicant-footer">
	<div class="container container-footer-small">
		<div class="row text-center">
			<button type="button" class="btn btn-primary applicant-btns btn-add-spouse" data-value="My Spouse">{!! trans('quote.step5.1.add_spouse') !!}</button>
			<button type="button" class="btn btn-primary applicant-btns btn-add-dependent" data-value="Dependent">{!! trans('quote.step5.1.add_dependent') !!}</button>
			<button onclick="plan.gotoStep('5_2', true, false);" class="nextBtn btn btn-success" type="button">{!! trans('quote.continue') !!}</button>
		</div>
	</div>
	<div class="container container-footer-big hidden">
	<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 left">
					<button type="button" class="btn btn-success applicant-btns btn-add-spouse">{!! trans('quote.step5.1.add_spouse') !!}</button>
					<button type="button" class="btn btn-success applicant-btns btn-add-dependent">{!! trans('quote.step5.1.add_dependent') !!}</button>
				</div>
				<div class="col-md-6 right text-left">
					<p>
						{!! trans('quote.step5.1.include_household') !!}
					</p>
				</div>
			</div>
		</div>
		<div class="row row-continue">
			<div class="col-md-12">
				<div class="form-group text-center">
					<button onclick="plan.gotoStep('5_2', true, false); plan.scrollTop();" class="nextBtn btn btn-success" id="gotoAdditionalInfo" type="button">{!! trans('quote.continue') !!}</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="application-template" style="display:none;">
	@include('main.find-plan.partials.templates.application-template')
</div>
<!-- note 5_3 should be 5_2 skip additional information in quotes for now -->
