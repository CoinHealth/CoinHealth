@extends('profile.base')

@section('content.inner')
<div id="payment">
	<modal-change-status></modal-change-status>
	<div class="row">
		<div class="col-md-12 mt-30">
			<div class="pull-right">
				<button type="button"
					class="btn btn-primary btnAdd">
					<!-- data-target="#add-payment"
					data-toggle="modal" -->
					Add Payment <i class="fa fa-plus"></i>
				</button>
			</div>
			<p class="category">Payments</p>
		</div>
	</div>
	<div class="top-content">
		<div class="row">
			<div class="col-md-12 mt-30">
				<div class="row">
					<modal-add-payment v-on:paymentadded="addPayment"></modal-add-payment>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 payments-container mt-20">

				<div class="row">
					<!-- <payment-list :payment="payment" v-for="payment in payments"></payment-list> -->
					<payment-list  :patient="patient" v-for="patient in patients"></payment-list>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="/js/payments.js"></script>
@endpush
