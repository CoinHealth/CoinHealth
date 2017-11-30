<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="eligible-checkpoint-container">
			<div class="col-md-10 col-md-push-1 left">
				<h4>Let's see if you qualify for savings</h4>
				<p>Please tell us how many people are in your household along with what your expected 2016 total household income will be before taxes.</p>
				<div class="row" style="margin-top:20px;">
					{{--
					<div class="col-md-5 text-left">
						<div class="form-group">
							<label for="household-size">HOUSEHOLD SIZE <i class="fa fa-question-circle text-info" data-toggle="tooltip" data-placement="bottom" title="The number of people you put on your tax return, including yourself"></i></label>
							<select class="form-control" id="household-size" name="household-size">
								<option></option>
								@for($i=1;$i<=10;$i++)
								<option value="{{ $i }}">{{ $i }}</option>
								@endfor
							</select>
						</div>
					</div>
					--}}
					<div class="col-md-8 col-md-push-2 text-left">
						<div class="form-group">
							<label for="household-income">HOUSEHOLD INCOME <i class="fa fa-question-circle text-info"></i></label>
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" name="household-income" class="form-control" id="household-income" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="bottom" data-content="This is the modified adjust gross income for the household for 2016.We know this can be tricky - honest guesses are okay. We will help you estimate this later if you apply.">
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<div class="form-group">
										<label class="btn-link" id="open_calculator">Need help? Calculate your annual income here.</label>
									</div>
								</div>
								<div class="calculators-container col-md-12" style="display:none;">
									<ul class="nav nav-tabs nav-justified" role="tablist" id= "cal_btn">
									  <li role="presentation" class="active"><a href="#basic_calculator" aria-controls="basic" role="tab" data-toggle="tab">Basic</a></li>
									  <li role="presentation"><a href="#advanced_calculator" aria-controls="advanced" role="tab" data-toggle="tab">Advanced</a></li>
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
						<button type="button" class="btnEligibility btn btn-success">Continue</button>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-4 right"></div> -->
		</div>
		<div class="col-md-12 qualified" style="display: none;">
			<div class="row-eq-height">
				<div class="col-md-6 left text-right">
					<div class="wrapper">
						<h1 class="qualified-price">$236</h1>
						<p class="text-uppercase">Monthly household savings</p>
					</div>
				</div>
				<div class="col-md-6 right text-left">
					<div class="wrapper">
						<h3>You qualify for savings!</h3>
						<p>The government may pay this amout towards your monthly payments for 2016.</p>
						<p>
							Please note: If you are uninsured for 2 or more months during 2016, the government may fine you
							<span class="qualified-price"><b>$1,738 next year.</b></span>
							<small class="small qualified-amount-popover" style="color: red;" >`up to xxxx amount</small>
						</p>
					</div>
				</div>
			</div>
			<div class="row-eq-height">
				<div class="col-md-12 bottom">
					<div class="col-md-6 text-container text-right">
						<h3>You qualify for Cost Sharing Reduction</h3>
						<p>This means you pay less for doctors, hospitals and prescriptions, if</p>
						<p>you choose a Silver plan We'll highlight these special plans for you.</p>
					</div>
					<div class="col-md-6 logo-container text-left">
						<img src="/assets/icons/careparrot-logo.png" alt="" class="img-responsive">
					</div>
				</div>
			</div>
			<div class="col-md-12 mg-top-20">
				<div class="form-group">
					<button type="button" data-step="#step9_1" class="nextBtn btn btn-success">Continue</button>
				</div>
			</div>
		</div>
		<div class="col-md-12 disqualified" style="display: none;">
			<div class="row-eq-height">
				<div class="col-md-10 left text-justified">
					<h4>You and/or your family may qualify for other assistance</h4>
					<p>We.ve listed out the qualifications below. Submit an application to the Federal Government</p>
					<p>on Healthcare.gov to confirm your eligibility and get more information on how toget covered</p>
				</div>
				<div class="col-md-2 right"></div>
			</div>
			<div class="row-eq-height">
				<div class="col-md-8 col-xs-12 col-md-push-2 bottom">
					<h5 class="text-left">These People may qualify for Assistance</h5>
					<div class="row">
						<div class="col-md-6 inner-left text-left"><p>Me: 45</p></div>
						<div class="col-md-6 inner-right text-right"><p>May be Eligible for <b>AZ Medicaid</b></p></div>
						<div class="col-md-6 inner-left text-left"><p>Spouse: 45</p></div>
						<div class="col-md-6 inner-right text-right"><p>May be Eligible for <b>AZ Medicaid</b></p></div>
						<div class="col-md-6 inner-left text-left"><p>Dependent 1</p></div>
						<div class="col-md-6 inner-right text-right"><p>May be Eligible for <b>AZ Medicaid</b></p></div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mg-top-20">
				<div class="form-group">
					<button type="button" data-step="#step9_1" class="nextBtn btn btn-success">Continue</button>
				</div>
			</div>
		</div>


	</div>
</div>
