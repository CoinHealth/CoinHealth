<div class="col-md-10 col-md-offset-1 step-parent">
	<div class="coverage-container">
		<h4>For Me Only (Male)</h4>
		<div class='icon-container text-center'>
			
		</div>
	</div>
	<div class='form-group'>
		<input type='text' name="employee_name" class='text-center form-control unstyled-input' placeholder='Name' id='step4_name'>
		<label for="step4_name" class="label-group">
			<label>First</label>
			<label>Middle</label>
			<label>Last</label>
		</label>
	</div>
	<div class='form-group'>
		<select name='month'>
			<option>January</option>
			<option>February</option>
			<option>March</option>
			<option>April</option>
			<option>May</option>
			<option>June</option>
			<option>July</option>
			<option>August</option>
			<option>September</option>
			<option>October</option>
			<option>November</option>
			<option>December</option>
		</select>
		<select name='day'>
			@for ($i=1;$i<=31;$i++)
			<option>{{ $i }}</option>
			@endfor
		</select>
		<select name='year'>
			@for ($i=1960;$i<=2016;$i++)
			<option>{{ $i }}</option>
			@endfor
		</select>
		<div class="cp-divider">
			<label for="name" class="label-group">
				DOB:
				<label>Month</label>
				<label>Day</label>
				<label>Year</label>
			</label>
		</div>
	</div>
	<div class='form-group'>
		<input type='text' class='text-center form-control unstyled-input' placeholder='Street Address' data-checkout=".checkout-street-address" id='step4_street_address'>
		<label for="step4_street_address" class="label-group">
			Street Address
		</label>
	</div>

	<div class='form-group'>
		<input type='text' class='text-center form-control unstyled-input' placeholder='City, State and Zip' data-checkout=".checkout-citystatezip" value="{{ session()->get('zip') }}" id='step4_city_state_zip'>
		<label for="step4_city_state_zip" class="label-group">
			City, State and Zip
		</label>
	</div>
	<div class='form-group'>
		<input type='text' class='no-shadow text-center unstyled-input' placeholder='Social Security Number' id='step4_ss_number'>
		<span data-toggle='buttons'>
			<label class="btn btn-xs btn-default cp-btn-checkbox">
				<input type="radio" name="recieve" id="recieve_yes" autocomplete="off"> Dont have one
			</label>
		</span>
		<div class="cp-divider">
			<label for="step4_ss_number" class="label-group ">
				Social Securty Number
			</label>
		</div>
	</div>
	<div class='form-group'>
		<input type='text' class='form-control text-center unstyled-input' placeholder='Mobile Number' id='step4_mobile_number'>
		<label for="step4_mobile_number" class="label-group ">Mobile Number</label>
	</div>
	<div class='form-group'>
		<input type='text' class='no-shadow text-center unstyled-input' placeholder='Income' id='step4_income'>
		<span class="btn-solo" data-toggle='buttons'>
			<label class="btn btn-xs btn-default cp-btn-checkbox">
				<input type="radio" name="recieve" id="recieve_yes" autocomplete="off"> Monthly
			</label>
			<label class="btn btn-xs btn-default cp-btn-checkbox">
				<input type="radio" name="recieve" id="recieve_yes" autocomplete="off"> Annual
			</label>
		</span>
		<div class="cp-divider">
			<label for="step4_income" class="label-group ">Income</label>
		</div>
	</div>
	<div class='form-group'>
		<span data-toggle='buttons'>
			<label class="btn btn-xs btn-default cp-btn-checkbox">
				<input type="radio" name="recieve" id="recieve_yes" autocomplete="off"> Self Employed
			</label>
		</span>
		<div class="cp-divider">
			<label for="step4_income_source" class="label-group ">Income Source</label>
		</div>
	</div>
	<button type="button" data-step="5" onclick="quote.gotoStepBtn(5);" class="btn btn-success btn-lg">Continue</button>
</div>

<div class="hidden" id="smiley-template">
	<div class='cp-smiley'>
		<img class='img-responsive' src='/assets/icons/emoji-icon.png' />
		<!-- <i class='fa fa-check'></i> -->
		<p>Me</p>
	</div>
</div>