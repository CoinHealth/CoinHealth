<div class="col-md-10 col-md-offset-1 step-parent">
	<div class="form-group">
		<input class="form-control text-center unstyled-input" type="text" placeholder="Employer Name" name="employee_name" id="employee_name" />
		<label class="cp-label" for="employee_name">Employer name</label>
	</div>
	<div class="form-group citizenship btn-solo" data-toggle="buttons">
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" class="input-citizenship" value="1" name="citizenship" id="citizenship_us" autocomplete="off"> U.S. Citizen
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" class="input-citizenship" value="2" name="citizenship" id="citizenship_naturalized" autocomplete="off"> Resident
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" class="input-citizenship" value="3" name="citizenship" id="citizenship_not" autocomplete="off"> Non-Resident
		</label>
		<div class="cp-divider">
			<label class="cp-label">Citizenship</label>
		</div>
	</div>
	<div class='immigration-container' style='display: none;'>
		<div class="form-group">
			<input class="form-control text-center  for-resident unstyled-input" type="text" placeholder="Alien No." name="alien_no" id="alien_no" />
		</div>
		<div class="form-group btn-solo" data-toggle="buttons">
			<label class="btn btn-default cp-btn-checkbox">
				<input type="radio" name="immigration" id="immigration_passport" autocomplete="off"> Passport
			</label>
			<label class="for-resident btn btn-default cp-btn-checkbox">
				<input type="radio" name="immigration" id="immigration_greencard" autocomplete="off"> Green card
			</label>
			<label class="btn btn-default for-non-resident cp-btn-checkbox">
				<input type="radio" name="immigration" id="immigration_visa" autocomplete="off"> Visa
			</label>
			<label class="btn btn-default cp-btn-checkbox">
				<input type="radio" name="immigration" id="immigration_resident" autocomplete="off"> Resident
			</label>
			<div class="cp-divider">
				<label class="cp-label" for="">Immigration or Naturalization Document	</label>
			</div>
		</div>
	</div>
	<div class="form-group btn-solo" data-toggle="buttons">
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="coverage" id="coverage_none" autocomplete="off"> None
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="coverage" id="coverage_currently" autocomplete="off"> Currently have coverage
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="coverage" id="coverage_medicaid" autocomplete="off"> Medicaid
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="coverage" id="coverage_chip" autocomplete="off"> CHIP
		</label>
		<div class="cp-divider">
			<label class="cp-label" for="">Existing Coverage</label>
		</div>
	</div>
	<div class="form-group">
		
		<label for="authorize_insurance" style="">
			<input type="checkbox" name="authorize_insurance" checked id="authorize_insurance"> 
			Make CareParrot my authorized insurance representative on my
			<br> existing policy and sync policy info with my CareParrot account.
		</label>
	</div>
	<div class="form-group">
		<label for="insurer">Insurer</label>
		<input type="text" class='text-center' name="insurer" id="insurer" placeholder="Insurer No." />

		<label for="policy" style="margin-left:15px;">Policy</label>
		<input type="text" class='text-center' name="policy" id="policy" placeholder="Policy No." />
	</div>

	<button type="button" onclick="quote.gotoStepBtn(2);" class="btn btn-success">Next</button>

</div>