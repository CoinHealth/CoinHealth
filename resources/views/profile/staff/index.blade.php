@extends('profile.base')
@section('content.inner')
<div id="staff">
<!-- 	<div class="row">
		<div class="col-md-12">
			<p class="category">Settings</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<span class="subcategory">Support Group Details</span> <a href="javascript:void(0);" class="update">Update</a>
		</div>
	</div>
	<div class="top-content">
		<div class="row mt-10">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Name:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Drug Rehab South Carolina</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Contact Number:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>123-4567-890</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Specialization:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Drug Abuse</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Affiliation:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Drug Rehab South Carolina</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Street:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>123 Main St.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>City:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Rock Hill</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>State:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>SC</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Zip Code:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>29730</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Operation Hours:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>By Appointment</p>
			</div>
		</div>
		<div class="row mt-10">
			<div class="col-md-12">
				<span class="subcategory">Subscription</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Full Name:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Mary Jones</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Email:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>mjones@smh.com</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Credit Card Type:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>Visa</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Credit Card Number:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>xxxxxx5448</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p>Expiration Date:</p>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
				<p>12/2018</p>
			</div>
		</div>
	</div>

	<p class="agreement">
		<i class="fa fa-check-circle-o color-blue" aria-hidden="true"></i> You have agreed <a href="javascript:void(0);">Terms and Conditions</a>
	</p> -->

	<!-- <div class="bottom-content"> -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<p class="category">Staff</p>
					<div class="pull-right addButton">
						<button type="button"
							data-target="#add-staff"
							data-toggle="modal"
							class="btn btn-primary">
							Add Staff <i class="fa fa-plus"></i>
						</button>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<!-- <v-client-table :data="staffData" :columns="dtColumns"></v-client-table> -->
				<table class="table table-bordered datatable" id="staffTable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<!-- filldata -->
						@foreach($staffs as $staff)
							<tr>
								<th>{{ $staff->user->full_name }}</th>
								<th>{{ $staff->user->email }}</th>
								<th>Active</th>
								<!-- <th>
									<a href="#" class="btn btn-primary btn-xs">View</a>
									<a href="#" class="btn btn-danger btn-xs">Remove</a>
								</th> -->
							</tr>

						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	<!-- </div> -->
</div>
@include('profile.staff.partials.modal-add-staff')
@endsection

@push('scripts')
	<script src="/js/staff.js"></script>
@endpush
