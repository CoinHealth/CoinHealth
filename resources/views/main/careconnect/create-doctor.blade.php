@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/healthcare-providers.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
		
	
<div class="create-doctor-container">
	<div class="container">

		<div class="row">
			<div class="col-md-6 col-md-offset-3">

		    <div class="doctor-wrapper">
		      @if (session('message'))
		        <div class='alert alert-success'>
		          <p>{{ session('message') }}</p>
		        </div>
		      @endif

		      <div class="panel panel-info">
		        <div class="panel-heading doc-heading">Join Our Provider Network</div>
		        <form method="post" action="/careconnect/create-doctor">
		          <input type="hidden" name="_token" value="{{ csrf_token() }}">
		          <div class="panel-body doc-body">
		          	
								<input type="hidden" value="2" id="purpose" class="form-control" name="purpose">
		            <div class="row">
		              <div class="form-group col-md-6">
		                <label>Prefix </label>
		                <input type="text" id="" class="form-control" name="prefix">
		              </div>
		              <div class="form-group col-md-6">
		                <label>Degree </label>
		                <input type="text" id="" class="form-control" name="degree" >
		              </div>
		            </div>


		            <div class="row">
		            	<div class="col-md-12">
		            		<div class="form-group">
		            			<label>First Name </label>
		                	<input type="text" id="" class="form-control" name="physician_first_name" value="{{ auth()->user()->first_name }}" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Last Name </label>
		                	<input type="text" id="" class="form-control" name="physician_last_name" value="{{ auth()->user()->last_name }}" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Contact No.</label>
		            			<input type="text" class="form-control" value="{{ auth()->user()->contact }}" name="contact">
		            		</div>
		            		<div class="form-group">
											<label>Specialization </label>
											<select class="form-control select2" multiple="" name="specialties">
												<option>cnds</option>
												<option>cnds</option>
												<option>cnds</option>
												<option>cnds</option>
											</select>
										</div> 
										<div class="form-group">
			                <label>Street </label>
			                <input type="text" id="" class="form-control" name="address[street]">
			              </div>
			              <div class="form-group">
			                <label>Street 2 </label>
			                <input type="text" id="" class="form-control" name="address[street2]">
			              </div>
		               	<div class="form-group">
		                	<label>City </label>
		                	<input type="text" id="" class="form-control" name="address[city]">
		              	</div> 
		              	<div class="form-group">
			                <label>State </label>
			                 <select name="address[state_abbreviated]" id="" class="form-control select2" required>
			                    <option></option>
			                    @if(isset($locations))
			                      @foreach($locations as $location)
			                      <option value="{{ $location->state_abbr }}">{{ $location->pretty_name }}</option>
			                      @endforeach
			                    @endif
			                 </select>
			              </div>
			              <div class="form-group">
		                	<label>Zip Code </label>
		                	<input type="text" id="" class="form-control" name="address[zip]">
		              	</div> 
		              	<input type="hidden" name="address[country]" value="UNITED STATES OF AMERICA">


		            	</div>
		            </div>

								<div class="row">
									<div class="form-group col-md-6">
										<label>
								      <input type="radio" name="subscription" id="chk_premium" class="chk-subscription" value="premium-listing"> Premium Listing
								    </label>
									</div>
									<div class="form-group col-md-6">
										<label>
								      <input type="radio" name="subscription" id="chk_subscribed" class="chk-subscription" value="ehr"> EHR
								    </label>
									</div>
								</div>

								<div class="row row-premium" style="{{ !$is_premium ? 'display:none;':'display:block' }}">
									<div class="col-md-12">
										<div class="col-md-12 form-group">
											<p><i class="fa fa-lock"></i> Secure Transaction</p>
											<p>Bank fees and applicable taxes may change your final amount</p>
										</div>
									
										<div class="form-group">
											<label>Subscription </label>
			                 <select name="subscription" id="subscription" class="form-control select2 premium">
												 <option value="monthly_premium">Monthly ($0.99)</option>
			                   <option value="annual_premium">Annual ($9.99)</option>
			                 </select>
										</div>
										
										<div class="clearfix"></div>
										
										<div class="form-group">
											<label>Credit Card Number </label>
											<input type="text" id="credit_card_number" class="form-control premium" name="payment_info[credit_card_number]">
										</div>
										<div class="form-group">
											<label>Credit Card Type </label>
											<select class="form-control" name="payment_info[credit_card_type]">
												<option value="visa">VISA</option>
												<option value="american_express">American Express card</option>
												<option value="mastercard">MasterCard</option>
												<option value="discover_network">Discover Network</option>
												<option value="other">Other</other>
											</select>
										</div>
										<div class="form-group">
											<label>CVV / CID <span class="lblsec"> (Security Code) </span></label>
											<input type="text" id="cvv_cid" class="form-control premium" name="payment_info[cvv_cid]" maxlength="3" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." >
										</div>

										<div class="form-group">
												<label>Expiration Date </label>
												<div>
													<select class="form-control" id="exp_month" style="width:50%;display:inline-block;">
														@foreach(get_months() as $index => $_month)
															<option value="{{ $index+1 }}" {{ $index+1 == date('n') ? 'selected' : '' }}>{{ $_month }}</option>
														@endforeach
													</select>
													<select class="form-control" id="exp_year" style="width:49%;display:inline-block;">
														@foreach(get_years(5,5) as $_year)
															<option value="{{ $_year }}" {{ $_year == date('Y') ? 'selected' : '' }}>{{ $_year }}</option>
														@endforeach
													</select>
												</div>
										</div>
										<input type="hidden" id="expiration_date" name="payment_info[expiration_date]">

										
									</div>

								</div>

		            <div class="row">
		              <div class=" col-md-12">
		                <div class="pull-right">
		                  <button type="submit" class="btn btn-primary btn-submit">Submit</button>
		                </div>
		              </div>
		            </div>


		          </div>
		        </form>



		      </div>
		    </div>


		  </div>
		</div>

	</div>
</div>
@include('main.careconnect.partials.doctor-pl-modal')
@endsection

@section('scripts')
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src='/assets/js/datum/locations.js'></script>
<script src="/assets/js/healthcare-providers.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
	providers.initAdd();
	providers.initTypeahead();
</script>
@endsection
