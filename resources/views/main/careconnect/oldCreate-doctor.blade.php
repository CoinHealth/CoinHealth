@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/healthcare-providers.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="create-doctor-container">
	<div class="container">
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
            <div class="row">
              <div class="form-group col-md-2">
					<input type="hidden" value="2" id="purpose" class="form-control" name="purpose">
                <label>Title: </label>
                <input type="text" id="" class="form-control" name="title">
              </div>
              <div class="form-group col-md-10">
                <label>Name: </label>
                <input type="text" id="" class="form-control" name="name" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-2">
                <label>Contact No.: </label>
                <input type="text" id="" class="form-control" name="contact_no" required>
              </div>
							<!-- <div class="form-group col-md-3">
								<label>Active Email Address:  </label>
								<input type="text" id="" class="form-control" name="email">
							</div> -->
              <div class="form-group col-md-5">
                <label>Specialization: </label>
                <input type="text" id="" class="form-control" name="specialization" required>
              </div>
              <div class="form-group col-md-5">
                <label>Affiliations: </label>
                <input type="text" id="" class="form-control" name="affiliations">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label>Street: </label>
                <input type="text" id="" class="form-control" name="street">
              </div>
               <div class="form-group col-md-3">
                <label>City: </label>
                <input type="text" id="" class="form-control" name="city">
              </div>
               <div class="form-group col-md-2">
                <label>State: </label>
                 <select name="state" id="" class="form-control select2" required>
                    <option></option>
                    @if(isset($locations))
                      @foreach($locations as $location)
                      <option value="{{ $location->state_abbr }}">{{ $location->state_abbr }}</option>
                      @endforeach
                    @endif
                 </select>
              </div>
							<div class="form-group col-md-3">
							 <div class="scrollable-dropdown-menu" id="zip_code_typeahead">
								 <label>Zip Code: </label>
								 <input type="text" maxlength="5" id="zip_code" class="form-control" name="zip_code" autocomplete="off" required>
								 <input type="hidden" name="location_id">
							 </div>
							</div>
            </div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>
						      <input type="checkbox" id= "chk_premium" {{ $is_premium ? 'checked':'' }}> Premium Listing
						    </label>
							</div>
						</div>
						<div class="row row-premium" style="{{ !$is_premium ? 'display:none;':'display:block' }}">
							<div class="form-group col-md-6">
								<label>Website: </label>
								<input type="text" id="website" class="form-control premium" name="title">
							</div>
							<div class="form-group col-md-6">
								<label>Subscription: </label>
                 <select name="subscription" id="subscription" class="form-control select2 premium">
									 <option value="monthly_premium">Monthly ($0.99)</option>
                   <option value="annual_premium">Annual ($9.99)</option>
                 </select>
							</div>
							<div class="col-md-6 form-group">
								<p><i class="fa fa-lock"></i> Secure Transaction</p>
								<p>Bank fees and applicable taxes may change your final amount</p>
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-md-6">
								<label>Full Name: </label>
								<input type="text" id="full_name" class="form-control premium" name="payment_info[full_name]">
							</div>
							<div class="form-group col-md-6">
								<label>Active Email Address: </label>
								<input type="email" id="email" class="form-control premium" name="email">
							</div>
							<div class="form-group col-md-6">
								<label>Credit Card Number: </label>
								<input type="text" id="credit_card_number" class="form-control premium" name="payment_info[credit_card_number]">
							</div>
							<div class="form-group col-md-6">
									<label>Expiration Date</label>
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
								<input type="hidden" id="expiration_date" name="payment_info[expiration_date]">
							</div>
							<div class="form-group col-md-6">
								<label>Credit Card Type: </label>
								<select class="form-control" name="payment_info[credit_card_type]">
									<option value="visa">VISA</option>
									<option value="american_express">American Express card</option>
									<option value="mastercard">MasterCard</option>
									<option value="discover_network">Discover Network</option>
									<option value="other">Other</other>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>CVV / CID <span class="lblsec"> (Security Code) </span></label>
								<input type="text" id="cvv_cid" class="form-control premium" name="payment_info[cvv_cid]" maxlength="3" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." >
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
