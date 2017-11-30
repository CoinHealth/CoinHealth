@extends('profile.base')

@section('content.inner')
<div id="contact">
	<div class="row">
		<div class="col-md-12">
			<p class="category">Contacts</p>
		</div>
	</div>
	<div class="top-content">
		<div class="row">
			<div class="col-md-12">
				<v-client-table :data="contactData" :columns="dtColumns"></v-client-table>
				<div class="clear"></div>
				<div class="pull-right float-responsive">
					<a href="javascript:void(0);" class="btn-blue" data-toggle="modal" data-target="#add-contact">Add Contacts</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
@include('profile.contacts.modals.add-contact')
</div>
@endsection

@push('scripts')
	<script src="/js/contacts.js"></script>
@endpush
