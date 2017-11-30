<div class="col-md-12 step-parent text-center">
	<div class="row">

		<!-- <div class="col-md-4 left"></div> -->

		<div class="col-md-10 col-md-push-1">
			<div class="dependent-selector-container">
				<h3>{!! trans('quote.step1.1.who_needs') !!}</h3>
				<p>{!! trans('quote.step1.1.select') !!}</p>
				<div class="col-xs-12">
					<div class="three">
						<div class="who-needs-container">
							<label for="coverage1" class="active">
								<div class="inner cp-radio">
									<input id="coverage1" type="radio" class="hidden" name="coverage" value="1" checked="checked">
									<img src="/assets/icons/quotes/coverage1.png" alt="" class="img-responsive">
									<p>{!! trans('quote.step1.1.me') !!}</p>
								</div>
							</label>
						</div>
						<div class="who-needs-container">
							<label for="coverage2">
								<div class="inner cp-radio">
									<input id="coverage2" type="radio" class="hidden" name="coverage" value="2">
									<img src="/assets/icons/quotes/coverage2.png" alt="" class="img-responsive">
									<p>{!! trans('quote.step1.1.me_partner') !!}</p>
								</div>
							</label>
						</div>
						<div class="who-needs-container">
							<label for="coverage3">
								<div class="inner cp-radio">
									<input id="coverage3" type="radio" class="hidden" name="coverage" value="3">
									<img src="/assets/icons/quotes/coverage3.png" alt="" class="img-responsive">
									<p>{!! trans('quote.step1.1.whole_family') !!}</p>
								</div>
							</label>
						</div>
					</div>

					<div class="two">
						<div class="who-needs-container spacer"></div>
						<div class="who-needs-container">
							<label for="coverage4">
								<div class="inner cp-radio">
									<input id="coverage4" type="radio" class="hidden" name="coverage" value="4">
									<img src="/assets/icons/quotes/coverage4.png" alt="" class="img-responsive">
									<p>{!! trans('quote.step1.1.me_dependent') !!}</p>
								</div>
							</label>
						</div>
						<div class="who-needs-container">
							<label for="coverage5">
								<div class="inner cp-radio">
									<input id="coverage5" type="radio" class="hidden" name="coverage" value="5">
									<img src="/assets/icons/quotes/coverage5.png" alt="" class="img-responsive">
									<p>{!! trans('quote.step1.1.dependent_only') !!}</p>
								</div>
							</label>
						</div>
					</div>
				</div>
				<div class="dependent-addon-wrapper" style="display: none;">
					{{-- <div class="col-md-6 col-md-offset-3"> --}}
						<div class="form-group col-md-6 mt-dep col-md-offset-3" data-trigger="hover focus" data-title="This is a required field">
							<label for="dependent">{!! trans('quote.step1.1.dependent_number') !!}</label>
							<input type="text" class="form-control" maxlength="2" min="0" max="99" id="dependent" placeholder="">
						</div>
					{{-- </div> --}}
				</div>
				{{-- <div class="row"> --}}
						<div class="form-group mt col-md-12">
							<button type="button" class="coverage-btn btn btn-success">{!! trans('quote.continue') !!}</button>
						 </div>
				{{--</div> --}}
			</div>
			<div class="dependent-items-container col-md-8 col-md-offset-2" style="display: none;">

			</div>
			<div class="col-md-12 nextBtn-container mg-top-20" style="display: none;">
				<div class="form-group">
					<button type="button" onclick="plan.gotoStep('2_1',false,true,'1_1', '2'); plan.scrollTop();"class="nextBtn btn btn-success">{!! trans('quote.continue') !!}</button>
				</div>
			</div>
		</div>
	</div>
</div>
