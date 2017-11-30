@extends('main.careconnect.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/healthcare-providers.css">
<link rel="stylesheet" href="/assets/css/agent-finder.css">
@endsection

@section('content.inner')
	@include('main.partials.sidebar')
<div class="create-doctor-container" style="margin-top: 80px;">
	<div class="container">
    <div class="doctor-wrapper">
			@if(session('register.success'))
				<div class='alert alert-success'>
					<p>{{ session('register.success') }}</p>
				</div>
			@endif
			@if (session('error'))
				<div class='alert alert-danger'>
					@foreach(session('error') as $err)
						<p>{{ $err }}</p>
					@endforeach
				</div>
			@endif
      <div class="panel panel-info">
        <div class="panel-heading doc-heading">Agent Registration</div>
        <form method="post" action="/careconnect/create-agent">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="panel-body doc-body">
            <div class="row col-md-8 col-md-offset-2">
							<input type="hidden" value="3" id="purpose" class="form-control" name="purpose">
              {{--
              <div class="form-group">
                <label for="chk_premium">
                  <input type="checkbox" id="chk_premium" name="chk_premium"> Premium Listing
                </label>
              </div> --}}
              <div class="form-group">
								<div class="form-group">
									<label>Website: </label>
									<input type="text" id="website" class="form-control premium" name="website">
								</div>
								<div class="form-group">
									<label>Subscription: </label>
	                <select name="subscription" id="subscription" class="form-control select2 premium">
										 <option></option>
										 <option value="monthly">Monthly ($0.99)</option>
	                   <option value="annual">Annual ($9.99)</option>
	                 </select>
							 	</div>
								<div style="padding:10px;">
							  	<p><i class="fa fa-lock"></i> Secure Transaction</p>
							  	<p>Bank fees and applicable taxes may change your final amount</p>
								</div>
								<div class="form-group">
									<label>Full Name: </label>
									<input type="text" id="full_name" class="form-control premium" name="payment_info[full_name]">
								</div>
								<div class="form-group">
									<label>Credit Card Number: </label>
									<input type="text" id="credit_card_number" class="form-control premium" name="payment_info[credit_card_number]">
								</div>
								<div class="form-group">
									<label>Credit Card Type: </label>
									<select class="form-control" name="payment_info[credit_card_type]">
										<option value="visa">VISA</option>
										<option value="american_express">American Express card</option>
										<option value="mastercard">MasterCard</option>
										<option value="discover_network">Discover Network</option>
										<option value="other">Other</other>
									</select>
								</div>
								<div class="form-group">
										<label>Expiration Date</label>
										<div>
											<select class="form-control" id="exp_month" style="width:50%;display:inline-block;">
												@for($_month = 1; $_month < 13; $_month++)
													<option value="{{ $_month }}" {{ $_month == date('n') ? 'selected' : '' }}>{{ date('M', strtotime('01.'.$_month.'.2001') ) }}</option>
												@endfor
											</select>
											<select class="form-control" id="exp_year" style="width:49%;display:inline-block;">
												@for($_year = (date('Y')-5); $_year < (date('Y')+5); $_year++)
												<option value="{{ $_year }}" {{ $_year == date('Y') ? 'selected' : '' }}>{{ $_year }}</option>
												@endfor
											</select>
									</div>
									<input type="hidden" id="expiration_date" name="payment_info[expiration_date]">
								</div>
								<div class="form-group">
									<label>CVV / CID <span class="lblsec"> (Security Code) </span></label>
									<input type="text" id="cvv_cid" class="form-control premium" name="payment_info[cvv_cid]" maxlength="3" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." >
								</div>

							</div>
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary btn-submit" id="btnSignUp">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

	</div>
</div>
@include('main.careconnect.partials.agent-pl-modal')
<!-- @include('main.careconnect.partials.agent-pl-payment') -->
@endsection

@section('scripts')
<script src='/assets/js/vendor/typeahead/typeahead.bundle.min.js'></script>
<script src='/assets/js/datum/locations.js'></script>
<script src="/assets/js/agent-finder.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
	agent.init();
	agent.initTypeahead();
	$(function() {
		$('[type=password]').popover({
			'title' : 'Your password must have',
			'content': '<ul class="text-left">'+
										'<li>8 characters minimum length</li>'+
										'<li>1 letter in Upper Case</li>'+
										'<li>1 numeral (0-9)</li>'+
									'</ul>',
			'placement': 'top',
			'delay': {
				'show': 1000,
				'hide' : 0,
			},
			'html' : true,
			'trigger' :'focus'
		});
	});
</script>
@endsection
