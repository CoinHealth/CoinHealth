<div class="col-md-10 col-md-offset-1 step-parent">
	<h3>Do any of these pre-existing conditions apply?</h3>
	<div class="form-group btn-conditions btn-solo" data-toggle="buttons">
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="conditions" id="" autocomplete="off"> Diabetes
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="conditions" id="" autocomplete="off"> Asthma
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="conditions" id="" autocomplete="off"> Heart Ailment
		</label>
		<label class="btn btn-default cp-btn-checkbox">
			<input type="radio" name="conditions" id="" autocomplete="off"> Others
		</label>
	</div>
	<h3>How Often do you visit your doctor?</h3>
	<p>(Other than regular check-ups)</p>
	<div class="form-group btn-visit btn-solo" data-toggle="buttons">
		<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
			<input type="radio" name="visit" id="" autocomplete="off"> 0-3 Visits
		</label>
		<label class="btn btn-default cp-btn-checkbox" style="width:150px;">
			<input type="radio" name="visit" id="" autocomplete="off"> 4-8 Visits
		</label>
		<label class="btn btn-default cp-btn-checkbox" style="width:130px;">
			<input type="radio" name="visit" id="" autocomplete="off"> 8+ Visits
		</label>
	</div>
	<hr>
	<div class="form-group">
		<input type="text" id="name" name="employee_name" class="text-center name form-control" placeholder="Name" >
		<label for="name" class="label-group">
			<label>First</label>
			<label>Middle</label>
			<label>Last</label>
		</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control text-center email" name="email" id="email" placeholder="Email" >
		<p class="small" style="display: none; margin: 5px 0">This is not a valid Email address.</p>
	</div>
	<div class="awesome">
		<h3>Awesome!</h3>
		<p>We will email you all your options</p>
	</div>
	<button type="button" onclick="quote.gotoStepBtn(3)" class="btn btn-success btn-lg" style="width:150px;margin-top:10px;">Next</button>
</div>