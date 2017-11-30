<div class="col-md-8 col-md-offset-2 step-parent">
	<h4>Health questions are asked for us to find you a perfect match!</h4>
	<h3>Do you have a preferred doctor or hospital you wish to recieve care from?</h3>
	<div class="btn-recieve btn-solo" data-toggle="buttons">
		<label class="btn btn-lg btn-default cp-btn-checkbox" style="width: 150px;">
			<input type="radio" value="yes" name="recieve" id="recieve_yes" autocomplete="off"> Yes
		</label>
		<label class="btn btn-lg btn-default cp-btn-checkbox" style="width: 150px;">
			<input type="radio" value="no" name="recieve" id="recieve_no" autocomplete="off"> No
		</label>
	</div>
	<div id="step2_doctor" class="col-md-12">
	@include('main.quotes.partials.step2_doctor')
	</div>
	<br>
	<div class="col-md-12">
		<button type="button" data-step="#step2_2" class="cp-step-doctor btn btn-success btn-increase" style="width:150px;margin-top:10px;">Next</button>
	</div>
</div>