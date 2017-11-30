@extends('main.directories.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/healthcare-providers.css">
@endsection

@section('content.inner')

<div class="income-container" style="margin-top: 150px;" id="doctor">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(session('message'))
					<div class='alert alert-success'>
						<p>{{ session('message') }}</p>
					</div>
				@endif
				<ul class="ds-ul">
					<li>
						<a href="/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
					</li>
					<li>
						<h1 class="provider-header">Doctor Search</h1>
					</li>
					<li>
						<a class="btn btn-primary btn-submit" role="button" href="/careconnect/create-doctor"><i class="fa fa-fw  fa-plus-square" aria-hidden="true"></i> Add Healthcare Provider</a>
					</li>
					<li>
						<a class="btn btn-warning"  data-toggle="modal" data-target="#pl" role="button" href="">Premium Listing</a>
					</li>
				</ul>
			</div>

			<div class="provider-search-container">
				<div class="container">
					<div class="row">
						<form action="">
							<div class="col-md-4">
								<input type="text" v-model="searchInput" class="form-control" placeholder="Name">
							</div>
							<div class="col-md-3">
								<input type="text" v-model="searchState" maxlength="2" class="form-control" placeholder="State">
							</div>
							<div class="col-md-3">
								<input type="text" v-model="searchCity" class="form-control" placeholder="City">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-primary form-control" @click="search()">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-danger form-control" @click="clear()">
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
						<pagination v-on:pagechange="changePage" :pages="pages" :current-page="page" class="pagination-sm"></pagination>
					</div>
				</div>

				<div class="row listing">
					<doctor-card v-for="doctor in doctors" :doctor="doctor"></doctor-card>
				</div>
			</div>
		</div>
	</div>
</div>
@include('main.directories.doctor.templates.modal-doctor')
@include('main.directories.doctor.templates.modal-save')

@endsection

@section('scripts')
	<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearchLite.min.js"></script>
	<script src="/assets/js/vendor/vue/dist/vue.js"></script>
	<script src="/assets/js/vue/directories/pagination.js"></script>
	<script src="/assets/js/vue/directories/doctor.js"></script>
	<script src="/assets/js/vue-doctor.js"></script>
@endsection
