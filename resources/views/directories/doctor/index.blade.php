@extends('directories.base')

@push('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/css/directory.css">
<!-- <link rel="stylesheet" href="/assets/css/carenow/search.css"> -->

@endpush

@section('content.inner')
<div class="directory-container" style="margin-top: 150px;" id="doctor">

	<modal-preview></modal-preview>
	<modal-save @success="success"></modal-save>
	<modal-premium></modal-premium>
	<div class="container">
		<transition v-if="!pageStarted" name="popup">
			<div class="row">
				<div class="col-md-12 text-center">
					<img src="/assets/icons/loading.svg">
				</div>
			</div>
		</transition>
		<transition name="popup" v-else>
			<div class="row">
				<div class="col-md-12">
					@if(session('message'))
						<div class='alert alert-success'>
							<p>{{ session('message') }}</p>
						</div>
					@endif
					<ul class="ds-ul">
						<li>
							<a href="/" class="btn btn-sm btn-primary">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<h1 class="provider-header">Doctor Search</h1>
						</li>
						@if(auth()->user())
							@if(auth()->user()->role == 2 || auth()->user()->role == 4)
							<li>
								<a class="btn btn-sm btn-primary btn-submit" 
									role="button" 
									href="/directory/doctors/add-listing">
									<i class="fa fa-fw  fa-plus-square" 
										aria-hidden="true">	
									</i> 
									Add Healthcare Provider
								</a>
							</li>
							@endif
						@endif
					</ul>
				</div>

				<div class="provider-search-container">
					<div class="container">
						<div class="row">
							<form action="">
								<div class="col-md-3">
									<input type="text" 
										v-model="searchInput" 
										class="form-control" 
										placeholder="Doctor Name">
								</div>
								<div class="col-md-3">
									<input type="text" 
										v-model="searchLocation" 
										class="form-control" 
										placeholder="Location">
								</div>
								<div class="col-md-4">
									<multi-select
								        v-model="searchSpecialization"
								        placeholder="type specializations .."
								        :options="specializations"
								        :limit="1">
								    </multi-select>

								</div>
								<div class="col-md-2 searchButtons">
									<button type="button" 
										class="btn btn-sm btn-primary form-control" 
										@click="search">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
									<button type="button" 
										class="btn btn-sm btn-danger form-control" 
										@click="clear">
										<i class="fa fa-times" aria-hidden="true"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="container">

					<div class="row search-header">
						<div class="col-md-12">
							<span>Search Results</span>
							<paginate
								ref="pagination"
								:page-count="pages"
								:initial-page="page"
								:click-handler="changePage"
								container-class="pagination pagination-sm"
								page-class="page-item">
							</paginate>
						</div>
					</div>

					<div class="row listing">

						<div class="col-md-12" v-if="empty" v-cloak>
							<div class="alert alert-info">
								<p>
									Whoops. We're still working on that specialization. 
									Please choose a different filter.
								</p>
							</div>
						</div>
						<transition-group name="fade-out">
							<doctor-card v-for="doctor in doctors" 
								:key="doctor.id" 
								:doctor="doctor">	
							</doctor-card>
						</transition-group>
					</div>
				</div>
			</div>	
		</transition>
		
	</div>
</div>

@endsection

@push('scripts')
	<script src="/js/directory-doctor.js"></script>
	<script type="text/javascript" src="/assets/js/sidebar_btn.js"></script>

@endpush
