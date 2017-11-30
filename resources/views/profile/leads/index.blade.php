@extends('profile.base')
@section('content.inner')
<div id="leads">
	<div class="row">
		<div class="col-md-12">
			<p class="category">Leads</p>
		</div>
	</div>
	<div class="top-content">
		<div class="row">
			<div class="col-md-12">
				{{-- <v-server-table url="/api/leads" :columns="dtColumns" :options="dtOptions"></v-server-table> --}}
				<table class="table dataTable" id="staffTable">
					<thead>
						<tr>
							<td>Fullname</td>
							<td>Email</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($leads as $lead)
							@if($lead->user->patient )
								@if(!$lead->user->patient->providers->contains(auth()->user()->id))
								<tr data-id="{{ $lead->user->id }}">
									<td>{{ $lead->user->full_name }}</td>
									<td>{{ $lead->user->email }}</td>
								</tr>
								@endif
							@else
								<tr data-id="{{ $lead->user->id }}">
									<td>{{ $lead->user->full_name }}</td>
									<td>{{ $lead->user->email }}</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
@include('profile.leads.partials.modal-set-patient')
@endsection

@push('scripts')
    <script src="/js/leads.js"></script>
@endpush
