<div class="col-md-12 step-parent">
	<div class="row">		
		<div class="container text-center">
			<div class="col-md-10 col-md-push-1">
				<h2>Household Members</h2>
				<p>Please include all household members that you can claim on your taxes. even if they're NOT applying for health
				for health coverage. We ask for this because it can affect your elligibility or savings. </p>
			</div>
		</div>
		<div class="applicant-wrapper">
			<div class="container-full applicant-name">
				<h3>ME- Castor Troy</h3>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p class="pull-left marginless">Is this person applying for health coverage?</p>
					<p class="pull-right btn-health-coverage btn-main" data-toggle="buttons">
						<label class="btn btn-sm btn-default" style="width: 80px;">
							<input type="radio" value="yes" name="health-coverage" id="health-coverage1" autocomplete="off"> Yes
						</label>
						<label class="btn btn-sm btn-default" style="width: 80px;">
							<input type="radio" value="no" name="health-coverage" id="health-coverage2" autocomplete="off"> No
						</label>
					</p>
				</div>
				<hr/>
				<div class="col-md-12">
					<h4 class="text-warning">BASIC INFORMATION</h4>
					<p>Make sure to enter <span class="text-error">ALL</span> this information as accuarately as possible</p>
					<div class="sp-fullname row">
						<div class="col-md-3 wrapper">
							<div class="form-group">
								<label for="">FIRSTNAME</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-3 wrapper">
							<div class="form-group">
								<label for="">MIDDLE NAME</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-3 wrapper">
							<div class="form-group">
								<label for="">LAST NAME</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">&nbsp;</label>
								<select name="" id="" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="differs">
									<input type="checkbox" id="differs">
									Name above differs from the one on SSN card
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group sss-container">
								<label for="sss">SOCIAL SECURITY NUMBER <i class="fa fa-question-circle pull-right"></i></label>
								<input type="text" placeholder="XXXXXXXXXX" class="form-control" id="sss">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>&nbsp;</label>
								<div class="no-sss btn-block btn-main" data-toggle="buttons">
									<label class="btn btn-default btn-block" for="no-sss">
										<input type="checkbox" value="yes" name="no_sss" id="no-sss" autocomplete="off"> I DONT HAVE A SOCIAL SECURITY NUMBER
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">GENDER</label>
								<div class="btn-group btn-group-justified btn-household-gender btn-main" role="group" data-toggle="buttons">
									<label class="btn btn-default" for="household-male0">
										<input type="radio" value="yes" name="household-male0" id="household-male0" autocomplete="off"> Male
									</label>
									<label class="btn btn-default" for="household-female1">
										<input type="radio" value="no" name="household-female0" id="household-female0" autocomplete="off"> Female
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="date-of-birth">DATE OF BIRTH</label>
								<input type="text" class="form-control date" id="date-of-birth">
							</div>
						</div>
						<div class="col-md-6">
							<h6>SELECT ALL THAT APPLY</h6>
							<div class="form-group">
								<label>TAX STATUS FOR 2016</label>
								<select class="form-control" name="tax_status">
									<option>Married, Filing Separately</option>
									<option>Married, Filing Separately1</option>
									<option>Married, Filing Separately2</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<h5 class="text-warning">Income</h5>
							<div class="row">
								<div class="col-md-6">
									<p>Did this person have any income in the past month? please list all sources of income for this person.</p>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="btn-group btn-group-justified btn-income-past btn-main" role="group" data-toggle="buttons">
											<label class="btn btn-default">
												<input type="radio" value="yes" name="household-male0" autocomplete="off"> YES
											</label>
											<label class="btn btn-default" for="household-female1">
												<input type="radio" value="no" name="household-female0" autocomplete="off"> No
											</label>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="text-center income-container">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label><b>MONTHLY AMOUNT</b></label>
										<div class="input-group">
											<span class="input-group-addon">$</span>
											<input type="text" name="monthly_income" class="form-control" id="monthly_income">
											<div class="input-group-addon">per month</div>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label><b>INCOME TYPE</b></label>
										<select name="income_type" id="income_type" class="form-control">
											<option value="default">Self Employed</option>
											<option value=""></option>
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label><b>TYPE OF WORK</b></label>
										<input type="text" class="form-control" placeholder="Type of work">
									</div>
								</div>
								<div class="col-md-12">
									<button type="button" class="btn-success add-income-source">Add income source</button>
								</div>
							</div>

						</div>
						<div class="col-md-12 text-center">
							<div class="col-md-8 col-md-push-2">
								<p>Base on the information you provided. this person will make approximately <b><span class="approx-income">$1,200</span></b> in 2016. is this correct?</p>
								<div class="form-group">
									<div data-toggle="buttons" class="btn-main">
										<label class="btn btn-default">
											<input type="radio" value="yes" name="household-male0" autocomplete="off"> YES
										</label>
										<label class="btn btn-default">
											<input type="radio" value="no" name="household-female0" autocomplete="off"> No
										</label>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="hidden applicant-wrapper">
			<div id="applicant-template">
				<div class="container-full applicant-name">
					<h3>ME- Castor Troy</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<p class="pull-left marginless">Is this person applying for health coverage?</p>
						<p class="pull-right btn-health-coverage btn-main" data-toggle="buttons">
							<label class="btn btn-sm btn-default" style="width: 80px;">
								<input type="radio" value="yes" name="health-coverage" id="health-coverage1" autocomplete="off"> Yes
							</label>
							<label class="btn btn-sm btn-default" style="width: 80px;">
								<input type="radio" value="no" name="health-coverage" id="health-coverage2" autocomplete="off"> No
							</label>
						</p>
					</div>
					<hr/>
					<div class="col-md-12">
						<h4 class="text-warning">BASIC INFORMATION</h4>
						<p>Make sure to enter <span class="text-error">ALL</span> this information as accuarately as possible</p>
						<div class="sp-fullname row">
							<div class="col-md-3 wrapper">
								<div class="form-group">
									<label for="">FIRSTNAME</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3 wrapper">
								<div class="form-group">
									<label for="">MIDDLE NAME</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3 wrapper">
								<div class="form-group">
									<label for="">LAST NAME</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">&nbsp;</label>
									<select name="" id="" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="differs">
										<input type="checkbox" id="differs">
										Name above differs from the one on SSN card
									</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group sss-container">
									<label for="sss">SOCIAL SECURITY NUMBER <i class="fa fa-question-circle pull-right"></i></label>
									<input type="text" placeholder="XXXXXXXXXX" class="form-control" id="sss">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>&nbsp;</label>
									<div class="no-sss btn-block btn-main" data-toggle="buttons">
										<label class="btn btn-default btn-block" for="no-sss">
											<input type="checkbox" value="yes" name="no_sss" id="no-sss" autocomplete="off"> I DONT HAVE A SOCIAL SECURITY NUMBER
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">GENDER</label>
									<div class="btn-group btn-group-justified btn-household-gender btn-main" role="group" data-toggle="buttons">
										<label class="btn btn-default" for="household-male0">
											<input type="radio" value="yes" name="household-male0" id="household-male0" autocomplete="off"> Male
										</label>
										<label class="btn btn-default" for="household-female1">
											<input type="radio" value="no" name="household-female0" id="household-female0" autocomplete="off"> Female
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="date-of-birth">DATE OF BIRTH</label>
									<input type="text" class="form-control date" id="date-of-birth">
								</div>
							</div>
							<div class="col-md-6">
								<h6>SELECT ALL THAT APPLY</h6>
								<div class="form-group">
									<label>TAX STATUS FOR 2016</label>
									<select class="form-control" name="tax_status">
										<option>Married, Filing Separately</option>
										<option>Married, Filing Separately1</option>
										<option>Married, Filing Separately2</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<h5 class="text-warning">Income</h5>
								<div class="row">
									<div class="col-md-6">
										<p>Did this person have any income in the past month? please list all sources of income for this person.</p>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="btn-group btn-group-justified btn-income-past btn-main" role="group" data-toggle="buttons">
												<label class="btn btn-default">
													<input type="radio" value="yes" name="household-male0" autocomplete="off"> YES
												</label>
												<label class="btn btn-default" for="household-female1">
													<input type="radio" value="no" name="household-female0" autocomplete="off"> No
												</label>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-md-12">
								<div class="text-center income-container">
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label><b>MONTHLY AMOUNT</b></label>
											<div class="input-group">
												<span class="input-group-addon">$</span>
												<input type="text" name="monthly_income" class="form-control" id="monthly_income">
												<div class="input-group-addon">per month</div>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label><b>INCOME TYPE</b></label>
											<select name="income_type" id="income_type" class="form-control">
												<option value="default">Self Employed</option>
												<option value=""></option>
												<option value=""></option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label><b>TYPE OF WORK</b></label>
											<input type="text" class="form-control" placeholder="Type of work">
										</div>
									</div>
									<div class="col-md-12">
										<button type="button" class="btn-success add-income-source">Add income source</button>
									</div>
								</div>

							</div>
							<div class="col-md-12 text-center">
								<div class="col-md-8 col-md-push-2">
									<p>Base on the information you provided. this person will make approximately <b><span class="approx-income">$1,200</span></b> in 2016. is this correct?</p>
									<div class="form-group">
										<div data-toggle="buttons" class="btn-main">
											<label class="btn btn-default">
												<input type="radio" value="yes" name="household-male0" autocomplete="off"> YES
											</label>
											<label class="btn btn-default">
												<input type="radio" value="no" name="household-female0" autocomplete="off"> No
											</label>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-12 applicant-footer">
			<div class="row-eq-height">
				<div class="col-md-4 text-right">
					<div class="form-group">
						<button type="button" class="btn-sm btn-add-spouse btn-success btn">
							Add Spouse
						</button>
					</div>
					<div class="form-group">
						<button type="button" class="btn-sm btn-add-dependent btn-success btn">
							Add Dependent
						</button>
					</div>
				</div>
				<div class="col-md-8 text-left">
					<p>Please include all household members that you list on your taxes. even if they're NOT applying for health coverage. We ask for this because it can affect your eligibility or sasvings.</p>
					<button data-step="#step11_1" type="button" class="btn btn-success nextBtn">Continue</button>
				</div>
			</div>
		</div>

	</div>
</div>	

<div id="income-template hidden">
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-2"></div>
	<div class="col-md-2"></div>
</div>