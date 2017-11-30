<div class="col-md-10 col-md-offset-1 step-parent">
	<h3 class="text-center">{!! trans('quote.step0.3.county') !!}</h3>
	<div class="form-group counties-container text-center" data-toggle="buttons">

	</div>
</div>

<div id="county_template" style="display: none;">
	<label data-city="" data-state="" onclick="plan.gotoStep('1_1',true,true,'0_1','1'); plan.scrollTop();" class="cp-step-county btn btn-lg btn-default cp-btn-checkbox">
		<input type="radio" name="county" autocomplete="off">
		<span class="county-title"></span>
		<p class="small show-cond" style="display: none;">
			
			<span class="county-state-abbr"></span>
			<span class="hidden county-zip"></span>
			<span class="hidden rating-area"></span>
		</p>
		<i class="fa pull-right fa-check-square-o"></i>
	</label>
</div>
