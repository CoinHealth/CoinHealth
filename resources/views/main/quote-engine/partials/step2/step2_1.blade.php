<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-8 col-md-push-2 preferred-container">
			<h3><b>Do you have a preferred doctor or hospital you'd like to receive care from?</b></h3>
			<div class="mg-top-20 mg-bottom-20 btn-preferred" data-toggle="buttons">
			  <label class="btn btn-lg btn-default" style="width: 150px;">
			  	<input type="radio" value="yes" name="recieve" id="recieve_yes" autocomplete="off"> Yes
			  </label>
			  <label class="btn btn-lg btn-default" style="width: 150px;">
			  	<input type="radio" value="no" name="recieve" id="recieve_no" autocomplete="off"> No
			  </label>
			</div>
			<h5>if you give us this information now. you'll be able to filter all plan results down to the plans that your preferred doctor or hospital accepts.</h5>
		</div>

		<div class="col-md-12 hospital-container" style="display: none;">
			<div class="col-md-8 col-md-push-2">
				<h4><b>Please enter your doctor or hospital's information</b></h4>
				<div class="form-group text-center mg-top-20">
					<label for="hospitaldoctorInput">DOCTOR / HOSPITAL INFO</label>
					<div class="btn-group btn-block">
					  <input id="hospitaldoctorInput" type="text" placeholder="Hospital / Doctor" class="typeahead input-lg form-control">
					  <span class="text-info clr">Clear</span>
					</div>
				</div>

				<div class="form-group text-left mg-top-20 doctors-selected" style="display: none;">
					<h5 class="text-success"><b>DOCTORS AND HOSPITAL ADDED</b></h5>
				</div>
				<div id="added-doctor-template" style="display: none;">
					<div class="doctor-wrapper text-left">
						<div class="head">
							<h5 class="doctor"></h5>
							<h5 class="remove pull-right">
								<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</h5>
						</div>
						<p class="hospital"></p>
						<p class="street_address"></p>
						<p class="zip_code"></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" data-step="#step10_1" class="nextBtn btn btn-success">Continue</button>
			</div>
		</div>
	</div>
</div>
