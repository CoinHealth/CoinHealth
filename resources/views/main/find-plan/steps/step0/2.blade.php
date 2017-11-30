<div class="col-md-10 col-md-offset-1 step-parent">
	<div class="col-md-6 col-md-offset-3">
		<h3 class="text-center">{!! trans('quote.step0.2.enter_zipcode') !!}</h3>
		<div class="form-group scrollable-dropdown-menu" id="zip_code_typeahead" data-trigger="hover focus" title="Invalid Zip code">
			<input type="text" name="zip_code" maxlength="5" placeholder="Zip Code" id="zip_code" class="form-control" autocomplete="off">
			<input type="hidden" id="zip_code_hidden">
		</div>
		<div class="form-group text-center">
			<button onclick="plan.gotoStep('0_3'); plan.scrollTop();" class="nextBtn btn btn-success" type="button">{!! trans('quote.continue') !!}</button>
		</div>
	</div>
</div>
