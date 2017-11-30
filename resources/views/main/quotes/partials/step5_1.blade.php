<div class="col-md-10 col-md-offset-1 step-parent">
	<div>

		<!-- Nav tabs -->
		<ul id="checkout-tab" class="nav nav-tabs nav-justified" role="tablist">
			<li role="presentation" class="active fw-tab"><a href="#billing-address" aria-controls="billing-address" role="tab" data-toggle="tab">Billing Address</a></li>
			<li role="presentation" class="fw-tab"><a class="disabled" href="#payment" aria-controls="payment" role="tab" data-toggle="tab">Payment</a></li>
			<li role="presentation" class="fw-tab"><a class="disabled" href="#order-summary" aria-controls="order-summary" role="tab" data-toggle="tab">Order Summary</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="billing-address">
				<div class="row">
					<div class="col-md-12">
						<p class="">would you like us to send the bill to the address <span class="checkout-address checkout-street-address"></span>, <span class="checkout-address checkout-citystatezip"></span> ?.</p>
						<div class="btn-recieve btn-solo" data-toggle="buttons">
							<label class="btn btn-sm btn-default cp-btn-checkbox" style="width: 150px;">
								<input type="radio" value="yes" name="checkout-address" id="recieve_yes" autocomplete="off"> Yes
							</label>
							<label class="btn btn-sm btn-default cp-btn-checkbox" style="width: 150px;">
								<input type="radio" value="no" name="checkout-address" id="recieve_no" autocomplete="off"> No
							</label>
						</div>
						<hr />
						<div id="checkout-preffered" style="display: none;">
							<p>Enter your preferred Billing Address.</p>
							<div class="col-md-8 col-md-offset-2">
								<div class="form-group">
									<input type="text" class="form-control" name="preffered_address" id="preffered_address" placeholder="Street Address">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="preffered_citystate" id="preffered_citystate" placeholder="City, State and Zip">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12 action-btn">
							<div class="col-md-6 text-center">
								<button type="button" class="btn btn-default">Back</button>
							</div>
							<div class="col-md-6 text-center">
								<button data-next-tab="#payment" type="button" class="btn btn-success">Continue</button>							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="payment">
				<div class="row">
					<div class="col-md-12">
						<ul id="checkout-tab" class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active fw-tab">
								<a href="#credit-debit" aria-controls="credit-debit" role="tab" data-toggle="tab">
									<img class="img-responsive" src='/assets/icons/checkout-credit.png' style="margin:auto;height: 36px;" />
								</a>
							</li>
							<li role="presentation" class="fw-tab">
								<a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">
									<img class="img-responsive" src='/assets/icons/checkout-paypal.png' style="height: 36px;margin:auto;" />
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane  active" role="tabpanel" id="credit-debit">
								<div class="col-md-12 row-eq-height">
									<div class="col-md-6 text-left">
										<div class="form-group">
											<label for="tab1-fname">First Name</label>
											<input type="text" id="tab1-fname" class="form-control">
										</div>
										<div class="form-group">
											<label for="tab1-lname">Last Name</label>
											<input type="text" id="tab1-lname" class="form-control">
										</div>
										<div class="form-group">
											<label for="tab1-zip">Zip Code</label>
											<input type="text" id="tab1-zip" class="form-control">
										</div>
										<div class="form-group">
											<label for="tab1-cardno">Credit Card Number</label>
											<input type="text" id="tab1-cardno" class="form-control">
										</div>
										<div class="form-group">
											<label for="tab1-cardtype">Credit Card Type</label>
											<input type="text" id="tab1-cardtype" class="form-control">
										</div>
									</div>
									<div class="col-md-6 text-left">
										<p><i class="fa fa-lock"></i> Secure Transaction</p>
										<p>Bank fees and applicable taxes may change your final amount.</p>
										<div class="btm" style="width: 100%;">
											<div class="form-group">
												<label for="">Expiry Date</label>
												<br>
												<input type="text" id="expiry_month" style="width: 49%;display:inline-block;" placeholder="month" class="form-control">
												<input type="text" id="expiry_year" style="width: 50%; display:inline-block;" placeholder="year" class="form-control">
											</div>
											<div class="form-group">
												<label for="">CVV/CID <span class="text-success">(Security Code)</span></label>
												<input text="text" id="cvv-cid" style="width: 50%;" data-toggle="tooltip" data-placement="right" title="The last 3 digits on the back of your card." class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" role="tabpanel" id="paypal">
								<div class="paypal-logo">
									<img class="img-responsive" src="/assets/icons/paypal.jpg" style="width: 50%;" />
								</div>
								<p>to continue with your purchase. Click on the "Login" button and you will be sent to the Paypal account. When you are done you will return to the website to complete your purchase.</p>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12 action-btn">
							<div class="col-md-6 text-center">
								<button data-next-tab="" type="button" class="btn btn-default">Back</button>
							</div>
							<div class="col-md-6 text-center">
								<button data-next-tab="#order-summary" type="button" class="btn btn-success">Continue</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="order-summary">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-8 text-left">
							<div class="well well-sm">
								<p>Order: <label class="label label-success">1294035</label> placed on {{ date('j F Y') }} at {{ date('H:i') }}</p>
								<p>Status: <i>Pending Approval</i></p>
								<p>ETA: {{ date('l, j F Y')}}</p>
							</div>
						</div>
						<div class="col-md-4 text-right">
							
						</div>
					</div>
					<div class="col-md-12 text-left">
						<div class="col-md-4">
							<b>Placed by:</b>
							<p class="text-underline text-success checkout-fullname"></p>
							<p class="checkout-email">{{ auth()->user()->email }}</p>
						</div>
						<div class="col-md-4">
							<b>Billing to:</b>
							<p class="checkout-fullname"></p>
							<p class="checkout-street-address"></p>
							<p class="checkout-citystatezip"></p>
						</div>
						<div class="col-md-4">
							<p>Type: Gold</p>
							<p>Discounts: none</p>
							<p>Payments: MASTERCARD ending 621</p>
						</div>
					</div>
					<div class="col-md-12 text-center">
						<div class="col-md-12">
							<div class="well well-sm">
								<table class="table table-condensed">
									<thead>
										<tr>
											<td><b>Items</b></td>
											<td><i>Price</i></td>
											<td><i>Quantity</i></td>
											<td><i>Total</i></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1. <span class="label label-success">Item: 291035</span></td>
											<td>USD 25.00</td>
											<td>1</td>
											<td></td>
										</tr>
										<tr>
											<td>2. <span class="label label-success">Item: 291036</span></td>
											<td>USD 95.45</td>
											<td>1</td>
											<td><span class="label label-success">USD 165.65</span></td>
										</tr>
										<tr>
											<td>3. <span class="label label-success">Item: 291037</span></td>
											<td>USD 45.20</td>
											<td>1</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-12 action-btn">
							<div class="col-md-6 text-center">
								<button data-next-tab="" type="button" class="btn btn-default">Back</button>
							</div>
							<div class="col-md-6 text-center">
								<button  data-step="6" onclick="quote.gotoStepBtn(6);" type="button" class="btn btn-success btn-nextStep">Continue</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>